@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        @if(Session::has('message'))
		<div class="alert alert-success">{{Session::get('message')}}</div>
		@endif
            <div class="card">
                <div class="card-header">{{ __('All Ringtones') }}</div>
                <br>
               <center><span>
                <a href="{{route('ringtones.create')}}"><button class="btn btn-primary">Create Ringtone</button></a>
                </span></center>
                <br>
                <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">File</th>
      <th scope="col">Category</th>
      <th scope="col">Size</th>
      <th scope="col">Download</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
  @if(count($ringtones)>0)
  @foreach($ringtones as $key =>$ringtone)
    <tr>
      <th scope="row">{{$key+1}}</th>
      <td>{{$ringtone->title}}</td>
      <td>{{$ringtone->description}}</td>
      <td>
      <audio controls controlsList="nodownload" type="audio/ogg" src="/audio/{{$ringtone->file}}" onplay="pauseOthers(this);"></audio>
      </td>
      <td>{{$ringtone->category->name}}</td>
      <td>{{$ringtone->size}}bytes</td>
      <td>{{$ringtone->download}}</td>
      <td>
      <a href="{{route('ringtones.edit',[$ringtone->id])}}">
      <button class="btn btn-info">Edit</button>
      </a>
      </td>
      <td>
      <form action="{{route('ringtones.destroy',[$ringtone->id])}}" method="post" onsubmit="return confirm('Do you want to delete?')">
      @csrf
      @method('DELETE')
     <button type="submit" class="btn btn-danger">Delete</button>
      </form>
      </td>
    </tr>
    @endforeach
    @else
    <td>No ringtone to display</td>
    @endif
  </tbody>
</table>

            </div>
        </div>
    </div>
</div>
@endsection
