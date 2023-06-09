<aside class=" list-group">
    <a href=" {{ route("page.home") }} " class=" list-group-item list-group-item-action">Home</a>

    <p class=" my-3 mt-3"> Manage Inventory</p>

    <a href=" {{ route("item.create") }} " class=" list-group-item list-group-item-action">Create Item </a>
    <a href=" {{ route("item.index") }} " class=" list-group-item list-group-item-action">Item List </a>

    <p class=" my-3 mt-3"> Manage Category</p>

    <a href=" {{ route("category.create") }} " class=" list-group-item list-group-item-action">Create Category </a>
    <a href=" {{ route("category.index") }} " class=" list-group-item list-group-item-action">Category List </a>
</aside>
