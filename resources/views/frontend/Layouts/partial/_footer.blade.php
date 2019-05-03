<footer>
	<div class="footer-top">
		<div class="container">
			<div class="col-sm-2">
				<h3>Trang chủ</h3>
				<ul>
					<li><a class="{{ request()->is('introduce') ? 'active-footer' : '' }}" href="{{ route('introduceF') }}" title="">Giới thiệu</a></li>
					<li><a class="" href="" title="">Lĩnh vực kinh doanh</a></li>
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
			<div class="col-sm-4">
				<h3>Giới thiệu</h3>
				<ul>
					<p style="text-align: left">
						Công ty TNHH phát triển kỹ thuật xanh – Green Technology Development Company Limited.
					</p>
					<p style="text-align: justify;">

					</p>
				</ul>
			</div>
			<div class="col-md-4">
				<h3>Thông tin</h3>
				<div style="margin-bottom: 3px;">Trụ sở chính: Số 14/91/5 Phố Ngô Thì Sỹ, Phường Vạn Phúc, Quận Hà Đông, TP Hà Nội</div>				
				<div style="margin-bottom: 3px;">Văn phòng đại diện: Số 6 Lô A9 Đầm Trấu, Phường Bạch Đằng, Quận Hai Bà Trưng, Hà Nội</div>
				<div style="margin-bottom: 3px;">Email: huuhung@grt.com.vn</div>
				<div style="margin-bottom: 3px;">Điện thoại: +84.915.801.684</div>
				<div style="margin-bottom: 3px;">Website: www.grt.com.vn</div>
			</div>
			<div class="col-md-2">
				<h3>địa chỉ</h3>
				<iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d3725.3326433246543!2d105.78070326440657!3d20.97929894484209!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1zU-G7kSAxNC85MS81IFBo4buRIE5nw7QgVGjDrCBT4bu5LCBQaMaw4budbmcgVuG6oW4gUGjDumMsIFF14bqtbiBIw6AgxJDDtG5nLCBUUCBIw6AgTuG7mQ!5e0!3m2!1svi!2s!4v1556790286376!5m2!1svi!2s"  frameborder="0" style="border:0" allowfullscreen></iframe>
			</div>
		</div>
	</div>
	<!-- END footer-top -->
	<div class="footer-bottom">
		<div class="container" style="text-align: center;">
			<p>Copyright &copy; GreenTech Corp. All rights reserved. Designed by CMS_TEAM </p>
		</div>
	</div>
	<a class="toTop" style="display: block;" href="#"></a>
</footer>