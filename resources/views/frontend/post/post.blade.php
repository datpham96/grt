@extends('frontend.Layouts.default')
@section('title' , 'Bài viết')

@section('content')
<h2 class="title-special" style="text-align: left;"><span><a style="color: #333; font-weight: 700" class="hover-under" href="{{ url('') }}">Trang chủ</a> / Tin tức</span></h2>

<!-- List Post -->
<div class="col-sm-9">
	@foreach($getPost as $val)
	<div class="list-post" style="text-align: justify;">
		<div class="row">
			<div class="image-post col-md-2">
				<a href="{{ url('') }}/post/{{ $val->id }}"">
					<img src="{{ url('') }}/{{ $val->avatar }}" alt="{{ $val->name }}" />
				</a>				
			</div>
			<div class="col-md-10">
				<p>
					<a href="{{ url('') }}/post/{{ $val->id }}">{{ app('Home')->strWord($val->name, 15) }}</a>
				</p>
				<p>
					{{ app('Home')->strWord($val->description, 60) }}
				</p>
				<i class="fa fa-clock-o"></i> {{ app('Home')->formatDate($val->created_at) }}  
			</div>	
		</div>
	</div>
	<hr />
	@endforeach
	<!-- Pagination -->
	<div class="row">
		{{ $getPost->links() }}
	</div>
</div>
@endsection