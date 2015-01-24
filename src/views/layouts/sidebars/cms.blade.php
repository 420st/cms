<h3>&nbsp;</h3>
<hr style="border: none;" />
<div class="list-group">
    @if(isset($postgroups))
    @foreach($postgroups as $pg)
    <span class="list-group-item"><h4 class="list-group-item-heading">{{ $pg->name }}</h4></span>
    <a href="{{ route($path . '.pg.post.create', $pg->id) }}" class="list-group-item {{ Route::is($path . '.pg.post.create') &&  @$postgroup->id == $pg->id ? "active" : "" }}">Create {{ $pg->type->display_name }}</a>
    <a href="{{ route($path . '.pg.post.index', $pg->id) }}" class="list-group-item {{ Route::is($path . '.pg.post.index', $path . '.pg.post.edit') &&  @$postgroup->id == $pg->id ? "active" : "" }}">Manage {{ $pg->type->display_collective_name }}</a>
    @endforeach
    @endif
</div>