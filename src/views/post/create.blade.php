@section('title')
@parent
- {{ $postgroup->name }} - Create {{ $postgroup->type->display_name }}
@stop
<h3>Create {{ $postgroup->type->display_name }}</h3>
<hr />

@include('cms::partials.message')

{{ Form::open(['route' => [$path . '.pg.post.store', $postgroup->id], 'files' => true, 'class'=>'form-horizontal']) }}

@include('cms::post.form')

<div class="form-group">
    <label class="col-sm-3">&nbsp;</label>
    <div class="col-sm-6">
        {{ Form::submit('Create ' . $postgroup->type->display_name, ['class' => 'btn btn-primary']) }}
        {{ Form::reset('Reset', ['class' => 'btn btn-default']) }}
    </div>
</div>

{{ Form::close() }}

@section('scripts')
@parent
<script type="text/javascript">
    document.getElementById('title').focus();
</script>
@stop