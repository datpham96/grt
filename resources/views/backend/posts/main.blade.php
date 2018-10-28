@extends('backend.Layouts.default')
@section ('title', 'Tin tức')
@section ('myJs')
<script type="text/javascript" src="{{ url('') }}/js/ctrl/backend/postCtrl.js"></script>
<script src="{{url('')}}/js/factory/service/backend/postService.js"></script>
<script>
	ngApp.value('$postInfo', {redirectProduct: '{{route("posts")}}'});
</script>
@endsection

@section('content')
<div ng-view>
	
</div>
@endsection