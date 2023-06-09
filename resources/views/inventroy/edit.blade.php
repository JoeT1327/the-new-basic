@extends("layout.master")

@section('title')
   Update Item
@endsection

@section('content')
    <h4> Item Updating Page</h4>

    <form action="{{ route("item.update", $item->id) }}" method="post">

        @method("put")

        @csrf

        <div class=" mb-3">
            <label for="" class=" form-label">Item Name</label>
            <input type="text" class=" form-control" value=" {{ $item->name }}" name="name">
        </div>

        <div class=" mb-3">
            <label for="" class=" form-label">Item Price</label>
            <input type="number" class=" form-control"  value=" {{ $item->price }}"  name="price">
        </div>

        <div class=" mb-3">
            <label for="" class=" form-label">Item Stock</label>
            <input type="number" class=" form-control"  value=" {{ $item->stock }}"  name="stock">
        </div>

        <button class=" btn btn-outline-primary">Update Item</button>
    </form>

@endsection
