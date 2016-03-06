@extends('site.layout.default')

@section('title')
    {{ $title = trans('captions.forgot_password'); }}
@stop

@section('content')

    <?php
        $breadcrumb = array(
            ['name' => trans('captions.forgot_password'), 'link' => '']
        );
    ?>
    @include('site.common.breadcrumb', ['breadcrumb' => $breadcrumb])

    <div class="main_container forgotpassword">
        <div class="row">
            <div class="column">
                <h2>{{ trans('captions.forgot_password') }}</h2>
                <form class="forgotpassword_form">
                    <p>{{ trans('captions.change_password_message') }}</p>
                    <div class="row">
                        <ul class="medium-6 columns">
                            <li>
                                <label for="email">{{ trans('captions.email') }} <em>*</em></label>
                                <input class="column" type="email" value="" id="email" name="email" required>
                            </li>
                            <li>
                                <button class="button right" type="submit">{{ trans('captions.send') }}</button>
                            </li>
                        </ul>
                    </div>
                </form>
            </div>
        </div>
    </div>

@stop
