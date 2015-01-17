@section('title')
@parent
- Product Category - Create Product Category
@stop
<h3>Create Product Category</h3>
<hr />

@include('cms::partials.message')

{{ Form::open(['route' => $cms_path . '.product.category.store', 'files' => true, 'class'=>'form-horizontal']) }}

@include('cms::product-category.form')

<div class="form-group">
    <label class="col-sm-3">&nbsp;</label>
    <div class="col-sm-6">
        {{ Form::submit('Create Category', ['class' => 'btn btn-primary']) }}
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