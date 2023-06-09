@extends("layout.master")

@section('title')
    Item List Page
@endsection

@section('content')
    <h4>I am Item List Page</h4>

    <table class=" table table-bordered">
        <thead>
            <tr>
                <td>#</td>
                <td>Name</td>
                <td>Price</td>
                <td>Stock</td>
            </tr>
        </thead>
        <tbody>
            @forelse ($items as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item->stock }}</td>
                </tr>
               @empty
               <tr>
                <td colspan="4" class=" text-center">
                    There is no record <br>
                    <a class=" btn btn-outline-primary" href="{{ route("item.create") }}"> Create Item </a>
                </td>
                </tr>

            @endforelse
        </tbody>
    </table>

    @endsection
