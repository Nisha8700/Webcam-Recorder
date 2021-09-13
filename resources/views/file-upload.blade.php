


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <body>

        <div class="container mt-5">
            <form action="{{route('fileUpload')}}" method="post" enctype="multipart/form-data">
              <h3 class="text-center mb-5">Upload File in Laravel</h3>
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
                    Upload Files
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
         <td>{{ $req->file_path }}</td>
         <td>{{ $req->created_at }}</td>
         <td>{{ $req->updated_at }}</td>
         <td>

                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger">Delete</button>
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
