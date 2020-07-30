@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
		@if(count($ringtones)>0)
        @foreach($ringtones as $ringtone)
            <div class="card" style="margin-top: 50px;">
                <div class="card-header">{{ $ringtone->title }}</div>

                <div class="card-body">
                <audio controls controlsList="nodownload" type="audio/ogg" src="/audio/{{$ringtone->file}}" onplay="pauseOthers(this);"></audio>
                </div>
                <div class="card-footer">
                <a href="{{route('ringtones.show',[$ringtone->id,$ringtone->slug])}}">Info and download</a>
                </div>
            </div>
            @endforeach
			@else
			<h2 style="margin-top: 100px;">No ringtones to show</h2>
			@endif
        </div>
        <div class="col-md-4" style="margin-top: 50px;">
        <div class="card-header">Categories</div>
        @foreach(App\Category::all() as $category)
        <div class="card-header" style="background-color: #ccc"><a href="{{route('ringtones.category',[$category->id])}}">{{$category->name}}</a></div>
        @endforeach
        </div>
    </div>
</div>
@endsection
