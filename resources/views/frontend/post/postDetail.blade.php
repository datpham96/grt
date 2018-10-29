@extends('frontend.Layouts.default')
@section('title' , 'Chi tiết bài viết')

@section('content')
<h2 class="title-special" style="text-align: left;"><span><a style="color: #333; font-weight: 700;" href="{{ url('') }}" class="hover-under">Trang chủ</a> / <a style="color: #333; font-weight: 700;" href="{{ url('') }}/post" class="hover-under">Tin tức</a> / {{ app('Home')->strWord($getPostDetail->name, 10) }}</span></h2>
<!-- Introduc Company -->
<div class="col-sm-9 product">
	<div class="detail">
		<h4 style="color: blue">{{ $getPostDetail->name }}</h4>
		<br />
		<p style="text-align: justify;">{!! $getPostDetail->content !!}</p><br />
	</div>

</div>
@endsection