@extends('admin.layout.default')

@section('title')
{{ $title='Quản lý box tin' }}
@stop

@section('content')

<!-- inclue Search form 

-->
<div class="row margin-bottom">
	<div class="col-xs-12">
		<a href="{{ action('AdminOriginController@create') }}" class="btn btn-primary">Thêm</a>
	</div>
</div>

<div class="row">
	<div class="col-xs-12">
	  <div class="box">
		<div class="box-header">
		  <h3 class="box-title">Danh sách các nước xuất xứ</h3>
		</div>
		<div class="box-body table-responsive no-padding">
			<table class="table table-hover">
				<tr>
					<th>ID</th>
					<th>Tên nước tiếng việt</th>
					<th>Thứ tự</th>
					<th>Trạng thái</th>
				</tr>
				@foreach(Origin::whereIn('id', $list)->get() as $box)
					<tr>
						<td>{{ $box->id }}</td>
						<td>{{ $box->name }}</td>
						<td>{{ $box->weight_number }}</td>
						<td>{{ Common::getStatusProperty($box->status) }}</td>
					</tr>
				@endforeach
			</table>
		</div>
	  </div>
	</div>
</div>

@stop

