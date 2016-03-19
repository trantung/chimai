@extends('admin.layout.default')

@section('title')
{{ $title='Test upload images' }}
@stop

@section('content')

<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-body">
                <input type="file" name="file_upload" id="file_upload" />
                <input id="process_url" name="process_url" type="hidden" value="{{ url('admin/test_upload_image') }}" />
                <p>Kích thước: {{ IMAGE_PRODUCT_WIDTH }}x{{ IMAGE_PRODUCT_HEIGHT }} / Dung lượng < 1Mb / Định dạng: jpg, jpeg, gif, png</p>
                <div id="box_images">
                    <ul>
                        @if(isset($images))
                            {{ $images }}
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin.common.uploadify')

@stop
