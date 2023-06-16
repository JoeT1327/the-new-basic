@extends("layout.master")

@section('title')
    Change Password
@endsection

@section('content')
    <h4>Change Password</h4>
    <hr>



    <form action=" {{ route("auth.passwordChanging")}}" method="POST">

        @csrf

        <div class=" mb-3">
            <label for="" class=" form-label ">Current Password</label>
            <input type="password" class=" form-control @error('current_password') is-invalid @enderror" name="current_password" >
            @error('current_password')
                <div class=" invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class=" mb-3">
            <label for="" class=" form-label ">New Password</label>
            <input type="password" class=" form-control @error('password') is-invalid @enderror" name="password" >
            @error('password')
                <div class=" invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class=" mb-3">
            <label for="" class=" form-label ">Confirm New Password</label>
            <input type="password" class=" form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" >
            @error('password_confirmation')
                <div class=" invalid-feedback">{{ $message }}</div>
            @enderror
        </div>



        <div class=" mb-3">
            <button class=" btn btn-primary">Change Password</button>
        </div>
    </form>

    @endsection
