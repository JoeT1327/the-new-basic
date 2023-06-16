@extends("layout.master")

@section('title')
    Forgot Password
@endsection

@section('content')
    <h4>Forgot Your Password</h4>
    <hr>

    @if (session('message'))
        <div class=" alert alert-success">
            {{ session('message')}}
        </div>
    @endif

    <form action=" {{ route('auth.checkEmail')}}" method="POST">

        @csrf


        <div class=" mb-3">
            <label for="" class=" form-label ">Enter Your Email</label>
            <input type="email" class=" form-control @error('email') is-invalid @enderror" name="email" >
            @error('email')
                <div class=" invalid-feedback">{{ $message }}</div>
            @enderror
        </div>


        <div class=" mb-3">
            <button class=" btn btn-primary">Reset Account</button>
        </div>
    </form>

    @endsection
