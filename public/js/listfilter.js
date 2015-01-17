$(function() {
    var $listf = $('form.listfilter');

    $('button.remove', $listf).click(function(e) {
        $(this).parents('.filter-group').find('input.filter, select.filter').val('').change();
        $listf.submit();
    });

    $('button[type="reset"]', $listf).click(function(e) {
        $('input.filter, select.filter', $listf).val('').change();
        $listf.submit();
    });

    $('select.add-filter', $listf).change(function(e) {
        var filter_name = $(this).val();
        $('.filter-group-' + filter_name, $listf).removeClass('hidden');
        $(this).val(0);
    });

    var nowTemp = new Date();
    var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

    var $fromDate = $('.filter-group .filter.datepicker.from');
    var $toDate = $('.filter-group .filter.datepicker.to');

    var from = $fromDate.datepicker({
        format: 'yyyy-mm-dd',
        onRender: function(date) {
//                return date.valueOf() < now.valueOf() ? 'disabled' : '';
        }
    }).on('changeDate', function(ev) {
        if (ev.date.valueOf() > to.date.valueOf()) {
            var newDate = new Date(ev.date)
            newDate.setDate(newDate.getDate() + 1);
            to.setValue(newDate);
        }
        from.hide();
        $toDate[0].focus();
    }).data('datepicker');

    var to = $toDate.datepicker({
        format: 'yyyy-mm-dd',
        onRender: function(date) {
//                return date.valueOf() < from.date.valueOf() ? 'disabled' : '';
        }
    }).on('changeDate', function(ev) {
        to.hide();
    }).data('datepicker');
});