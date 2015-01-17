<div class="form-group">
    {{ Form::label('name', 'Category Name', ['class' => 'col-sm-3 control-label']) }}
    <div class="col-sm-6">
        {{ Form::text('name', Input::old('name'), ['class' => 'form-control']) }}
    </div>
</div>

{{ HTML::script('/packages/fourtwenty/cms/packages/trumbowyg/trumbowyg.min.js') }}
{{ HTML::style('/packages/fourtwenty/cms/packages/trumbowyg/ui/trumbowyg.min.css') }}

<script type="text/javascript">
    $(function() {
        $('textarea').trumbowyg();
    });
</script>