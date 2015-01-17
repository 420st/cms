@section('title')
@parent
- Login
@stop
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <h3>{{ $site_name }} CMS</h3>
        <hr />
        <div class="panel panel-default">
            <div class="panel-heading"><h3 class="panel-title"><strong>Sign In </strong></h3></div>
            <div class="panel-body">

                @include('cms::partials.message')

                {{ Form::open([$cms_path . 'postlogin']) }}
                <div class="form-group">
                    {{ Form::label('username', 'Username') }}
                    {{ Form::text('username', Input::old('username'), array('class' => 'form-control', 'tabindex' => 1)) }}
                </div>
                <div class="form-group">
                    {{ Form::label('password', 'Password') }}
                    <a style="float: right" href="/password/remind">Forgot password?</a>
                    {{ Form::password('password', array('class' => 'form-control', 'tabindex' => 2)) }}
                </div>
                {{ Form::submit('Sign in', array('class' => 'btn btn-sm btn-default', 'tabindex' => 3)) }}
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
@section('scripts')
@parent
<script type="text/javascript">
    document.getElementById('username').focus();
</script>
@stop