@section('title')
@parent
- Product - Edit Product
@stop
<h3>Edit Product</h3>
<hr />

@include('cms::partials.message')

<script type="text/javascript" src="/js/user.js"></script>

{{ Form::model($product, ['route' => [$cms_path . '.product.update', $product->id], 'files' => true, 'method' => 'put', 'class'=>'form-horizontal']) }}

@include('cms::product.form')

<div class="form-group">
    <label class="col-sm-3">&nbsp;</label>
    <div class="col-sm-6">
        {{ Form::submit('Update Product', ['class' => 'btn btn-primary']) }}
    </div>
</div>

{{ Form::close() }}

@section('scripts')
@parent
<script type="text/javascript">
document.getElementById('title').focus();
</script>
@stop