@extends('admin.layout.default')

@section('title')
{{ $title='Quản lý bề mặt' }}
@stop

@section('content')

<!-- inclue Search form 

-->
<div class="row margin-bottom">
	<div class="col-xs-12">
		<a href="{{ action('BoxTypeChildController@create') }}" class="btn btn-primary">Thêm</a>
	</div>
</div>

<div class="row">
	<div class="col-xs-12">
	  <div class="box">
		<div class="box-header">
		  <h3 class="box-title">Danh sách thể loại</h3>
		</div>
		<div class="box-body table-responsive no-padding">
			<table class="table table-hover">
				<tr>
					<th>ID</th>
					<th>Tên thể loại tiếng việt</th>
					<th>Thứ tự</th>
					<th>Trạng thái</th>
					<th style="width:200px;">Action</th>
				</tr>
				@foreach(TypeNew::whereIn('id', $list)->get() as $box)
					<tr>
						<td>{{ $box->id }}</td>
						<td>{{ $box->name }}</td>
						<td>{{ $box->weight_number }}</td>
						<td>{{ Common::getStatusProperty($box->status) }}</td>
						<td>
							<a href="{{ action('BoxTypeChildController@edit', $box->id) }}" class="btn btn-primary">Sửa</a>
							{{ Form::open(array('method'=>'DELETE', 'action' => array('BoxTypeChildController@destroy', $box->id), 'style' => 'display: inline-block;')) }}
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

