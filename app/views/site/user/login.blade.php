@extends('site.layout.default')

@section('title')
    {{ $title = trans('captions.login_account'); }}
@stop

@section('content')

    <?php
        $breadcrumb = array(
            ['name' => trans('captions.login_account'), 'link' => '']
        );
    ?>
    @include('site.common.breadcrumb', ['breadcrumb' => $breadcrumb])

    <div class="main_container login_form">
        <div class="row">
            <div class="column">
                <h2>{{ trans('captions.login_account') }}</h2>
                <form class="submit-form">
                    <div class="row">
                        <ul class="medium-6 columns">
                            <li>@include('message')</li>
                            <li>
                                <label for="email">{{ trans('captions.email') }} <em>*</em></label>
                                <input type="email" value="" id="email" name="email" required>
                            </li>
                            <li>
                                <label for="password">{{ trans('captions.password') }} <em>*</em></label>
                                <input type="password" class="input-text" id="password" name="password" required>
                            </li>
                            <li>
                                <button class="button right" type="submit">{{ trans('captions.login') }}</button>
                            </li>
                        </ul>
                    </div>
                </form>
            </div>
        </div>
    </div>

@stop
