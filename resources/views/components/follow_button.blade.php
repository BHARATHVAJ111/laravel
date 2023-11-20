@unless (current_user()->is($user))
    {{-- <form action="/profile/{{$user->username}}/follow" method="post"> --}}
    <form action="{{ route('follow', $user->username) }}" method="post">
        @csrf
        <button type="submit"
            class="btn btn-info rounded rounded-pill">{{ auth()->user()->following($user)? 'Unfollow Me': 'Follow Me' }}</button>
    </form>
@endunless

