@extends('components.app')
@section('content')
    <form action="{{ $user->path() }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')


        <div class="mb-6 d-flex pb-4">
            <label class="col-md-4 col-form-label text-md-right" for="name">Name</label>
            <input type="text" name="name" id="name" value="{{ $user->name }}" required class="form-control p-2 ">
            @error('name')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6 d-flex pb-4">
            <label class="col-md-4 col-form-label text-md-right" for="username">username</label>
            <input type="text" name="username" id="username" value="{{$user->username}}" required class="form-control p-2 ">
            @error('username')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6 mb-3 d-flex pb-4">
            <label class="col-md-4 col-form-label text-md-right" for="avatar">Avatar</label>
            <input type="file" name="avatar" id="avatar" class="form-control p-2">
            @error('avatar')
                <p>{{ $message }}</p>
            @enderror
        </div>
        <img src="{{$user->avatar}}" alt="_your avatar" width="200px" height="200px">

        <div class="mb-6 d-flex pb-4">
            <label class="col-md-4 col-form-label text-md-right" for="email">E-mail</label>
            <input type="email" name="email" id="email" value="{{$user->email}}" required class="form-control p-2">
            @error('email')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6 d-flex pb-4">
            <label class="col-md-4 col-form-label text-md-right" for="password">password</label>
            <input type="password" name="password" id="password" required class="form-control p-2">
            @error('password')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6 d-flex pb-4">
            <label class="col-md-4 col-form-label text-md-right" for="password_confirmation">Password Confirmation</label>
            <input type="password" name="password_confirmation" id="password_confirmation"  required class="form-control p-2">
            @error('password_confirmation')
                <p>{{ $message }}</p>
            @enderror
        </div>

       <div class="d-flex gap-2">
        <div>
            <button type="submit" class="btn btn-success ">submit</button>
        </div>
        <a href="{{$user->path()}}" class="btn btn-danger text-white">Cancel</a>
       </div>

    </form>
@endsection
