<aside class=" list-group">
    <a href=" {{ route("page.home") }} " class=" list-group-item list-group-item-action">Home</a>

    @user

    <p class=" my-3 mt-3"> Dashboard</p>

    <a href=" {{ route("dashboard.home") }} " class=" list-group-item list-group-item-action">Dashboard </a>

    <p class=" my-3 mt-3"> Manage Inventory</p>

    <a href=" {{ route("item.create") }} " class=" list-group-item list-group-item-action">Create Item </a>
    <a href=" {{ route("item.index") }} " class=" list-group-item list-group-item-action">Item List </a>

    <p class=" my-3 mt-3"> Manage Category</p>

    <a href=" {{ route("category.create") }} " class=" list-group-item list-group-item-action">Create Category </a>
    <a href=" {{ route("category.index") }} " class=" list-group-item list-group-item-action">Category List </a>

    <p class=" my-3 mt-3">User Profile</p>

    <a href="  " class=" list-group-item list-group-item-action">My Profile</a>
    <a href=" {{ route("auth.passwordChange") }} " class=" list-group-item list-group-item-action">Change Password </a>

    <form action=" {{ route("auth.logout")}}" method="POST">
        @csrf
        <button class=" btn btn-primary d-block w-100 mt-4">Logout</button>
    </form>

    @enduser

    @notUser


    <p class=" my-3 mt-3"></p>

    <a href=" {{ route("auth.register") }} " class=" list-group-item list-group-item-action">Register </a>
    <a href=" {{ route("auth.login") }} " class=" list-group-item list-group-item-action">Log In </a>

    @endnotUser
</aside>
