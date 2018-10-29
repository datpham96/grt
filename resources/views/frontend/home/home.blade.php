@extends('frontend.Layouts.default')
@section('title' , 'Trang chủ')
@section('myJs')

@endsection


@section('content')
<div class="col-sm-9 product">
	<div class="list-product">
		<h2 class="title-special"><span>THÔNG TIN SẢN PHẨM</span></h2>
		@foreach($getProduct as $val)
		<div class="col-md-4">
			<div class="box-product">
				<div class="image">
					<a href="{{ url('') }}/product/{{ $val->category_id }}/{{ $val->id }}" title=""><img src="{{ url('') }}/{{ $val['avatar'] }}" title="{{ $val['name'] }}" alt="{{ $val['name'] }}" /></a>
				</div>
				<div class="name-pro">
					<a href="{{ url('') }}/product/{{ $val->category_id }}/{{ $val->id }}" title="">{{ $val->name }}</a>
				</div>
				<div class="add-cart">
					<a href="{{ url('') }}/product/{{ $val->category_id }}/{{ $val->id }}" title=""><i class="fa fa-angle-double-right"></i>Xem chi tiết</a>
				</div>
			</div>
			<!-- END box-product -->	
		</div>
		@endforeach
		
	</div>
	<!-- END list-product -->

</div>
@endsection