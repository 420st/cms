<h3>&nbsp;</h3>
<hr style="border: none;" />
<div class="list-group">
    <span class="list-group-item"><h4 class="list-group-item-heading">News</h4></span>
    <a href="{{ route($path . '.pg.post.create', 1) }}" class="list-group-item {{ Route::is($path . '.pg.post.create') &&  @$postgroup->id == 1 ? "active" : "" }}">Create News Item</a>
    <a href="{{ route($path . '.pg.post.index', 1) }}" class="list-group-item {{ Route::is($path . '.pg.post.index', $path . '.pg.post.edit') &&  @$postgroup->id == 1 ? "active" : "" }}">Manage News</a>
    <span class="list-group-item"><h4 class="list-group-item-heading">FAQ</h4></span>
    <a href="{{ route($path . '.pg.post.create', 2) }}" class="list-group-item {{ Route::is($path . '.pg.post.create') &&  @$postgroup->id == 2 ? "active" : "" }}">Create Question</a>
    <a href="{{ route($path . '.pg.post.index', 2) }}" class="list-group-item {{ Route::is($path . '.pg.post.index', $path . '.pg.post.edit') && @$postgroup->id == 2 ? "active" : "" }}">Manage FAQ</a>
    <span class="list-group-item"><h4 class="list-group-item-heading">Events</h4></span>
    <a href="{{ route($path . '.pg.post.create', 3) }}" class="list-group-item {{ Route::is($path . '.pg.post.create') &&  @$postgroup->id == 3 ? "active" : "" }}">Create Event</a>
    <a href="{{ route($path . '.pg.post.index', 3) }}" class="list-group-item {{ Route::is($path . '.pg.post.index', $path . '.pg.post.edit') && @$postgroup->id == 3 ? "active" : "" }}">Manage Events</a>
</div>