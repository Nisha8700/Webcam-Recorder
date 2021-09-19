@extends('layouts.app', ['page' => __('Tables'), 'pageSlug' => 'tables'])

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card ">
      <div class="card-header">
        <h4 class="card-title"> Simple Table</h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table tablesorter " id="">
            <thead class=" text-primary">
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
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
