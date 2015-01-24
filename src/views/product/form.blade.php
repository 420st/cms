<div class="form-group">
    {{ Form::label('name', 'Name', ['class' => 'col-sm-3 control-label required']) }}
    <div class="col-sm-6">
        {{ Form::text('name', Input::old('name'), ['class' => 'form-control']) }}
    </div>
</div>

<div class="form-group">
    {{ Form::label('product_category_id', 'Category', ['class' => 'col-sm-3 control-label required']) }}
    <div class="col-sm-6">
        {{ Form::select('product_category_id', $categories, Input::old('product_category_id'), ['class' => 'form-control']) }}
    </div>
</div>

<div class="form-group">
    {{ Form::label('product_merchant_id', 'Merchant', ['class' => 'col-sm-3 control-label']) }}
    <div class="col-sm-6">
        {{ Form::select('product_merchant_id', $merchants, Input::old('product_merchant_id'), ['class' => 'form-control']) }}
    </div>
</div>

<div class="form-group">
    {{ Form::label('marked_price', 'Marked Price ('.Config::get('cms::config.currency').')', ['class' => 'col-sm-3 control-label']) }}
    <div class="col-sm-6">
        {{ Form::text('marked_price', Input::old('marked_price'), ['class' => 'form-control']) }}
    </div>
</div>

<div class="form-group">
    {{ Form::label('selling_price', 'Selling Price ('.Config::get('cms::config.currency').')', ['class' => 'col-sm-3 control-label required']) }}
    <div class="col-sm-6">
        {{ Form::text('selling_price', Input::old('selling_price'), ['class' => 'form-control']) }}
    </div>
</div>

<div class="form-group">
    {{ Form::label('description', 'Description', ['class' => 'col-sm-3 control-label']) }}
    <div class="col-sm-12">
        {{ Form::textarea('description', Input::old('description'), ['class' => 'form-control']) }}
    </div>
</div>

<div class="form-group">
    {{ Form::label('attachment', 'Images', ['class' => 'col-sm-3 control-label']) }}
    @include('cms::attachment.listform', ['model' => (isset($product) ? $product : null)])
</div>

{{ HTML::script('/packages/fourtwenty/cms/packages/trumbowyg/trumbowyg.min.js') }}
{{ HTML::style('/packages/fourtwenty/cms/packages/trumbowyg/ui/trumbowyg.min.css') }}

<script type="text/javascript">
    $(function() {
        $('textarea').trumbowyg();
    });
</script>