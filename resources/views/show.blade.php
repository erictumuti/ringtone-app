@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8" style="margin-top: 50px;">
            <div class="card">
                <div class="card-header">{{ $ringtone->title }}</div>

                <div class="card-body">
				<audio controls controlsList="nodownload" type="audio/ogg" src="/audio/{{$ringtone->file}}"></audio>
                </div>
			<div class="card-footer">
			<form action="{{route('ringtones.download',[$ringtone->id])}}" method="post">
			@csrf
			<button type="submit" class="btn btn-secondary">Download</button>
			</form>
			</div>
        </div>
		<table class="table mt-4">
         <tr>
		 <th>Name</th>
		 <td>{{$ringtone->title}}</td>
		 </tr>
		 <th>Description</th>
		 <td>{{$ringtone->description}}</td>
		 </tr>
		 <th>Format</th>
		 <td>{{$ringtone->format}}</td>
		 </tr>
		 <th>Size</th>
		 <td>{{$ringtone->size}}</td>
		 </tr>
		 <th>Category</th>
		 <td>{{$ringtone->category->name}}</td>
		 </tr>
		 <th>Download</th>
		 <td>{{$ringtone->download}}</td>
		 </tr>
		</table>
    </div>
	<div class="col-md-4" style="margin-top: 50px;">
        <div class="card-header">Categories</div>
        @foreach(App\Category::all() as $category)
        <div class="card-header" style="background-color: #ccc"><a href="{{route('ringtones.category',[$category->id])}}">{{$category->name}}</a></div>
        @endforeach
        </div>
		</div>
		<div id="wpac-comment"></div>
<script type="text/javascript">
wpac_init = window.wpac_init || [];
wpac_init.push({widget: 'Comment', id: 26529});
(function() {
    if ('WIDGETPACK_LOADED' in window) return;
    WIDGETPACK_LOADED = true;
    var mc = document.createElement('script');
    mc.type = 'text/javascript';
    mc.async = true;
    mc.src = 'https://embed.widgetpack.com/widget.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(mc, s.nextSibling);
})();
</script>
<a href="https://widgetpack.com" class="wpac-cr">Comments System WIDGET PACK</a>
</div>
@endsection
