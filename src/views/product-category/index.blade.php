@section('title')
@parent
- Category - List
@stop
<h3>Manage Categories</h3>
<hr />

@include('cms::partials.message')

<table class="table table-responsive table-striped">
    <thead>
        <tr>
            <th width="55%">Name</th>
            <th width="25%">Created On</th>
            <th width="10%" class="text-center">Edit</th>
            <th width="10%" class="text-center">Delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category)
        <tr>
            <td>{{ $category->name }}</td>
            <td>{{ $category->created_at }}</td>
            <td class="text-center"><a href="{{ route($cms_path . '.product.category.edit', $category->id) }}"><span class="glyphicon glyphicon-edit"></span></a></td>
            <td class="text-center"><a href="{{ route($cms_path . '.product.category.delete', $category->id) }}" onclick="return (confirm('Are you sure you want to delete this?'))"><span class="glyphicon glyphicon-trash"></span></a></td>
        </tr>
        @endforeach
        @if(count($categories) == 0)
        <tr>
            <td colspan="6">No results were found!</td>
        </tr>
        @endif
    </tbody>
</table>

<?php echo $categories->links(); ?>