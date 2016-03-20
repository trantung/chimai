@if(isset($images))
	@foreach($images as $value)
		<li>
			<div class="box-image">
				<img src="{{ url(UPLOADIMG . '/' . UPLOAD_FOLDER_PICTURE . '/' . $value->product_id . '/' . $value->image_url) }}" />	
			</div>
			<div class="box-text">
				<div class="row">
					<div class="col-xs-3">Tên: </div>
					<div class="col-xs-9">
						<input type="text" value="{{ $value->name }}" id="picture_name_{{ $value->id }}" />
					</div>
				</div>
				<div class="row">
					<div class="col-xs-5">Mức ưu tiên: </div>
					<div class="col-xs-7">
						<input type="text" value="{{ $value->weight_number }}" id="picture_weight_number_{{ $value->id }}" />
					</div>
				</div>
			</div>
			<div class="box-action">
				<a class="btn btn-danger" href="javascript:void(0);" onclick="if(confirm('Bạn có chắc chắn muốn xóa?')) deleteImagePicture({{ $value->id }});">Xóa</a>
				<a class="btn btn-success" href="javascript:void(0);" onclick="updateTextPicture({{ $value->id }});">Cập nhật</a> 
				<span id="picture_load_msg_{{ $value->id }}"></span>
				<span id="picture_success_msg_{{ $value->id }}">Đã lưu</span>
			</div>
		</li>
	@endforeach
@endif