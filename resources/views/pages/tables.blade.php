@extends('layouts.app', ['page' => __('Tables'), 'pageSlug' => 'tables'])

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card ">
      <div class="card-header">
        <h4 class="card-title">Recorded Video</h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
            <body>

                <div class="container mt-5">
                    <form action="{{route('fileUpload')}}" method="post" enctype="multipart/form-data">
                      <h3 class="text-center mb-5">Upload Video</h3>
                        @csrf
                        @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <strong>{{ $message }}</strong>
                        </div>
                      @endif

                      @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                      @endif

                        <div class="custom-file">
                            <input type="file" name="file" class="custom-file-input" id="chooseFile">
                            <label class="custom-file-label" for="chooseFile">Select file</label>
                        </div>

                        <button type="submit" name="submit" class="btn btn-primary btn-block mt-4">
                            Upload Video
                        </button>
                    </form>
                </div>

        <section class="wrapper">

        <section class="content">
          <div class="container-fluid">

            <form method="get" action="">
              <div class="d-block">

              </form>

              <br><br>
            <table class="table table-borderd table-striped">
              <tr>
                <th>Id</th>
                <th>video Name</th>
                <th>title</th>
                <th style="width: 300px;">video</th>
                <th>created Date</th>
                <th>Updated Date</th>
                <th>Action</th>
              </tr>
              @foreach ($file as $req )
              <tr>
                 <td>{{ $req->id }}</td>
                 <td>{{ $req->name }}</td>
                 <td>{{ $req->title }}</td>
                 <td>
                    {{-- <video width="150"
                    height="80"
                    controls poster=
         "https://media.geeksforgeeks.org/wp-content/cdn-uploads/20190710102234/download3.png">
                 <source src=
         "https://media.geeksforgeeks.org/wp-content/uploads/20200409094356/Placement100-_-GeeksforGeeks2.mp4"
                         type="video/mp4">
             </video> --}}
                 </td>
                 <td>{{ $req->file_path }}</td>
                 <td>{{ $req->created_at }}</td>
                 <td>{{ $req->updated_at }}</td>
                 <td>

                      {{--   @csrf
                        @method('DELETE')
                        <a href = 'delete/{{ $file->id }}'> --}}
                        <button type="submit" class="btn btn-danger">Delete</button></a></td>
              </tr>
              @endforeach
                </div>
            </table>
            </section>



        <script>
          function statefunction(id){
                swal({
                  title: "Are you sure?",
                  text: "You want to perform this action!",
                  type: "warning",
                  showCancelButton: true,
                  cancelButtonClass: 'btn-danger',
                  confirmButtonText: 'Yes,perform it',
                  cancelButtonText: "Cancel",
                  closeOnConfirm: false,
                  closeOnCancel: true
                },function(isConfirm) {
                  if(isConfirm){
                   jQuery.ajaxSetup({
                    headers: {
                      'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                    }
                  });
                  jQuery.ajax({
                    type: 'get',
                    url:  "{{url('/status/')}}/"+id,
                    success: function(data) {
                        if(data == 1){
                          var marketlogo = 'unblocked';
                        }
                        else{
                          var marketlogo = 'blocked';
                        }
                        swal({
                            title: "Done!",
                            text: "User "+marketlogo+" successfully!",
                            type: "success",
                            confirmButtonColor: "#069edb",
                          },
                           function() {
                          location.reload();
                        });
                      }
                  });
                }
                else
                {
                   window.location.replace("{{url('/marketlogo')}}");
                }
                });
              }

          </script>
        </body>
        </html>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection
