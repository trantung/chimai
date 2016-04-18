@extends('site.layout.default')

@section('title')
    {{ $title = trans('label.page404'); }}
@stop

@section('content')

    <?php
        $breadcrumb = array(
            ['name' => trans('label.page404'), 'link' => '']
        );
    ?>
    @include('site.common.breadcrumb', ['breadcrumb' => $breadcrumb])

    <div class="main_container">
        <div class="row">
            <div class="column">
                <p>{{ trans('label.page404') }}</p>
            </div>
        </div>
    </div>

@stop
