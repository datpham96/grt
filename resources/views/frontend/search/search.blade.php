@extends('frontend.Layouts.default')
@section('title' , 'Tìm kiếm')

@section('content')
<h2 class="title-special" style="text-align: left;"><span><a style="color: #333; font-weight: 700" class="hover-under" href="{{ url('') }}">Trang chủ</a> > Tìm kiếm với từ khóa : "{{ $search }}"</span></h2>
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
	<div class="clearfix"></div>
	<!-- Pagination -->
	<div class="row pull-right">
		{{ $getSearch->appends(['search' => $search])->links() }}
	</div>		

</div>
@endsection