<div class="nav-tabs-custom">
	<ul class="nav nav-tabs">
		<li class="active"><a href="#tab_1" data-toggle="tab">Menu</a></li>
		<li><a href="#tab_2" data-toggle="tab">Content</a></li>
		<li><a href="#tab_3" data-toggle="tab">Footer</a></li>
	</ul>
	<div class="tab-content">
		<div class="tab-pane active" id="tab_1">
			<div class="form-group">
				<label>Mức ưu tiên</label>
				<div class="row">
					<div class="col-sm-6">
						{{ Form::text('weight_number[]', null , textPlaceHolder('Mức ưu tiên')) }}
					</div>
				</div>
			</div>
			{{ Form::hidden('position[]', MENU) }}
			<div class="form-group">
				<label>Trạng thái</label>
				<div class="row">
					<div class="col-sm-6">
						{{ Form::select('status[]', Common::getStatus(), '', array('class' => 'form-control')) }}
					</div>
				</div>
			</div>
		</div>
		<!-- /.tab-pane -->
		<div class="tab-pane" id="tab_2">
			<div class="form-group">
				<label>Mức ưu tiên</label>
				<div class="row">
					<div class="col-sm-6">
						{{ Form::text('weight_number[]', null , textPlaceHolder('Mức ưu tiên')) }}
					</div>
				</div>
			</div>
			{{ Form::hidden('position[]', CONTENT) }}
			<div class="form-group">
				<label>Trạng thái</label>
				<div class="row">
					<div class="col-sm-6">
						{{ Form::select('status[]', Common::getStatus(), '', array('class' => 'form-control')) }}
					</div>
				</div>
			</div>
		</div>
		<!-- /.tab-pane -->
		<div class="tab-pane" id="tab_3">
			<div class="form-group">
				<label>Mức ưu tiên</label>
				<div class="row">
					<div class="col-sm-6">
						{{ Form::text('weight_number[]', null , textPlaceHolder('Mức ưu tiên')) }}
					</div>
				</div>
			</div>
			{{ Form::hidden('position[]', FOOTER) }}
			<div class="form-group">
				<label>Trạng thái</label>
				<div class="row">
					<div class="col-sm-6">
						{{ Form::select('status[]', Common::getStatus(), '', array('class' => 'form-control')) }}
					</div>
				</div>
			</div>
		</div>
		<!-- /.tab-pane -->
	</div>
	<!-- /.tab-content -->
</div>