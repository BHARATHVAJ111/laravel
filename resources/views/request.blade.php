@extends('components.app')
@section('content')
    <h3 class="font-bold pt-3">Notifications</h3>
    <div class="row ps-4 ">
        <div class="col rounded ">
            <ul class="list-unstyled text-center">
                @forelse (auth()->user()->request as $user)
                    <div class="d-flex justify-content-between">
                        <div class=" mb-2 d-flex gap-2 align-items-center">
                            <a href="{{ route('profile', $user) }}" class="">
                                <img src="{{ $user->avatar }}" alt="_images" width="100px" height="100px"
                                    class="rounded-circle border ">
                            </a>
                            <h5 class="mt-4">{{ $user->name }}</h5>
                        </div>
                        <div class="d-flex gap-2 align-items-center">
                            <form action="{{ route('update', $user->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button class="btn btn-dark">Accept</button>
                            </form>
                            <form action="{{ route('destroy', $user->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-dark">Discart</button>
                            </form>
                        </div>
                    </div>
                @empty
                    <li>No notification yet!</li>
                @endforelse
            </ul>
        </div>
    </div>
@endsection
