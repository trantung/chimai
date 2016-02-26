<aside class="main-sidebar">
	<section class="sidebar">
		<ul class="sidebar-menu">
			<li class="header">Menu</li>
			<li>
				<a href="{{ action('ManagerController@index') }}">
					<i class="fa fa-users"></i> <span>Quản lý thành viên</span>
				</a>
			</li>
			<li class="treeview">
				<a href="#">
					<i class="fa fa-list"></i> <span>Quản lý box</span>
					<i class="fa fa-angle-left pull-right"></i>
				</a>
				<ul class="treeview-menu">
					<li><a href="{{ action('BoxTypeController@index') }}"><i class="fa fa-circle-o"></i> Quản lý box tin tức</a></li>
				</ul>
				<ul class="treeview-menu">
					<li><a href="{{ action('BoxCollectionController@index') }}"><i class="fa fa-circle-o"></i> Quản lý box sưu tập</a></li>
				</ul>
				<ul class="treeview-menu">
					<li><a href="{{ action('BoxProductController@index') }}"><i class="fa fa-circle-o"></i> Quản lý box sản phẩm</a></li>
				</ul>

			</li>
		</ul>
	</section>
</aside>