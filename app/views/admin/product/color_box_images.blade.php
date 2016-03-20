@if(isset($images))
	@foreach($images as $value)
		<li>
			<div class="box-image">
				<img src="{{ url(UPLOADIMG . '/' . UPLOAD_FOLDER_COLOR . '/' . $value->product_id . '/' . $value->image_url) }}" />	
			</div>
			<div class="box-text">
				<div class="row">
					<div class="col-xs-3">Tên: </div>
					<div class="col-xs-9">
						<input type="text" value="{{ $value->name }}" id="color_name_{{ $value->id }}" />
					</div>
				</div>
				<div class="row">
					<div class="col-xs-5">Mức ưu tiên: </div>
					<div class="col-xs-7">
						<input type="text" value="{{ $value->weight_number }}" id="color_weight_number_{{ $value->id }}" />
					</div>
				</div>
			</div>
			<div class="box-action">
				<a class="btn btn-danger" href="javascript:void(0);" onclick="if(confirm('Bạn có chắc chắn muốn xóa?')) deleteImageColor({{ $value->id }});">Xóa</a>
				<a class="btn btn-success" href="javascript:void(0);" onclick="updateTextColor({{ $value->id }});">Cập nhật</a> 
				<span id="color_load_msg_{{ $value->id }}"></span>
				<span id="color_success_msg_{{ $value->id }}">Đã lưu</span>
			</div>
		</li>
	@endforeach
@endif