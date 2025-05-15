@extends('app')

@section('title', 'Users')

@section('content')
    <div class="col-md-12">
    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('users.store') }}" method="POST">
         @csrf
        <div class="input-group mb-3">
            <input type="text" id="name" name="name" class="form-control" placeholder="Full Name" />
            <div class="input-group-text"><span class="bi bi-person"></span></div>
        </div>
        <div class="input-group mb-3">
            <input type="email" id="email" name="email" class="form-control" placeholder="Email" />
            <div class="input-group-text"><span class="bi bi-envelope"></span></div>
        </div>
        <div class="input-group mb-3">
            <input type="password" id="password" name="password" class="form-control" placeholder="Password" />
            <div class="input-group-text"><span class="bi bi-lock-fill"></span></div>
        </div>
        <div class="input-group mb-3">
            <input type="password" id="confirmed" name="confirmed" class="form-control" placeholder="Confirm Password" />
            <div class="input-group-text"><span class="bi bi-lock-fill"></span></div>
        </div>
        <div class="input-group mb-3">
            <button type="submit" class="btn btn-primary">Add</button>
        </div>
        
    </form>

    </div>
@endsection
