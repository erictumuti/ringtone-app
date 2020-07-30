@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
		@if(Session::has('message'))
		<div class="alert alert-success">{{Session::get('message')}}</div>
		@endif
            <div class="card">
                <div class="card-header">{{ __('Create Ringtone') }}</div>

                <div class="card-body">
                  <form action="{{route('ringtones.update',[$ringtone->id])}}" method="post" enctype="multipart/form-data">
                   @csrf
				   @method('PUT')
				  <div class="form-group">
				  <label for="title">Title:</label>
				  <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{$ringtone->title}}">
				  @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
				  </div>

				  <div class="form-group">
				  <label for="title">Description:</label>
				  <textarea name="description" class="form-control @error('description') is-invalid @enderror">
				  {{$ringtone->description}}
				  </textarea>
				  @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
				  </div>

				  <div class="form-group">
				  <label for="title">File:</label>
				  <input type="file" name="file" accept="audio/*" class="@error('file') is-invalid @enderror">
				  @error('file')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
				  </div>

				  <div class="form-group">
				  <label for="title">Category:</label>
				  <select name="category" class="form-control @error('category') is-invalid @enderror">
				  <option value="">Select category</option>
				  @foreach(App\Category::all() as $category)
				  <option value="{{$category->id}}"
				  @if($category->id==$ringtone->category_id)selected @endif
				  >
				  {{$category->name}}
				  </option>
				  @endforeach
				  </select>
				  @error('category')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
				  </div>

				  <div class="form-group">
				  <button type="submit" class="btn btn-primary">Update ringtone</button>
				  </div>

				  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
