<div class="col-sm-6 attachments-form">
    <table class="table table-responsive table-bordered table-condensed table-striped">
        <tbody>
            <tr class="hidden">
                <td>{{ Form::file('attachments[]') }}</td>
                <td class="text-center"><a href="#" class="delete"><i class="glyphicon glyphicon-trash small"></i></a></td>
            </tr>
            @if(isset($model))
            @foreach($model->attachments as $attachment)
            <tr>
                <td><a href="{{ url('uploads/' . $attachment->path . $attachment->name) }}" target="_blank">{{ $attachment->name }}</a></td>
                <td class="text-center"><a data-id="{{ $attachment->id }}" href="{{ route($cms_path . '.attachment.delete', $attachment->id) }}" class="delete"><i class="glyphicon glyphicon-trash small"></i></a></td>
            </tr>
            @endforeach
            @endif
        </tbody>
        <tfoot>
            <tr>
                <td colspan="2">{{ Form::button('Add new file', ['class' => 'btn btn-default btn-sm add-new-file']) }}</td>
            </tr>
        </tfoot>
    </table>
</div>
<script type="text/javascript">
    $(function() {

        var $attachment_form = $('div.attachments-form');

        $('button.add-new-file', $attachment_form).click(function() {
            var $cont = $(this).parents('table').find('tbody');
            $tr = $('tr.hidden', $cont).clone().removeClass('hidden');
            $cont.append($tr);
        });

        $attachment_form.on('click', 'a.delete', function(e) {
            if (confirm('Are you sure you want to delete this?')) {
                if ($(this).data('id') > 0) {
                    var url = $(this).attr('href');
                    $.ajax({url: url});
                }

                $(this).parents('tr').remove();
            }

            e.preventDefault();
            return false;
        });

        if (!$('tbody tr:not(.hidden)', $attachment_form).length) {
            $('button.add-new-file').click();
        }
    });
</script>