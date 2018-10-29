@extends('frontend.Layouts.default')
@section('title' , 'Liên hệ')

@section('content')
<h2 class="title-special" style="text-align: left;"><span><a href="">Trang chủ</a> / <a href="">Liên hệ</a></span></h2>
<!-- Introduc Company -->
<div class="col-sm-9 product">
	<div class="contact">
		<div class="col-sm-8">
			<h2 class="title-special"><span>Chúng tôi luôn sẵn sàng phục vụ</span></h2>
			<!-- form contacts -->
			<form action="#" method="get">
				<input type="text" value="" placeholder="Họ và tên" />
				<input type="email" value="" class="email" placeholder="Email" />
				<input type="text" class="subject" value=""  placeholder="Tiêu đề" />
				<textarea name="" placeholder="Nội dung của bạn"></textarea>
				<div class="row">
					<div class="col-md-4">
						<input type="text" class="subject" value=""  placeholder="Tiêu đề" />
					</div>
					<div class="col-md-3">
						<img src="images/.jpg" alt="" />Ảnh captcha
					</div>
					<div class="col-md-4">
						<a href="#" class="btn  btn-lg"><span class="fa fa-refresh"></span></a>
					</div>
				</div>
				<br />
				<button type="button" class="btn btn-primary">GỬI</button>
			</form>
		</div>
		<div></div>
		<div class="col-sm-4">
			<h2 class="title-special"><span>Thông tin liên lạc</span></h2>
			<p>Công ty TNHH Green Tech</p>
			<p>Số 95, đường Hàm Nghi, Quận Hai Bà Trưng, Tp. Hà Nội</p>
			<p>Mobile: +2346 17 38 93</p>
			<p>Fax: 1-714-252-0026</p>
			<p>Email: <a href="#" title="">admin@grt.com</a></p>
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