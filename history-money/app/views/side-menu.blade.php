<div class="sidebar-menu toggle-others fixed" style="">
	
	<div class="sidebar-menu-inner ps-container">	
		
		<header class="logo-env">
			
			<!-- logo -->
			<div class="logo">
				<a href="dashboard-1.html" class="logo-expanded">
					<img src="{{ URL::to('assets/img/logo-orange.png') }}" width="150" alt="eSPORTs logo">
				</a>
				
				<a href="dashboard-1.html" class="logo-collapsed">
					<img src="{{ URL::to('assets/img/logo-orange.png') }}" width="70" alt="eSPORTs logo">
				</a>
			</div>
			
			<!-- This will toggle the mobile menu and will be visible only on mobile devices -->
			<div class="mobile-menu-toggle visible-xs">
				<a href="#" data-toggle="user-info-menu">
					<i class="fa-bell-o"></i>
					<span class="badge badge-success">7</span>
				</a>
				
				<a href="#" data-toggle="mobile-menu">
					<i class="fa-bars"></i>
				</a>
			</div>
			
			<!-- This will open the popup with user profile settings, you can use for any purpose, just be creative -->
			<div class="settings-icon">
				<a href="#" data-toggle="settings-pane" data-animate="true">
					<i class="linecons-cog"></i>
				</a>
			</div>
			
						
		</header>
				
		
				
		<ul id="main-menu" class="main-menu">
			<li>
				<a href="{{ URL::to('dashboard') }}">
					<span class="title">Dashboard</span>
				</a>
			</li>
			<li>
				<a href="{{ URL::to('writhdraw') }}">
					<span class="title">Writhdraw</span>
				</a>
			</li>
			<li>
				<a href="{{ URL::to('deposit') }}">
					<span class="title">Deposit</span>
				</a>
			</li>
			<!-- add class "multiple-expanded" to allow multiple submenus to open -->
			<!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->
			<li class="auto-inherit-active-class">
				<a href="dashboard-1.html">
					<i class="linecons-cog"></i>
					<span class="title">Profile</span>
				</a>
				<ul>
					<li class="active">
						<a href="dashboard-2.html">
							<span class="title">Setting</span>
						</a>
					</li>
					<li>
						<a href="dashboard-4.html">
							<span class="title">Dashboard 4</span>
						</a>
					</li>
					<li>
						<a href="skin-generator.html">
							<span class="title">Skin Generator</span>
						</a>
					</li>
				</ul>
			</li>
		</ul>
				
	<div class="ps-scrollbar-x-rail" style="display: block; width: 340px; left: 0px; bottom: 3px;"><div class="ps-scrollbar-x" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="display: block; top: 0px; height: 955px; right: 2px;"><div class="ps-scrollbar-y" style="top: 0px; height: 0px;"></div></div></div>
	
</div>