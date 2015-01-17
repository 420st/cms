@section('title')
@parent
- Product - List
@stop
<h3>Manage Products</h3>
<hr />

@include('cms::partials.message')

<table class="table table-responsive table-striped">
    <thead>
        <tr>
            <th width="35%">Name</th>
            <th width="20%">Category</th>
            <th width="25%">Created On</th>
            <th width="10%" class="text-center">Edit</th>
            <th width="10%" class="text-center">Delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
        <tr>
            <td>{{ $product->name }}</td>
            <td>{{ $product->category->name }}</td>
            <td>{{ $product->created_at }}</td>
            <td class="text-center"><a href="{{ route($path . '.product.edit', $product->id) }}"><span class="glyphicon glyphicon-edit"></span></a></td>
            <td class="text-center"><a href="{{ route($path . '.product.delete', $product->id) }}" onclick="return (confirm('Are you sure you want to delete this?'))"><span class="glyphicon glyphicon-trash"></span></a></td>
        </tr>
        @endforeach
        @if(count($products) == 0)
        <tr>
            <td colspan="6">No results were found!</td>
        </tr>
        @endif
    </tbody>
</table>

<?php echo $products->links(); ?>