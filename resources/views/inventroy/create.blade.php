@extends("layout.master")

@section('title')
   Create Item
@endsection

@section('content')
    <h4> Item Creating Page</h4>

    {{-- @if ($errors->any())
        <ul class=" text-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif --}}

    <form action="{{ route("item.store") }}" method="post">

        @csrf

        <div class=" mb-3">
            <label for="" class=" form-label">Item Name</label>
            <input
            value="{{ old("name") }}"
            type="text"
            class=" form-control @error('name') is-invalid @enderror "
            name="name">
            @error('name')
                <div class=" invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class=" mb-3">
            <label for="" class=" form-label">Item Price</label>
            <input
            value="{{ old("price") }}"
            type="number"
            class=" form-control @error('price') is-invalid @enderror"
            name="price">
            @error('price')
                <div class=" invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class=" mb-3">
            <label for="" class=" form-label">Item Stock</label>
            <input
            value="{{ old("stock") }}"
            type="number"
            class=" form-control @error('stock') is-invalid @enderror"
            name="stock">
            @error('stock')
                <div class=" invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button class=" btn btn-outline-primary">Save</button>
    </form>

@endsection
