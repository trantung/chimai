@extends('site.layout.default')

@section('title')
    {{ $title = trans('captions.register_account'); }}
@stop

@section('content')

    <?php
        $breadcrumb = array(
            ['name' => trans('captions.register_account'), 'link' => '']
        );
    ?>
    @include('site.common.breadcrumb', ['breadcrumb' => $breadcrumb])

    <div class="main_container create_an_account">
		<div class="row">
			<div class="column">
				<h2>{{ trans('captions.register_account') }}</h2>
				{{ Form::open(array('action' => 'SiteUserController@store', 'class' => 'submit-form')) }}
					<div class="row">
						<ul class="medium-6 columns">
							<li>@include('message')</li>
							<li>
								<label for="fullname">{{ trans('captions.fullname') }} <em>*</em></label>
								<input type="text" value="" id="fullname" name="fullname" maxlength="256">
							</li>
							<li>
								<label for="email">{{ trans('captions.email') }} <em>*</em></label>
								<input type="email" value="" id="email" name="email" required maxlength="256">
							</li>
							<li>
								<label for="phone">{{ trans('captions.phone') }} <em>*</em></label>
								<input type="text" value="" id="phone" name="phone" required maxlength="256">
							</li>
							<li>
								<label>{{ trans('captions.customer') }}</label>
								<select name="type">
									<!-- <option>-- {{-- trans('captions.select') --}}</option> -->
									<option value="1">{{ trans('captions.personal') }}</option>
									<option value="2">{{ trans('captions.company') }}</option>
								</select>
							</li>
							<li>
								<label for="address">{{ trans('captions.address') }}</label>
								<input type="text" value="" id="address" name="address" maxlength="256">
							</li>
							<li>
								<label for="password">{{ trans('captions.password') }} <em>*</em></label>
								<input type="password" class="input-text" id="password" name="password" required minlength="6" maxlength="256">
							</li>
							<li>
								<label for="repassword">{{ trans('captions.repassword') }} <em>*</em></label>
								<input type="password" class="input-text" id="repassword" name="repassword" required minlength="6" maxlength="256">
							</li>
							<li>
								<button class="button right" type="submit">{{ trans('captions.register') }}</button>
							</li>
						</ul>
					</div>
				{{ Form::close() }}
			</div>
		</div>
	</div>

@stop
