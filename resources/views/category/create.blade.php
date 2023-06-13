@extends("layout.master")

@section('title')
   Create Category
@endsection

@section('content')
    <h4> Category Creating Page</h4>

    <form action="{{ route("category.store") }}" method="post">

        @csrf

        <div class=" mb-3">
            <label for="" class=" form-label ">Category Title</label>
            <input type="text" class=" form-control @error('title') is-invalid @enderror" name="title">
            @error('title')
                <div class=" invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class=" mb-3">
            <label for="" class=" form-label ">Description</label>
           <textarea name="description" class=" form-control  @error('description') is-invalid @enderror" cols="30" rows="10"></textarea>
           @error('description')
                <div class=" invalid-feedback">{{ $message }}</div>
            @enderror
        </div>



        <button class=" btn btn-outline-primary">Save</button>
    </form>

@endsection
