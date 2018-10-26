@extends('backend.Layouts.default')
@section ('title', 'Sản phẩm')
@section ('myJs')
<script type="text/javascript" src="{{ url('') }}/js/ctrl/backend/productCtrl.js"></script>

<script src="{{url('')}}/js/factory/service/backend/productService.js"></script>
<script src="{{url('')}}/js/factory/service/backend/categoryService.js"></script>
<script>
	ngApp.value('$productInfo', {redirectProduct: '{{route("products")}}'});
</script>
@endsection

@section('content')
<div ng-view>
	
</div>
@endsection