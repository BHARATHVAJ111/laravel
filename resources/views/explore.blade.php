@extends('components.app')
@section('content')
@foreach ($users as $user)

<a href="{{$user->path()}}" class="d-flex  align-items-center gap-2 flex-wrap">
{{-- <img src="{{$user->avatar}}" alt="{{$user->username}}'s avatar"  width="200px"><br> --}}
<img src="{{$user->avatar}}" alt="{{$user->username}}'s avatar"  width="200px"><br>

<div>
    <h4 class=" ">{{'@'.$user->username}}</h4>
</div>
</a>

@endforeach

{{$users->links()}}
@endsection
