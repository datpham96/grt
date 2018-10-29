@extends('frontend.Layouts.default')
@section('title' , 'Tìm kiếm')

@section('content')
{{ $search }}
<h2 class="title-special" style="text-align: left;"><span>Trang chủ > Tìm kiếm với từ khóa : "Sản phẩm 1"</span></h2>
<div class="col-sm-9 product">
	<div class="list-product">
		@foreach($getSearch as $val)
		<div class="col-md-4">
			<div class="box-product">
				<div class="image">
					<a href="#" title=""><img src="{{ url('') }}/{{ $val->avatar }}" title="" alt="{{ $val->name }}" /></a>
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
	</div>
	<!-- END list-product -->

	<!-- Pagination -->
	<div class="row pull-right">
		<ul class="pagination">
			<li><a href="#">&laquo;</a></li>
			<li><a href="#">1</a></li>
			<li><a href="#">2</a></li>
			<li><a href="#">3</a></li>
			<li><a href="#">4</a></li>
			<li><a href="#">5</a></li>
			<li><a href="#">&raquo;</a></li>
		</ul>
	</div>		

</div>
@endsection