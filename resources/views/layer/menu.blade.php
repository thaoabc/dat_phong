<div class="sidebar" data-color="azure" data-image="{{ asset('img/1.jpg') }}">
    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-mini">
            Ct
        </a>

		<a href="http://www.creative-tim.com" class="simple-text logo-normal">
			Creative Tim
		</a>
    </div>

	<div class="sidebar-wrapper">
        <div class="user">
			<div class="info">
				<div class="photo">
                    <img src="{{ asset('img/1.jpg') }}" />
                </div>

				<a data-toggle="collapse" href="#collapseExample" class="collapsed">
					<span>
						Tania Andrew
                        <b class="caret"></b>
					</span>
                </a>

				<div class="collapse" id="collapseExample">
					<ul class="nav">
						<li>
							<a href="#pablo">
								<span class="sidebar-mini">MP</span>
								<span class="sidebar-normal">My Profile</span>
							</a>
						</li>

						<li>
							<a href="#pablo">
								<span class="sidebar-mini">EP</span>
								<span class="sidebar-normal">Edit Profile</span>
							</a>
						</li>

						<li>
							<a href="#pablo">
								<span class="sidebar-mini">S</span>
								<span class="sidebar-normal">Settings</span>
							</a>
						</li>
					</ul>
                </div>
			</div>
        </div>

		<ul class="nav">
			@if ( Session::has('cap_do') )
				@if((Session::get('cap_do'))==1)
		           <li>
					<a href="{{route('view_all_admin')}}">
						<i class="pe-7s-graph"></i>
						<p>Admin</p>
					</a>
				</li>
				<li>
					<a href="{{route('view_all_loai_phong')}}">
						<i class="pe-7s-graph"></i>
						<p>Loại phòng</p>
					</a>
				</li>
				<li>
					<a href="{{route('view_all_phong')}}">
						<i class="pe-7s-graph"></i>
						<p>Phòng</p>
					</a>
				</li>
				<li>
					<a href="{{route('view_dat_phong')}}">
						<i class="pe-7s-graph"></i>
						<p>Đặt phòng</p>
					</a>
				</li>
				<li>
					<a href="{{route('view_all_hoa_don')}}">
						<i class="pe-7s-graph"></i>
						<p>Hóa đơn</p>
					</a>
				</li>
				<li>
					<a href="{{route('view_chart')}}">
						<i class="pe-7s-graph"></i>
						<p>Thống kê</p>
					</a>
				</li>
		        @elseif ((Session::get('cap_do'))==2)
		        	<li>
					<a href="{{route('view_dat_phong')}}">
						<i class="pe-7s-graph"></i>
						<p>Đặt phòng</p>
					</a>
				</li>
				<li>
					<a href="{{route('view_all_hoa_don')}}">
						<i class="pe-7s-graph"></i>
						<p>Hóa đơn</p>
					</a>
				</li>
		        @endif
		    @endif
			
		</ul>
	</div>
</div>
