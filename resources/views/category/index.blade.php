@extends("layout.master")

@section('title')
    Category List Page
@endsection

@section('content')
    <h4> Category List Page</h4>

    <table class=" table table-bordered">
        <thead>
            <tr>
                <td>#</td>
                <td>Title</td>
                <td>Description</td>
                <td>Control</td>
            </tr>
        </thead>
        <tbody>
            @forelse ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->title }}</td>

                    <td>{{ Str::limit($category->description, 10, '...') }}</td>
                    <td>
                        <a class=" btn btn-sm btn-outline-danger" href="{{ route("category.show", $category->id) }}">Details</a>

                        <a class=" btn btn-sm btn-outline-success" href=" {{ route("category.edit", $category->id) }}">Edit</a>

                        <form class=" d-inline-block" action="{{ route("category.destroy", $category->id)}}" method="post">
                            @method("delete")
                            @csrf
                            <button class=" btn btn-sm btn-outline-danger">Delete</button>
                        </form>
                    </td>

                </tr>
               @empty
               <tr>
                <td colspan="5" class=" text-center">
                    There is no record <br>
                    <a class=" btn btn-outline-primary" href="{{ route("category.create") }}"> Create category </a>
                </td>
                </tr>

            @endforelse
        </tbody>
    </table>

    @endsection
