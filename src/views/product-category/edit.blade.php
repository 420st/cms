@section('title')
@parent
- Product Category - Edit Product Category
@stop
<h3>Edit Product Category</h3>
<hr />

@include('cms::partials.message')

<script type="text/javascript" src="/js/user.js"></script>

{{ Form::model($product_category, ['route' => [$path . '.product.category.update', $product_category->id], 'files' => true, 'method' => 'put', 'class'=>'form-horizontal']) }}

@include('cms::product-category.form')

<div class="form-group">
    <label class="col-sm-3">&nbsp;</label>
    <div class="col-sm-6">
        {{ Form::submit('Update Category', ['class' => 'btn btn-primary']) }}
    </div>
</div>

{{ Form::close() }}

@section('scripts')
@parent
<script type="text/javascript">
document.getElementById('title').focus();
</script>
@stop