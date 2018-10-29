@extends('frontend.Layouts.default')
@section('title' , 'Chi tiết sản phẩm')

@section('content')
<h2 class="title-special" style="text-align: left;"><span><a class="hover-under" style="color: #333; font-weight: 700" href="{{ url('') }}">Trang chủ</a> / <a class="hover-under" style="color: #333; font-weight: 700" href="{{ url('') }}/category/{{ $getCateProductDetail->categorys->id }}">{{ $getCateProductDetail->categorys->name }}</a> / {{ $getCateProductDetail->name }}</span></h2>
<div class="col-sm-9 product product-details">
	<div class="details">
		<div class="details-pro">
			<div class="product-img-box col-sm-7">
				<a id="image-view" title="Product Image"><img id="image" src="{{ url('') }}/{{ $getCateProductDetail->avatar }}" alt="{{ $getCateProductDetail->name }}"></a>
				<br />
			</div>
			<!-- END product-img-box -->
			<div class="col-sm-5">
				<h1>{{ $getCateProductDetail->name }}</h1>
				<p class="sku"><p>{{ $getCateProductDetail->description }}</p>
				<div class="details-info">
					<p>{!! $getCateProductDetail->content !!}</p>

				</div>
			</div>
		</div>
		<!-- END details-pro -->		
	</div>
	<hr />
	<h2 class="title-special"><span>Một số sản phẩm liên quan</span></h2>
	<div class="list-product">
		@php
			$relateProduct = app('Home')->getProductByCate($getCateProductDetail->categorys->id);
		@endphp
		@foreach($relateProduct as $val)
		<div class="col-md-4">
			<div class="box-product">
				<div class="image">
					<a href="{{ url('') }}/product/{{ $val->categorys->id }}/{{ $val->id }}" title=""><img src="{{ url('') }}/{{ $val->avatar }}" title="{{ $val->name }}" alt="" /></a>
				</div>
				<div class="name-pro">
					<a href="{{ url('') }}/product/{{ $val->categorys->id }}/{{ $val->id }}" title="">{{ $val->name }}</a>
				</div>
				<div class="add-cart">
					<a href="{{ url('') }}/product/{{ $val->categorys->id }}/{{ $val->id }}" title=""><i class="fa fa-angle-double-right"></i>Xem chi tiết</a>
				</div>
			</div>
			<!-- END box-product -->	
		</div>
		@endforeach
		<!-- END list-recommended -->
	</div>
</div>
@endsection