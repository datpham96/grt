@extends('backend.Layouts.default')
@section ('title', 'Tin tức')
@section ('myJs')
	<script type="text/javascript" src="{{ url('') }}/js/ctrl/backend/postCtrl.js"></script>
	<script type="text/javascript" src="{{ url('') }}/js/ctrl/backend/postDetailCtrl.js"></script>
@endsection

@section('content')
<div ng-view>
	
</div>
@endsection