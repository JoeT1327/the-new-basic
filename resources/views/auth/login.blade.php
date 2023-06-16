@extends("layout.master")

@section('title')
    Login
@endsection

@section('content')
    <h4>Student Login Page</h4>
    <hr>

    @if (session('message'))
        <div class=" alert alert-success">
            {{ session('message')}}
        </div>
    @endif

    <form action=" {{ route("auth.check")}}" method="POST">

        @csrf



        <div class=" mb-3">
            <label for="" class=" form-label ">Your Email</label>
            <input type="email" class=" form-control @error('email') is-invalid @enderror" name="email" value=" {{ old("email")}}">
            @error('email')
                <div class=" invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class=" mb-3">
            <label for="" class=" form-label ">Password</label>
            <input type="password" class=" form-control @error('password') is-invalid @enderror" name="password" >
            @error('password')
                <div class=" invalid-feedback">{{ $message }}</div>
            @enderror
        </div>



        <div class=" mb-3">
            <button class=" btn btn-primary">Login</button>
           <a href=" {{ route('auth.forgot')}}" class=" btn btn-link">Forgot Password</a>
        </div>
    </form>

    @endsection
