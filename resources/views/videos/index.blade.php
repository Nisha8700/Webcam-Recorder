
@extends('layouts.app', ['page' => __('Tables'), 'pageSlug' => 'tables'])
@section('content')

<div class="col-md-2">
    @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>

 @endif



	<div class="col-md-6">
		<h2>Preview</h2>
		<video id="preview" width="160" height="120" onchange="loadPreview(this);" autoplay muted></video><br/><br/>
		<div class="btn-group">
			<div id="startButton" class="btn btn-success"> Start Recording</div>
			<div id="stopButton" class="btn btn-danger"  style="display:none;"> Stop </div>
		</div>
	</div>
	<div class="col-md-6" id="recorded"  style="display:none">
		<h2>Recording</h2>
		<video id="recording" width="160" height="120" controls></video><br/><br/>
		<a id="downloadButton" class="btn btn-primary" data-url="{{route('videos.store')}}">save</a>
		<a id="downloadLocalButton" class="btn btn-primary">Download</a>
	</div>
</div>



<div class="row">
  <div class="col-md-12">
    <div class="card ">
      <div class="card-header">
        <h4 class="card-title"> Videos record</h4>
        <form action="{{ route('search') }}" method="GET">
            <input type="text" name="search" required/>
            <button type="submit">Search</button>
        </form>
      </div>

      <div class="card-body">
        <div class="table-responsive">
          <table class="table tablesorter " id="">
            <thead class=" text-primary">
                <table class="table table-borderd table-striped">

                    <tr>
                      <th>S.No.</th>
                      <th>Video Name</th>
                      <th style="width: 300px;">video Preview</th>

                      <th>created Date</th>
                      <th>Updated Date</th>
                      <th>Action</th>
                    </tr>
                    @foreach ($videos as $req )
                    <tr>
                       <td>{{ $req->id }}</td>
                       <td>{{$req->file_name}}</td>
                       <td>
                        <video width="200" height="100" controls>
                            <source src="{{URL::asset("/storage/videos/$req->file_name")}}" type="video/webm">
                          Your browser does not support the video tag.
                      </video>


                    </td>
                       <td>{{ $req->created_at }}</td>
                       <td>{{ $req->updated_at }}</td>


                        <td>
                            <a href="{{ url('delete/'.$req->id) }}" >
                                <button class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete">
                                    <i class="fa fa-trash"></i></button>
                            {{-- <input type="submit" name="delete" value="Delete" class="btn btn-danger"> --}}
                        </a>
                        <a href="{{ route('videos.edit',$req->id) }}">
                        <button class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit">
                            <i class="fa fa-edit"></i></button></a>

                    </a>
                        </td>

                    </tr>
                    @endforeach

                      </div>


            </tbody>

          </table>

        </div>
        {!!$videos->links()!!}
      </div>
    </div>
  </div>

</div>
<script>
    let preview = document.getElementById("preview");
    let recording = document.getElementById("recording");
    let startButton = document.getElementById("startButton");
    let stopButton = document.getElementById("stopButton");
    let downloadButton = document.getElementById("downloadButton");
    let logElement = document.getElementById("log");
    let recorded = document.getElementById("recorded");
    let downloadLocalButton = document.getElementById("downloadLocalButton");

    let recordingTimeMS = 5000; //video limit 5 sec
    var localstream;

    window.log = function (msg) {
    //logElement.innerHTML += msg + "\n";
    console.log(msg);
    }

    window.wait = function (delayInMS) {
    return new Promise(resolve => setTimeout(resolve, delayInMS));
    }

    window.startRecording = function (stream, lengthInMS) {
        let recorder = new MediaRecorder(stream);
        let data = [];

        recorder.ondataavailable = event => data.push(event.data);
        recorder.start();
        log(recorder.state + " for " + (lengthInMS / 1000) + " seconds...");

        let stopped = new Promise((resolve, reject) => {
            recorder.onstop = resolve;
            recorder.onerror = event => reject(event.name);
        });

        let recorded = wait(lengthInMS).then(
            () => recorder.state == "recording" && recorder.stop()
        );

        return Promise.all([
            stopped,
            recorded
            ])
        .then(() => data);
    }

    window.stop = function (stream) {
        stream.getTracks().forEach(track => track.stop());
    }
    var formData = new FormData();
    if (startButton) {
        startButton.addEventListener("click", function () {
            startButton.innerHTML = "recording...";
            recorded.style.display = "none";
            stopButton.style.display = "inline-block";
            downloadButton.innerHTML = "rendering..";
            navigator.mediaDevices.getUserMedia({
                video: true,
                audio: false
            }).then(stream => {
                preview.srcObject = stream;
                localstream = stream;
                //downloadButton.href = stream;
                preview.captureStream = preview.captureStream || preview.mozCaptureStream;
                return new Promise(resolve => preview.onplaying = resolve);
            }).then(() => startRecording(preview.captureStream(), recordingTimeMS))
            .then(recordedChunks => {
                let recordedBlob = new Blob(recordedChunks, {
                type: "video/webm"
                });
                recording.src = URL.createObjectURL(recordedBlob);

                formData.append('_token', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
                formData.append('video', recordedBlob);

                downloadLocalButton.href = recording.src;
                downloadLocalButton.download = "RecordedVideo.webm";
                log("Successfully recorded " + recordedBlob.size + " bytes of " +
                recordedBlob.type + " media.");
                startButton.innerHTML = "Start";
                stopButton.style.display = "none";
                recorded.style.display = "block";
                downloadButton.innerHTML = "Save";
                localstream.getTracks()[0].stop();
            })
            .catch(log);
        }, false);
    }
    if (downloadButton) {
        downloadButton.addEventListener("click", function () {
            $.ajax({
            url: this.getAttribute('data-url'),
            method: 'POST',
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function (res) {
                if(res.success){
                    location.reload();
                }
            }
            });
        }, false);
    }
    if (stopButton) {
        stopButton.addEventListener("click", function () {
            stop(preview.srcObject);
            startButton.innerHTML = "Start";
            stopButton.style.display = "none";
            recorded.style.display = "block";
            downloadButton.innerHTML = "Save";
            localstream.getTracks()[0].stop();
        }, false);
    }
</script>

@endsection
