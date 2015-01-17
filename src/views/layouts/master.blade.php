<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <title>
            @section('title')
            {{ $site_name }} CMS
            @show
        </title>
        <meta name="description" content="" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        {{ HTML::script('/packages/fourtwenty/cms/js/jquery-2.1.0.min.js') }}
        {{ HTML::style('/packages/fourtwenty/cms/css/bootstrap.min.css') }}
        {{ HTML::style('/packages/fourtwenty/cms/css/style.css') }}
    </head>
    <body class="{{ !Auth::guest() ? 'cms' : '' }}">
        @yield('nav')
        <div class="container">
            <div class="row">
                @yield('content')
            </div>
        </div>
        @yield('scripts')
    </body>
</html>