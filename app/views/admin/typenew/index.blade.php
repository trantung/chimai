@extends('admin.layout.default')

@section('title')
{{ $title='Quản lý tin' }}
@stop

@section('content')

@include('admin.typenew.search')

<div class="row margin-bottom">
	<div class="col-xs-12">
		<a href="{{ action('NewsTypeController@create') }}" class="btn btn-primary">Thêm tin</a>
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
			  <th>Ảnh đại diện</th>
			  <th>Tiêu đề</th>
			  <th>Box tin tức</th>
			  <th>Mức ưu tiên</th>
			  <th>Trạng thái</th>
			  <th>Ngày đăng</th>
			  <th style="width:200px;">&nbsp;</th>
			</tr>
			 @foreach($inputNewType as $newstype)
			<tr>
			  <td>{{ $newstype->id }}</td>
			  <td><img src="{{ UPLOADIMG . '/TypeNew/' . $newstype->id . '/' . $newstype->image_url }}" width="70px" /></td>
			  <td>{{ $newstype->name }}</td>
			  <td>{{ $newstype->boxType->name_menu }}</td>
			  <td>{{ $newstype->weight_number }}</td>
			  <td>{{ Common::getStatusProperty($newstype->status) }}</td>
			  <td>{{ $newstype->created_at }}</td>
			  <td>
				<a href="{{ action('NewsTypeController@edit', $newstype->id) }}" class="btn btn-primary">Sửa</a>
				{{ Form::open(array('method'=>'DELETE', 'action' => array('NewsTypeController@destroy', $newstype->id), 'style' => 'display: inline-block;')) }}
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
		{{ $inputNewType->appends(Request::except('page'))->links() }}
		</ul>
	</div>
</div>

@stop

