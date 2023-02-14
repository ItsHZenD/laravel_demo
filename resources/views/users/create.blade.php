@extends('layout.master')
@section('content')
    <link rel="stylesheet" href="{{ asset('fonts/material-design-iconic-font.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <form action="{{ route('store') }}" method="post">
        @csrf
        <h2 class="form-title">Create user</h2>
        <div class="form-group">
            <input type="text" class="form-input" name="first_name" placeholder="First Name">
        </div>
        <div class="form-group">
            <input type="text" class="form-input" name="last_name" placeholder="Last Name">
        </div>
        <div class="form-group">
            <label for="">Birthdate</label>
            <input type="date" class="form-input" name="birthdate" id="birthdate" />
        </div>
        <div class="form-group">
            <label for="role">Gender</label> <br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender"  value="1" checked>
                <label class="form-check-label" for="male">
                    Male
                </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" value="0">
                <label class="form-check-label" for="female">
                    Female
                </label>
            </div>
        </div>
        <button class="btn btn-success">Create</button>
    </form>
@endsection
