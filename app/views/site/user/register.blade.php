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
				<form class="submit-form">
					<div class="row">
						<ul class="medium-6 columns">
							<li>@include('message')</li>
							<li>
								<label for="name">{{ trans('captions.fullname') }} <em>*</em></label>
								<input type="text" value="" id="name" name="name" required>
							</li>
							<li>
								<label for="email">{{ trans('captions.email') }} <em>*</em></label>
								<input type="email" value="" id="email" name="email" required>
							</li>
							<li>
								<label for="telephone">{{ trans('captions.phone') }} <em>*</em></label>
								<input type="text" value="" id="telephone" name="telephone" required>
							</li>
							<li>
								<label>{{ trans('captions.customer') }}</label>
								<select>
									<option>-- {{ trans('captions.select') }}</option>
									<option>{{ trans('captions.personal') }}</option>
									<option>{{ trans('captions.company') }}</option>
								</select>
							</li>
							<li>
								<label for="address">{{ trans('captions.address') }}</label>
								<input type="text" value=""id="address" name="address">
							</li>
							<li>
								<label for="password">{{ trans('captions.password') }} <em>*</em></label>
								<input type="password" class="input-text" id="password" name="password" required>
							</li>
							<li>
								<button class="button right" type="submit">{{ trans('captions.register') }}</button>
							</li>
						</ul>
					</div>
				</form>
			</div>
		</div>
	</div>

@stop
