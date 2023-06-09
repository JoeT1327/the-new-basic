@extends("layout.master")

@section('title')
   Create Item
@endsection

@section('content')
    <h4> Item Creating Page</h4>

    <form action="{{ route("item.store") }}" method="post">

        @csrf

        <div class=" mb-3">
            <label for="" class=" form-label">Item Name</label>
            <input type="text" class=" form-control" name="name">
        </div>

        <div class=" mb-3">
            <label for="" class=" form-label">Item Price</label>
            <input type="number" class=" form-control" name="price">
        </div>

        <div class=" mb-3">
            <label for="" class=" form-label">Item Stock</label>
            <input type="number" class=" form-control" name="stock">
        </div>

        <button class=" btn btn-outline-primary">Save</button>
    </form>

@endsection
