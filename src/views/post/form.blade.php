<div class="form-group">
    {{ Form::label('title', 'Title', ['class' => 'col-sm-3 control-label required']) }}
    <div class="col-sm-6">
        {{ Form::text('title', Input::old('title'), ['class' => 'form-control']) }}
    </div>
</div>

@if(!in_array($postgroup->type->name, array('faq')))
<div class="form-group">
    {{ Form::label('url', 'URL Slug', ['class' => 'col-sm-3 control-label required']) }}
    <div class="col-sm-6">
        {{ Form::text('url', Input::old('url'), ['class' => 'form-control']) }}
    </div>
</div>
@endif

@if(in_array($postgroup->type->name, array('blog', 'event')))
<div class="form-group">
    {{ Form::label('category_id', 'Category', ['class' => 'col-sm-3 control-label required']) }}
    <div class="col-sm-6">
        {{ Form::select('category_id', $categories, Input::old('category_id'), ['class' => 'form-control']) }}
    </div>
</div>
@endif

<div class="form-group">
    <!--{{ Form::label('content', 'Content', ['class' => 'col-sm-3 control-label']) }}-->
    <div class="col-sm-12">
        {{ Form::textarea('content', Input::old('content'), ['class' => 'form-control']) }}
    </div>
</div>

<!--<div class="form-group">
    {{ Form::label('image', 'Image', ['class' => 'col-sm-3 control-label']) }}
    <div class="col-sm-6">
        {{ Form::file('image', ['class' => 'pull-left']) }}
        @if(isset($post))
        <a href="{{ url('images/blog/' . $post->image) }}" class="btn btn-default btn-xs pull-right" target="_blank">View current image</a>
        @endif
    </div>
</div>-->

@if(!in_array($postgroup->type->name, array('faq')))
<div class="form-group">
    {{ Form::label('date', 'Date', ['class' => 'col-sm-3 control-label required']) }}
    <div class="col-sm-6">
        {{ Form::text('date', Input::old('date'), ['class' => 'form-control']) }}
    </div>
</div>
@endif

<div class="form-group">
    {{ Form::label('attachment', 'Images', ['class' => 'col-sm-3 control-label']) }}
    @include('cms::attachment.listform', ['model' => (isset($post) ? $post : null)])
</div>

{{ HTML::script('/packages/fourtwenty/cms/packages/trumbowyg/trumbowyg.min.js') }}
{{ HTML::style('/packages/fourtwenty/cms/packages/trumbowyg/ui/trumbowyg.min.css') }}

<script type="text/javascript">
    $(function() {
        $('textarea').trumbowyg();

        $('input[name="title"]').on('keyup', function() {
            var url = createUrlSlug($(this).val(), '-');
            $('input[name="url"]').val(url);
        });

        function createUrlSlug(urlString, filter) {
            if (filter) {
                removelist = ["a", "an", "as", "at", "before", "but", "by", "for", "from",
                    "is", "in", "into", "like", "of", "off", "on", "onto", "per",
                    "since", "than", "the", "this", "that", "to", "up", "via", "het", "de", "een", "en",
                    "with"];
            }
            else {
                removelist = [];
            }
            s = urlString;
            r = new RegExp('\\b(' + removelist.join('|') + ')\\b', 'gi');
            s = s.replace(r, '');
            s = s.replace(/[^-\w\s]/g, ''); // Remove unneeded characters
            s = s.replace(/^\s+|\s+$/g, ''); // Trim leading/trailing spaces
            s = s.replace(/[-\s]+/g, '-'); // Convert spaces to hyphens
            s = s.toLowerCase(); // Convert to lowercase
            return s; // Trim to first num_chars characters
        }

        var $startDate = $("input[name='date']");

        var to = $startDate.datepicker({
            format: 'yyyy-mm-dd'
        }).on('changeDate', function(ev) {
            to.hide();
        }).data('datepicker');
    });
</script>
{{ HTML::style('/packages/fourtwenty/cms/css/datepicker.css') }}
{{ HTML::script('/packages/fourtwenty/cms/js/bootstrap-datepicker.js') }}