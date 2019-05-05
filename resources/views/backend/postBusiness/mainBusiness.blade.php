@extends('backend.Layouts.default')
@section ('title', 'Tin tức kinh doanh')
@section ('myJs')
<script type="text/javascript" src="{{ url('') }}/js/ctrl/backend/postBusinessCtrl.js"></script>
<script src="{{url('')}}/js/factory/service/backend/postBusinessService.js"></script>
<script src="{{url('')}}/js/factory/service/backend/businessService.js"></script>
<script>
	ngApp.value('$postInfo', {redirectProduct: '{{route("postBusiness")}}'});
</script>
@endsection

@section('content')
<div ng-view>
	
</div>
@endsection