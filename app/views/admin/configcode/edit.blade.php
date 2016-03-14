@extends('admin.layout.default')

@section('title')
{{ $title='Cài đặt' }}
@stop

@section('content')

<div class="row">
	<div class="col-xs-12">
		<div class="box box-primary">
		{{ Form::open(array('action' => array('ConfigCodeController@updateConfig') , 'method' => 'POST', 'files' => true)) }}
			<div class="box-body">
				<div class="nav-tabs-custom">
					<ul class="nav nav-tabs">
						@foreach($langs as $keyLang => $singLang)
						<li <?php echo ($keyLang == VI)?'class="active"':''; ?>><a href="#tab_{{ $singLang }}" data-toggle="tab">{{ $singLang }}</a></li>
						@endforeach
					</ul>
					<div class="tab-content">
						@foreach($langs as $keyLang => $singLang)
						<div class="tab-pane <?php echo ($keyLang == VI)?'active':''; ?>" id="tab_{{ $singLang }}">
							<div class="form-group">
								<label>Hotline</label>
								<div class="row">
									<div class="col-sm-6">	                  	
									   {{ Form::text('code_'. $singLang .'['. HOTLINE_PHONE .']', CommonConfig::getConfigCode(HOTLINE_PHONE, $singLang) , textPlaceHolder('Hotline') + ['required'=>'']) }}
									</div>
								</div>
							</div>
							<div class="form-group">
								<label>Địa chỉ liên hệ</label>
								<div class="row">
									<div class="col-sm-6">	                  	
									   {{ Form::text('code_'. $singLang .'['. CONTACT_ADDRESS .']', CommonConfig::getConfigCode(CONTACT_ADDRESS, $singLang) , textPlaceHolder('Địa chỉ liên hệ')) }}
									</div>
								</div>
							</div>
							<div class="form-group">
								<label>Số điện thoại liên hệ</label>
								<div class="row">
									<div class="col-sm-6">	                  	
									   {{ Form::text('code_'. $singLang .'['. CONTACT_PHONE .']', CommonConfig::getConfigCode(CONTACT_PHONE, $singLang) , textPlaceHolder('Số điện thoại liên hệ')) }}
									</div>
								</div>
							</div>
							<div class="form-group">
								<label>Email liên hệ</label>
								<div class="row">
									<div class="col-sm-6">	                  	
									   {{ Form::text('code_'. $singLang .'['. CONTACT_EMAIL .']', CommonConfig::getConfigCode(CONTACT_EMAIL, $singLang) , textPlaceHolder('Email liên hệ')) }}
									</div>
								</div>
							</div>
							<div class="form-group">
								<label>Thời gian làm việc</label>
								<div class="row">
									<div class="col-sm-6">          	
									   {{ Form::text('code_'. $singLang .'['. CONTACT_WORKING_TIME .']', CommonConfig::getConfigCode(CONTACT_WORKING_TIME, $singLang) , textPlaceHolder('Thời gian làm việc')) }}
									</div>
								</div>
							</div>
							<div class="form-group">
								<label>Text cuối trang</label>
								<div class="row">
									<div class="col-sm-6">          	
									   {{ Form::text('code_'. $singLang .'['. FOOTER_TEXT .']', CommonConfig::getConfigCode(FOOTER_TEXT, $singLang) , textPlaceHolder('Text cuối trang') + ['required'=>'']) }}
									</div>
								</div>
							</div>
							<div class="form-group">
								<label>Link Facebook</label>
								<div class="row">
									<div class="col-sm-6">          	
									   {{ Form::text('code_'. $singLang .'['. SOCIAL_URL_FACEBOOK .']', CommonConfig::getConfigCode(SOCIAL_URL_FACEBOOK, $singLang) , textPlaceHolder('Link Facebook')) }}
									</div>
								</div>
							</div>
							<div class="form-group">
								<label>Link Google</label>
								<div class="row">
									<div class="col-sm-6">          	
									   {{ Form::text('code_'. $singLang .'['. SOCIAL_URL_GOOGLE .']', CommonConfig::getConfigCode(SOCIAL_URL_GOOGLE, $singLang) , textPlaceHolder('Link Google')) }}
									</div>
								</div>
							</div>
							<div class="form-group">
								<label>Link Instagram</label>
								<div class="row">
									<div class="col-sm-6">          	
									   {{ Form::text('code_'. $singLang .'['. SOCIAL_URL_INSTAGRAM .']', CommonConfig::getConfigCode(SOCIAL_URL_INSTAGRAM, $singLang) , textPlaceHolder('Link Instagram')) }}
									</div>
								</div>
							</div>

							@if($keyLang == VI)
							<div class="form-group">
								<label>Code Live Chat</label>
								<div class="row">
									<div class="col-sm-6">          	
									   {{ Form::text('code_'. $singLang .'['. CHAT_SCRIPT .']', CommonConfig::getConfigCode(CHAT_SCRIPT, $singLang) , textPlaceHolder('Code Live Chat')) }}
									</div>
								</div>
							</div>
							
							<div class="form-group">
								<label>Lat</label>
								<div class="row">
									<div class="col-sm-6">
										<input class="form-control" id="latitude" value="{{ CommonConfig::getConfigCode(LAT, $singLang) }}" name="code_{{ $singLang }}[{{ LAT }}]" required>
									</div>
								</div>
								<label>Long</label>
								<div class="row">
									<div class="col-sm-6">
										<input class="form-control" id="longitude" value="{{ CommonConfig::getConfigCode(LONG, $singLang) }}" name="code_{{ $singLang }}[{{ LONG }}]" required>
									</div>
								</div>
							</div>
							<div class="form-group">
			                    <div id="mapview" style="width:100%;height:500px"></div>
			                </div>
			                @endif

						</div>
						<!-- /.tab-pane -->
						@endforeach
					</div>
					<!-- /.tab-content -->
				</div>
              	
			 	<div class="box-footer">
					{{ Form::submit('Lưu lại', array('class' => 'btn btn-primary')) }}
			 	</div>
		  	</div>
		{{ Form::close() }}
	</div>
</div>

@include('googlemap_script')

@stop
