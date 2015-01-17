@extends('cms::layouts.master')

@section('nav')
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route($path . '.home') }}">{{ $site_name }} CMS</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="{{ Route::is($path . '.product.*') ? 'active' : '' }}"><a href="{{ route($path . '.product.index') }}">Shop</a></li>
                <li class="{{ Route::is($path . '.pg.*') ? 'active' : '' }}"><a href="{{ route($path . '.pg.index') }}">CMS</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <!--<li><a href="#">{{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}</a></li>-->
                <li><a href="{{ route($path . '.logout') }}">Logout</a></li>
            </ul>
        </div>
    </div>
</div>
@stop

@section('content')
<div class="col-lg-3">
    {{ $sidebar }}
</div>
<div class="col-lg-9">
    {{ $content }}
</div>
@stop