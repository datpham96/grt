<div class="header-menu">
	<div class="container" style="background-color: #25a003">
		<div class="col-sm-9 col-xs-9 menu-top">
			<nav class="navbar navbar-inverse">
				<div class="container-fluid">
					<div class="navbar-header">
						<a class="navbar-brand" href="#">WebSiteName</a>
					</div>
					<ul class="nav navbar-nav">
						<li class="{{ request()->is('/') ? 'active' : '' }}"><a href="{{ url('') }}">TRANG CHỦ</a></li>
						<li class="{{ request()->is('introduce') ? 'active' : '' }}"><a href="{{ route('introduceF') }}">GIỚI THIỆU</a></li>
						<li class="{{ request()->is('post') ? 'active' : '' }}"><a href="{{ route('postF') }}">LĨNH VỰC KINH DOANH</a></li>
						<li class="dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" href="#">SẢN PHẨM
								<span class="caret"></span></a>
								<ul class="dropdown-menu">
									@foreach(app('Home')->getCategory() as $val)
									<li><a href="{{ url('') }}/category/{{ $val['id'] }}">{{ $val['name'] }}</a></li>
									@endforeach
								</ul>
							</li>
							<li class="{{ request()->is('post') ? 'active' : '' }}"><a href="{{ route('postF') }}">TIN TỨC</a></li>	
							<li class="{{ request()->is('contact') ? 'active' : '' }}"><a href="{{ route('contactF') }}">LIÊN HỆ</a></li>
						</ul>
					</div>
				</nav>
			</div>
			<div class="col-sm-3 col-xs-3 box-search" >
				<form action="{{ route('getSearchF') }}" method="get" class="form-search" style="width: 270px;border-radius: 25px;">
					<input type="text" name="search" class="input-text" />
					<button title="Tìm kiếm" type="submit" class="sub_search">Tìm kiếm</button>
				</form>
			</div>
		</div>
	</div>