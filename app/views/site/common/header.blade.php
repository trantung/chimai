<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no"/>
    
    <link rel="icon" href="/assets/images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="imgs/favicon.png" type="image/x-icon">

    @if(isset($seoMeta))
        <meta name="description" content="{{ html_entity_decode($seoMeta->description_site) }}">
        <meta name="keywords" content="{{ $seoMeta->keyword_site }}">
        <meta property="og:url" content="{{ Request::url() }}" />
        <meta property="og:title" content="{{ $seoMeta->title_site }}" />
        <meta property="og:description" content="{{ html_entity_decode($seoMeta->description_site) }}" />
        @if(isset($seoImage))
            <meta property="og:image" content="{{ $seoImage }}" />
        @else
            <meta property="og:image" content="{{ url(UPLOADIMG . '/default.jpg') }}" />
        @endif
    @endif
    
    {{ HTML::style('assets/css/style.css') }}
    {{ HTML::script('assets/js/vendor/modernizr.js') }}
    {{ HTML::script('assets/js/vendor/jquery.js') }}

    @if(isset($script))
        {{ $script->header_script }}
    @endif

</head>