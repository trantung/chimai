@extends('admin.layout.default')

@section('title')
{{ $title='Quản lý sản phẩm' }}
@stop

@section('content')

<!-- inclue Search form 

-->
<div class="row margin-bottom">
	<div class="col-xs-12">
		<a href="{{ action('AdminProductController@create') }}" class="btn btn-primary">Thêm</a>
	</div>
</div>

<div class="row">
	<div class="col-xs-12">
	    <div class="box">
			<div class="box-header">
			  <h3 class="box-title">Danh sách sản phẩm</h3>
			</div>
			<div class="box-body table-responsive no-padding">
				<table class="table table-hover">
					<tr>
						<th>ID</th>
						<th>Ảnh</th>
						<th>Tên</th>
						<th>Trạng thái</th>
						<th style="width:200px;">Action</th>
					</tr>
					


				</table>
			</div>
	    </div>
	</div>
</div>

@stop

