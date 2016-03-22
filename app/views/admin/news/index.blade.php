@extends('admin.layout.default')

@section('title')
{{ $title='Quản lý tin' }}
@stop

@section('content')

@include('admin.news.search')

<div class="row margin-bottom">
	<div class="col-xs-12">
		<a href="{{ action('NewsController@create') }}" class="btn btn-primary">Thêm mới tin</a>
	</div>
</div>

<div class="row">
	<div class="col-xs-12">
	  	<div class="box">
			<div class="box-header">
			  <h3 class="box-title">Danh sách tin</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body table-responsive no-padding">
				<table class="table table-hover">
					<tr>
						<th>ID</th>
						<th>Tiêu đề</th>
						<th>Thể loại</th>
						<th>Ngày đăng</th>
						<th style="width:200px;">Action</th>
					</tr>
					@foreach($inputNew as $value)
						<tr>
							<td>{{ $value->id }}</td>
							<td>{{ $value->name }}</td>
							<td>{{ $value->type_new_id }}</td>
							<td>{{ $value->created_at }}</td>
							<td>
								<a href="{{  action('NewsController@edit', $value->id) }}" class="btn btn-primary">Sửa</a>
								{{ Form::open(array('method'=>'DELETE', 'action' => array('NewsController@destroy', $value->id), 'style' => 'display: inline-block;')) }}
									<button class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?');">Xóa</button>
								{{ Form::close() }}
							</td>
						</tr>
					@endforeach
				</table>
			</div>
			<!-- /.box-body -->
	  	</div>
	  	<!-- /.box -->
	</div>
</div>

<div class="row">
	<div class="col-xs-12">
		<ul class="pagination">
		{{ $inputNew->appends(Request::except('page'))->links() }}
		</ul>
	</div>
</div>

@stop

