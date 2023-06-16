@extends("layout.master")

@section('title')
    Verify
@endsection

@section('content')
    <h4>Verify Your Email</h4>
    <hr>

    @if (session('message'))
        <div class=" alert alert-success">
            {{ session('message')}}
        </div>
    @endif

    <form action=" {{ route('auth.verifying')}}" method="POST">

        @csrf


        <div class=" mb-3">
            <label for="" class=" form-label ">Verify Your Code</label>
            <input type="number" class=" form-control @error('verify_code') is-invalid @enderror" name="verify_code" >
            @error('verify_code')
                <div class=" invalid-feedback">{{ $message }}</div>
            @enderror
        </div>


        <div class=" mb-3">
            <button class=" btn btn-primary">Verify</button>
        </div>
    </form>

    @endsection
