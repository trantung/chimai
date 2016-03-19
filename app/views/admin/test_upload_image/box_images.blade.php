@if(isset($images))
	@foreach($images as $value)
		<li>
			<div class="box-image">
				<img src="{{ url(UPLOADIMG . '/test/1/' . $value->image_url) }}" />	
			</div>
			<div class="box-text">
				<div class="row">
					<div class="col-xs-3">Tên: </div>
					<div class="col-xs-9">
						<input type="text" value="{{ $value->name }}" id="name_{{ $value->id }}" />
					</div>
				</div>
				<div class="row">
					<div class="col-xs-5">Mức ưu tiên: </div>
					<div class="col-xs-7">
						<input type="text" value="{{ $value->weight_number }}" id="weight_number_{{ $value->id }}" />
					</div>
				</div>
			</div>
			<div class="box-action">
				<a class="btn btn-danger" href="javascript:void(0);" onclick="if(confirm('Bạn có chắc chắn muốn xóa?')) deleteImage({{ $value->id }});">Xóa</a>
				<a class="btn btn-success" href="javascript:void(0);" onclick="updateText({{ $value->id }});">Cập nhật</a> 
				<span id="load_msg_{{ $value->id }}"></span>
				<span id="success_msg_{{ $value->id }}">Đã lưu</span>
			</div>
		</li>
	@endforeach
@endif