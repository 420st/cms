<h3>&nbsp;</h3>
<hr style="border: none;" />
<div class="list-group">
    <span class="list-group-item"><h4 class="list-group-item-heading">Products</h4></span>
    <a href="{{ route($cms_path . '.product.create') }}" class="list-group-item {{ Route::is($cms_path . '.product.create') ? "active" : "" }}">Create Product</a>
    <a href="{{ route($cms_path . '.product.index') }}" class="list-group-item {{ Route::is($cms_path . '.product.index', $cms_path . '.product.edit') ?  "active" : "" }}">Manage Products</a>
    <span class="list-group-item"><h4 class="list-group-item-heading">Categories</h4></span>
    <a href="{{ route($cms_path . '.product.category.create') }}" class="list-group-item {{ Route::is($cms_path . '.product.category.create') ? "active" : "" }}">Create Category</a>
    <a href="{{ route($cms_path . '.product.category.index') }}" class="list-group-item {{ Route::is($cms_path . '.product.category.index', $cms_path . '.category.edit') ?  "active" : "" }}">Manage Categories</a>
<!--    <span class="list-group-item"><h4 class="list-group-item-heading">Merchants</h4></span>
    <a href="{{ route($cms_path . '.product.create') }}" class="list-group-item {{ Route::is($cms_path . '.category.create') ? "active" : "" }}">Create Merchant</a>
    <a href="{{ route($cms_path . '.product.index') }}" class="list-group-item {{ Route::is($cms_path . '.category.index', $cms_path . '.category.edit') ?  "active" : "" }}">Manage Merchants</a>-->
</div>