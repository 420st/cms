@section('title')
@parent
- Subscribers - List
@stop
<h3>Subscribers List</h3>
<hr />

@include('cms::partials.message')

<table class="table table-responsive table-striped">
    <thead>
        <tr>
            <th width="50%">Email</th>
            <th width="30%">IP</th>
            <th width="20%">Date</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($subscribers as $subscriber)
        <tr>
            <td>{{ $subscriber->email }}</td>
            <td>{{ $subscriber->ip }}</td>
            <td>{{ $subscriber->created_at }}</td>
        </tr>
        @endforeach
        @if(count($subscribers) == 0)
        <tr>
            <td colspan="3">No results were found!</td>
        </tr>
        @endif
    </tbody>
</table>

<?php echo $subscribers->links(); ?>