@extends('frontend.Layouts.default')
@section('title' , 'Trang chủ')

@section('content')
	@foreach($getlistCateProduct as $val)
		<div>{{$val['name']}}</div>
	@endforeach

	{{ $getlistCateProduct->links() }}
@endsection