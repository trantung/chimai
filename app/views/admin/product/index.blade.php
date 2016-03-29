@extends('admin.layout.default')

@section('title')
{{ $title='Quản lý sản phẩm' }}
@stop

@section('content')

<div class="row margin-bottom">
	<div class="col-xs-12">
		<a href="{{ action('AdminProductController@create') }}" class="btn btn-primary">Thêm</a>
	</div>
</div>

<div class="row">
	<div class="col-xs-12">
	    <div class="box">
			<div class="box-header">
			  <h3 class="box-title">Danh sách sản phẩm (Total: {{ $list->getTotal() }})</h3>
			</div>
			<div class="box-body table-responsive no-padding">
				<table class="table table-hover">
					<tr>
						<th>ID</th>
						<th>Ảnh đại diện</th>
						<th>Tên</th>
						<th>Trạng thái</th>
						<th style="width:200px;">Action</th>
					</tr>
					@foreach($list as $value)
						<tr>
							<td>{{ $value->id }}</td>
							<td><img src="{{ UPLOADIMG . '/Product/' . $value->id . '/' . $value->image_url }}" width="70px" /></td>
							<td>{{ $value->name }}</td>
							<td>{{ Common::getStatusProperty($value->status) }}</td>
							<td>
								<a href="{{ action('AdminProductController@edit', $value->id) }}" class="btn btn-primary">Sửa</a>
								{{ Form::open(array('method'=>'DELETE', 'action' => array('AdminProductController@destroy', $value->id), 'style' => 'display: inline-block;')) }}
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

<div class="row">
	<div class="col-xs-12">
		<ul class="pagination">
		{{ $list->appends(Request::except('page'))->links() }}
		</ul>
	</div>
</div>

@stop

