@extends("layout.master")

@section('title')
    Dashboard
@endsection

@section('content')
    <h4>I am Dashboard</h4>
    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Rerum officiis ipsam ex.
         Pariatur alias quae corrupti laudantium quo libero, vel, deserunt illo incidunt, minima facilis eos dignissimos quam id magni.</p>

     <div class=" alert alert-success">
        {{ session("auth")->name}}
     </div>


     <form action=" {{ route("auth.logout")}}" method="POST">
        @csrf
        <button class=" btn btn-primary">Logout</button>
    </form>

@endsection
