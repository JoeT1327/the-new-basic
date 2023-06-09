@extends("layout.master")

@section('title')
    Category Detail Page
@endsection

@section('content')
    <h4> Category Detail Page</h4>

    <table class=" table table-bordered">
        <tr>
            <td>Title</td>
            <td>{{ $category->title }}</td>
        </tr>
        <tr>
            <td>Description</td>
            <td>{{ $category->description }}</td>
        </tr>

        <tr>
            <td>Created_at</td>
            <td>{{ $category->created_at }}</td>
        </tr>
        <tr>
            <td>Updated_at</td>
            <td>{{ $category->updated_at }}</td>
        </tr>
    </table>

    @endsection
