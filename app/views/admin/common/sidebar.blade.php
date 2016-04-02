<aside class="main-sidebar">
	<section class="sidebar">
		<ul class="sidebar-menu">
			<li class="header">Menu</li>
			<li>
				<a href="{{ action('AdminProductController@index') }}">
					<i class="fa fa-dropbox"></i> <span>Quản lý sản phẩm</span>
				</a>
			</li>

			<li class="treeview">
				<a href="#">
					<i class="fa fa-list"></i> <span>Properties sản phẩm</span>
					<i class="fa fa-angle-left pull-right"></i>
				</a>
				<ul class="treeview-menu">
					<li><a href="{{ action('AdminOriginController@index') }}"><i class="fa fa-circle-o"></i> Quản lý xuất xứ</a></li>
				</ul>
				<ul class="treeview-menu">
					<li><a href="{{ action('AdminSurfaceController@index') }}"><i class="fa fa-circle-o"></i> Quản lý bề mặt</a></li>
				</ul>
				<ul class="treeview-menu">
					<li><a href="{{ action('AdminCategoryController@index') }}"><i class="fa fa-circle-o"></i> Quản lý category</a></li>
				</ul>
				<ul class="treeview-menu">
					<li><a href="{{ action('AdminSizeController@index') }}"><i class="fa fa-circle-o"></i> Quản lý kích cỡ</a></li>
				</ul>
				<ul class="treeview-menu">
					<li><a href="{{ action('AdminMaterialController@index') }}"><i class="fa fa-circle-o"></i> Quản lý chất liệu</a></li>
				</ul>

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
			<li class="treeview">
				<a href="#">
					<i class="fa fa-list"></i> <span>Box hiển thị trang chủ</span>
					<i class="fa fa-angle-left pull-right"></i>
				</a>
				<ul class="treeview-menu">
					<li><a href="{{ action('AdminMenuController@index') }}"><i class="fa fa-circle-o"></i> Quản lý menu</a></li>
				</ul>
				<ul class="treeview-menu">
					<li><a href="{{ action('AdminMenuController@content') }}"><i class="fa fa-circle-o"></i> Quản lý content</a></li>
				</ul>
				<ul class="treeview-menu">
					<li><a href="{{ action('AdminMenuController@footer') }}"><i class="fa fa-circle-o"></i> Quản lý footer</a></li>
				</ul>
			</li>
			<li class="treeview">
				<a href="#">
					<i class="fa fa-list"></i> <span>Quản lý thư mục con trong box</span>
					<i class="fa fa-angle-left pull-right"></i>
				</a>
				<ul class="treeview-menu">
					<li>
						<a href="#">
							<i class="fa fa-circle-o"></i>Box tin tuc
						</a>
						<ul class="treeview-menu">
							<li>
								<a href="{{ action('NewsTypeController@index') }}">
									<i class="fa fa-users"></i> <span>Quản lý thể loại tin</span>
								</a>
							</li>
						</ul>
					</li>
				</ul>
				<ul class="treeview-menu">
					<li><a href="#"><i class="fa fa-circle-o"></i> Quản lý chuyên mục sưu tập</a>
						<ul class="treeview-menu">
							<li><a href="{{ action('BoxPdfController@index') }}"><i class="fa fa-circle-o"></i> Quản lý box pdf</a></li>
						</ul>
						<ul class="treeview-menu">
							<li><a href="{{ action('BoxVideoController@index') }}"><i class="fa fa-circle-o"></i> Quản lý box video</a></li>
						</ul>
						<ul class="treeview-menu">
							<li><a href="{{ action('BoxShowRoomController@index') }}"><i class="fa fa-circle-o"></i> Quản lý box showroom</a></li>
						</ul>
					</li>
				</ul>
			</li>
			
			<li>
				<a href="{{ action('NewsController@index') }}">
					<i class="fa fa-list"></i> <span>Quản lý tin tức</span>
				</a>
			</li>
			<li>
				<a href="{{ action('AdminPdfController@index') }}">
					<i class="fa fa-users"></i> <span>Quản lý file pdf</span>
				</a>
			</li>
			<li>
				<a href="{{ action('AdminImageController@index') }}">
					<i class="fa fa-users"></i> <span>Quản lý ảnh</span>
				</a>
			</li>
			<li>
				<a href="{{ action('AdminVideoController@index') }}">
					<i class="fa fa-users"></i> <span>Quản lý video</span>
				</a>
			</li>
			<li>
				<a href="{{ action('AdminSlideController@index') }}">
					<i class="fa fa-users"></i> <span>Quản lý Slide</span>
				</a>
			</li>
			
			<li>
				<a href="{{ action('AdminContactController@index') }}">
					<i class="fa fa-users"></i> <span>Quản lý liên hệ</span>
				</a>
			</li>
			<li>
				<a href="{{ action('SeoController@editSeo') }}">
					<i class="fa fa-users"></i> <span>Quản lý SEO Script</span>
				</a>
			</li>
			<li>
				<a href="{{ action('ConfigCodeController@editConfig') }}">
					<i class="fa fa-cogs"></i> <span>Cài đặt</span>
				</a>
			</li>
			<li>
				<a href="{{ action('ManagerController@index') }}">
					<i class="fa fa-users"></i> <span>Quản lý thành viên</span>
				</a>
			</li>
			<!-- <li>
				<a href="{{-- action('TestUploadImageController@index') --}}">
					<i class="fa fa-file-image-o"></i> <span>Test upload images</span>
				</a>
			</li> -->
			
		</ul>
	</section>
</aside>