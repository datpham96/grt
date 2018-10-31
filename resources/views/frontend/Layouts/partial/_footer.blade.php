<footer>
	<div class="footer-top">
		<div class="container">
			<div class="col-sm-2">
				<h3 style="text-decoration: underline">Trang chủ</h3>
				<ul>
					<li><a class="{{ request()->is('introduce') ? 'active-footer' : '' }}" href="{{ route('introduceF') }}" title="">Giới thiệu</a></li>
					@if(app('Home')->getCategory())
						@php
							$n = 0;
							foreach (app('Home')->getCategory() as $val){
								if ($n == 1) {
										break;
									}
								$n++;
								
								
						@endphp
						<li><a class="{{ (request('id') == $val['id']) ? 'active-footer' : '' }}" href="{{ url('') }}/category/{{ $val['id'] }}" title="">Sản phẩm</a></li>
						@php
							
						}
						@endphp
					@endif
					<li><a class="{{ request()->is('post') ? 'active-footer' : '' }}" href="{{ route('postF') }}" title="">Tin tức</a></li>
					<li><a class="{{ request()->is('contact') ? 'active-footer' : '' }}" href="{{ route('contactF') }}" title="">Liên hệ</a></li>
				</ul>
			</div>
			<div class="col-md-4">
				<h3 style="text-decoration: underline">Giới thiệu</h3>
				<ul>
					<p style="text-align: left">
						Công ty TNHH phát triển kỹ thuật xanh – Green Technology Development Company Limited.
					</p>
					<p style="text-align: justify;">

					</p>
				</ul>
			</div>
			<div class="col-md-4">
				<h3 style="text-decoration: underline">Thông tin</h3>
				<div style="margin-bottom: 3px;">Trụ sở chính: Số 14/91/5 Phố Ngô Thì Sỹ, Phường Vạn Phúc, Quận Hà Đông, TP Hà Nội</div>				
				<div style="margin-bottom: 3px;">Văn phòng đại diện: Số 6 Lô A9 Đầm Trấu, Phường Bạch Đằng, Quận Hai Bà Trưng, Hà Nội</div>
				<div style="margin-bottom: 3px;">Email: huuhung@grt.com.vn</div>
				<div style="margin-bottom: 3px;">Điện thoại: +84.915.801.684</div>
				<div style="margin-bottom: 3px;">Website: www.grt.com.vn</div>
			</div>
			<div class="col-md-2">
				<h3 style="text-decoration: underline">Mạng xã hội</h3>
				<a href="#" title=""><i class="fa fa-facebook" aria-hidden="true"></i></a>
				<a href="#" title=""><i class="fa fa-twitter" aria-hidden="true"></i></a>
				<a href="#" title=""><i class="fa fa-google-plus" aria-hidden="true"></i></a>
				<a href="#" title=""><i class="fa fa-youtube" aria-hidden="true"></i></a>
			</div>
		</div>
	</div>
	<!-- END footer-top -->
	<div class="footer-bottom">
		<div class="container" style="text-align: center;">
			<p>Copyright &copy; CMS_TEAM</p>
		</div>
	</div>
	<a class="toTop" style="display: block;" href="#"></a>
</footer>