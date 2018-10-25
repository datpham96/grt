@extends('backend.Layouts.default')
@section ('title', 'Sản phẩm')
@section ('myJs')
	<script type="text/javascript" src="{{ url('') }}/js/ctrl/backend/productCtrl.js"></script>
	<script type="text/javascript" src="{{ url('') }}/js/ctrl/backend/productDetailCtrl.js"></script>
@endsection

@section('content')
<div ng-view>
	
</div>
@endsection