<h3>&nbsp;</h3>
<hr style="border: none;" />
<div class="list-group">
    <span class="list-group-item"><h4 class="list-group-item-heading">Products</h4></span>
    <a href="{{ route($path . '.product.create') }}" class="list-group-item {{ Route::is($path . '.product.create') ? "active" : "" }}">Create Product</a>
    <a href="{{ route($path . '.product.index') }}" class="list-group-item {{ Route::is($path . '.product.index', $path . '.product.edit') ?  "active" : "" }}">Manage Products</a>
    <span class="list-group-item"><h4 class="list-group-item-heading">Categories</h4></span>
    <a href="{{ route($path . '.product.category.create') }}" class="list-group-item {{ Route::is($path . '.product.category.create') ? "active" : "" }}">Create Category</a>
    <a href="{{ route($path . '.product.category.index') }}" class="list-group-item {{ Route::is($path . '.product.category.index', $path . '.category.edit') ?  "active" : "" }}">Manage Categories</a>
<!--    <span class="list-group-item"><h4 class="list-group-item-heading">Merchants</h4></span>
    <a href="{{ route($path . '.product.create') }}" class="list-group-item {{ Route::is($path . '.category.create') ? "active" : "" }}">Create Merchant</a>
    <a href="{{ route($path . '.product.index') }}" class="list-group-item {{ Route::is($path . '.category.index', $path . '.category.edit') ?  "active" : "" }}">Manage Merchants</a>-->
</div>