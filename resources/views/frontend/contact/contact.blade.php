@extends('frontend.Layouts.default')
@section('title' , 'Liên hệ')
@section('myJs')
	<script type="text/javascript" src="{{ url('') }}/js/factory/service/frontend/contactService.js"></script>

	<!-- include ctrl -->
	<script type="text/javascript" src="{{ url('') }}/js/ctrl/frontend/contactCtrl.js"></script>
@endsection
@section('content')
<h2 class="title-special" style="text-align: left;"><span><a class="hover-under" style="color: #333; font-weight: 700" href="{{ url('') }}">Trang chủ</a> / Liên hệ</span></h2>
<!-- Introduc Company -->
<div class="col-sm-9 product" >
	<div class="contact" ng-controller="contactCtrl">
		<div class="col-sm-8">
			<h2 class="title-special"><span>Chúng tôi luôn sẵn sàng phục vụ</span></h2>
			<!-- form contacts -->
			<p ng-repeat="(key, val) in errors" style="text-align: center">
				<span style="color: red">@{{ val.name[0] }}</span>
			</p>
			<p ng-repeat="(key, val) in errors" style="text-align: center">
				<span style="color: red">@{{ val.email[0] }}</span>
			</p>
			<p ng-repeat="(key, val) in errors" style="text-align: center">
				<span style="color: red">@{{ val.content[0] }}</span>
			</p>
			<p ng-repeat="(key, val) in errors" style="text-align: center">
				<span style="color: red">@{{ val.title[0] }}</span>
			</p>
			<p ng-repeat="(key, val) in errors" style="text-align: center">
				<span style="color: red">@{{ val.captcha[0] }}</span>
			</p>
			<div class="clearfix"></div>
			<form>
				<input autocomplete="off" required  type="text" name="name" ng-model="data.name" placeholder="Họ và tên" />
				<input autocomplete="off" required type="email" name="email" ng-model="data.email" class="email" placeholder="Email" />
				<input autocomplete="off" required type="text" class="subject" ng-model="data.title" name="title"  placeholder="Tiêu đề" />
				<textarea required name="content" ng-model="data.content" placeholder="Nội dung của bạn"></textarea>
				<div class="clearfix"></div>
				<div>
					<input autocomplete="off" required placeholder="Nhập captcha" ng-model="data.captcha" type="text" class="form-control" ng-model="data.paramData.captcha" name="captcha" >
				</div>
				<div class="col-sm-6" style="width: 170px; height: 40px;margin-left: -15px;" id="refereshrecapcha" > {!! captcha_img('flat') !!}</div>
				<div class="col-sm-1">
					<a ng-click="actions.refreshCaptcha()"><i style="font-size: 22px; margin-top: 5px; cursor: pointer;" class="fa fa-refresh" aria-hidden="true"></i></a>
				</div>											
				<div class="clearfix"></div>
				<br />
				<button type="submit" class="btn btn-primary" ng-click="actions.sendMail()">GỬI</button>
			</form>
		</div>
		<div></div>
		<div class="col-sm-4">
			<h2 class="title-special"><span>Thông tin liên lạc</span></h2>
			<p>Công ty TNHH phát triển kỹ thuật xanh – Green Technology Development Company
Limited</p>
			<p><b>Trụ sở chính</b>: Số 14/91/5 Phố Ngô Thì Sỹ, Phường Vạn Phúc, Quận Hà Đông, TP Hà Nội</p>
			<p><b>Văn phòng đại diện</b>: Số 6 Lô A9 Đầm Trấu, Phường Bạch Đằng, Quận Hai Bà Trưng, Hà Nội</p>
			<p><b>Email</b>: huuhung@grt.com.vn</p>
			<p><b>Điện thoại</b>: +84.915.801.684</p>
			<p><b>Website</b>: <a style="color: blue text-decoration: underline" href="http://www.grt.com.vn">grt.com.vn</a></p>
			<br />
			<h2 class="title-special"><span>Mạng xã hội</span></h2>
			<ul>
				<li><a href="#" title=""><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
				<li><a href="#" title=""><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
				<li><a href="#" title=""><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
				<li><a href="#" title=""><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
			</ul>
			<h2 class="title-special"><span></span></h2>
		</div>
	</div>
</div>
@endsection