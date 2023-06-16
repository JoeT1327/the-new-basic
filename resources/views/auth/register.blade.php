@extends("layout.master")

@section('title')
    Register
@endsection

@section('content')
    <h4>Student Register Page</h4>
    <hr>

    <form action=" {{ route("auth.store")}}" method="POST">

        @csrf

        <div class=" mb-3">
            <label for="" class=" form-label ">Your Name</label>
            <input type="text" class=" form-control @error('name') is-invalid @enderror" name="name" value=" {{ old("name")}}">
            @error('name')
                <div class=" invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

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
            <label for="" class=" form-label ">Confirm Password</label>
            <input type="password" class=" form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" ">
            @error('password_confirmation')
                <div class=" invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class=" mb-3">
            <button class=" btn btn-primary">Register</button>
        </div>
    </form>

    @endsection
