@extends('admin.layout.default')

@section('title')
{{ $title='Quản lý box contact' }}
@stop

@section('content')

<!-- inclue Search form 

-->
<div class="row margin-bottom">
	<div class="col-xs-12">
		<a href="{{ action('AdminBoxContactController@create') }}" class="btn btn-primary">Thêm box contact</a>
	</div>
</div>

<div class="row">
	<div class="col-xs-12">
	  <div class="box">
		<div class="box-header">
		  <h3 class="box-title">Danh sách box contact</h3>
		</div>
		<div class="box-body table-responsive no-padding">
			<table class="table table-hover">
				<tr>
					<th>ID</th>
					<th>Tên box Vietnamese</th>
					<th>Vị trí</th>
					<th>Hiển thị</th>
					<th style="width:200px;">Action</th>
				</tr>
				@foreach($list as $box)
				<tr>
					<td>{{ $box->id }}</td>
					<td>{{ Common::getNameBox($box) }}</td>
					<td>Footer</td>
					<td>
					<a href="{{ action('AdminBoxContactController@edit', $box->id) }}" class="btn btn-primary">Sửa</a>
						{{ Form::open(array('method'=>'DELETE', 'action' => array('AdminBoxContactController@destroy', $box->id), 'style' => 'display: inline-block;')) }}
						<button class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?');">Xóa</button>
						{{ Form::close() }}
					</td>
				</tr>
				@endforeach
			</table>
		</div>
	  </div>
	</div>
</div>

@stop

