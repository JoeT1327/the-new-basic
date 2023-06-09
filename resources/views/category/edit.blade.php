@extends("layout.master")

@section('title')
   Edit Category
@endsection

@section('content')
    <h4> Category Editing Page</h4>

    <form action="{{ route("category.update", $category->id) }}" method="post">
        @method("put")
        @csrf

        <div class=" mb-3">
            <label for="" class=" form-label">Category Title</label>
            <input type="text" class=" form-control" value="{{ $category->title }}" name="title">
        </div>

        <div class=" mb-3">
            <label for="" class=" form-label">Description</label>
           <textarea name="description" class=" form-control" value="{{ $category->description }}" cols="30" rows="10"></textarea>
        </div>



        <button class=" btn btn-outline-primary">Edit</button>
    </form>

@endsection
