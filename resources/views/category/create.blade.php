@extends("layout.master")

@section('title')
   Create Category
@endsection

@section('content')
    <h4> Category Creating Page</h4>

    <form action="{{ route("category.store") }}" method="post">

        @csrf

        <div class=" mb-3">
            <label for="" class=" form-label">Category Title</label>
            <input type="text" class=" form-control" name="title">
        </div>

        <div class=" mb-3">
            <label for="" class=" form-label">Description</label>
           <textarea name="description" class=" form-control" cols="30" rows="10"></textarea>
        </div>



        <button class=" btn btn-outline-primary">Save</button>
    </form>

@endsection
