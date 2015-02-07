@extends('layout')

@section('content')
<style type="text/css">
.black{
	height: 130px;
}
</style>
<div class="black"></div>
@foreach($images as $key => $item)
<div class="col-sm-4 portfolio-item">
	<div class="caption">
		<div class="caption-content">
			<!-- <i class="fa fa-search-plus fa-3x"></i> -->
		</div>
	</div>
	<img src="{{$item->path}}{{$item->filename}}" class="img-responsive" alt="">
	<div>
		@foreach($item->tags as $items)

		<button>{{$items->name}}</button>
		@endforeach
	</div>		
</div>

@endforeach

@end