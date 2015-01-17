@section('title')
@parent
- {{ $postgroup->name }} - List
@stop
<h3>Manage {{ $postgroup->type->display_collective_name }}</h3>
<hr />

@include('cms::partials.message')

<table class="table table-responsive table-striped">
    <thead>
        <tr>
            <th width="{{ ($postgroup->type->name == 'blog') ? 30 : 65 }}%">Title</th>
            @if($postgroup->type->name == 'blog')
            <th width="15%">Category</th>
            <th width="10%">Date</th>
            @endif
            <th width="25%">Created On</th>
            <th width="10%" class="text-center">Edit</th>
            <th width="10%" class="text-center">Delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)
        <tr>
            <td>{{ $post->title }}</td>
            @if($postgroup->type->name == 'blog')
            <td>{{ $post->category->name }}</td>
            <td>{{ $post->date }}</td>
            @endif
            <td>{{ $post->created_at }}</td>
            <td class="text-center"><a href="{{ route($cms_path . '.pg.post.edit', [$postgroup->id, $post->id]) }}"><span class="glyphicon glyphicon-edit"></span></a></td>
            <td class="text-center"><a href="{{ route($cms_path . '.pg.post.delete', [$postgroup->id, $post->id]) }}" onclick="return (confirm('Are you sure you want to delete this?'))"><span class="glyphicon glyphicon-trash"></span></a></td>
        </tr>
        @endforeach
        @if(count($posts) == 0)
        <tr>
            <td colspan="{{ ($postgroup->type->name == 'blog') ? 6 : 4 }}">No results were found!</td>
        </tr>
        @endif
    </tbody>
</table>

<?php echo $posts->links(); ?>