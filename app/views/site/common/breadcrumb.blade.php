@if(isset($breadcrumb)) 
	<div class="breadcrumb">
		<div class="row">
			<ul>
				<li><a href="{{ url('/') }}">{{ trans('captions.home') }}</a><i class="fa fa-chevron-right"></i></li>
				@foreach($breadcrumb as $key => $value)
					@if($value['link'])
						@if(isset($isH1) && ($key == count($breadcrumb) - 1))
							<li><h1><a href="{{ url($value['link']) }}">{{ $value['name'] }}</a></h1></li>
						@else
							<li>
								<a href="{{ url($value['link']) }}">{{ $value['name'] }}</a><i class="fa fa-caret-right"></i>
							</li>
						@endif
					@else
						<li>
							{{ $value['name'] }}
						</li>
					@endif
				@endforeach
			</ul>
		</div>
	</div>
@endif