
@extends('layouts.app', ['page' => __('Tables'), 'pageSlug' => 'tables'])

@section('content')

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div align="right">
                <a href="{{ route('videos.index') }}" class="btn btn-default">Back</a>
            </div>
            <br />
     <form method="post" action="{{ route('videos.update', $media->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
      <div class="form-group">
       <label class="col-md-4 text-left">Video Name</label>
       <div class="col-md-8">
        <input type="text" name="first_name" value="{{ $media->file_name }}" class="form-control input-lg" />
       </div>
      </div>
      <br />
<br>

      <div class="form-group text-center">
       <input type="submit" name="edit" class="btn btn-primary input-lg" value="Update" />
      </div>
     </form>

@endsection
