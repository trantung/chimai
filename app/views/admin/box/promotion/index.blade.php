@extends('admin.layout.default')

@section('title')
{{ $title='Quản lý box tin' }}
@stop

@section('content')

<!-- inclue Search form 

-->
<div class="row">
	<div class="col-xs-12">
	  <div class="box">
		<div class="box-header">
		  <h3 class="box-title">Danh sách box tin</h3>
		</div>
		<div class="box-body table-responsive no-padding">
			<table class="table table-hover">
				<tr>
					<th>ID</th>
					<th>Tên Vietnamese</th>
					<th>Hình ảnh</th>
					<th style="width:200px;">Action</th>
				</tr>
				<tr>
					<td>{{ $box->id }}</td>
					<td>{{ Common::getNameBox($box) }}</td>
					<td><img src="{{ UPLOADIMG . '/BoxPromotion/' . $box->id . '/' . $box->image_url }}" width="70px" /></td>
					<td>
						<a href="{{ action('BoxTypeController@edit', $box->id) }}" class="btn btn-primary">Sửa</a>
					</td>
				</tr>
			</table>
		</div>
	  </div>
	</div>
</div>

@stop

