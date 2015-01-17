@section('title')
@parent
- {{ $postgroup->name }} - Edit {{ $postgroup->type->display_name }}
@stop
<h3>Edit {{ $postgroup->type->display_name }}</h3>
<hr />

@include('cms::partials.message')

<script type="text/javascript" src="/js/user.js"></script>

{{ Form::model($post, ['route' => [$cms_path . '.pg.post.update', $postgroup->id, $post->id], 'files' => true, 'method' => 'put', 'class'=>'form-horizontal']) }}

@include('cms::post.form')

<div class="form-group">
    <label class="col-sm-3">&nbsp;</label>
    <div class="col-sm-6">
        {{ Form::submit('Update ' . $postgroup->type->display_name, ['class' => 'btn btn-primary']) }}
    </div>
</div>

{{ Form::close() }}

@section('scripts')
@parent
<script type="text/javascript">
document.getElementById('title').focus();
</script>
@stop