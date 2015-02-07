@extends('layout')

@section('content')
<style type="text/css">
.black{
	height: 130px;
}
</style>
<div class="black"></div>
<h1>Show List</h1>

@foreach($tags->getCount() as $index => $item)
<div class="col-sm-1 btnbar">
<button class="btn" data-tag="tag{{$item->id}}">
	{{$item->name}}({{$item->count}})
</button>
</div>
@endforeach
@foreach($images as $item)
	<div class="col-sm-4 portfolio-item div-image
	@foreach($item->tags as $items)
		tag{{$items->id }}
	@endforeach">
		<div class="caption">
			<div class="caption-content">
				<!-- <i class="fa fa-search-plus fa-3x"></i> -->
			</div>
		</div>
		<img src="{{$item->path}}{{$item->filename}}" class="img-responsive" alt="">		
	</div>

@endforeach
@stop

@section('script')
<script type="text/javascript">
$(function(){

	$('.btnbar').on('click','.btn',function(){
		console.log($(this).data('tag'));
		var tagId = $(this).data('tag');
		console.log(tagId);
		$('.div-image').hide();
		$('.'+tagId).show();
	});
});
</script>
@stop
<!-- @yield('showTagImage','') -->
