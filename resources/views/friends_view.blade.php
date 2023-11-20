<div class="row ps-4">
    <div class="col friend rounded">
        <h3 class="font-bold pt-3">Follows</h3>
        <ul class="list-unstyled text-center">
            {{-- @foreach (range(1, 5) as $index) --}}
            @forelse (current_user()->followers as $user)
                <li class="{{ $loop->last ? '' : 'mb-4' }}">
                    <div class="  d-flex  gap-5 align-items-center ">
                        <div class="d-flex align-items-center gap-2">
                            <a href="{{ route('profile', $user) }}" class="">
                                <img src="{{ $user->avatar }}" alt="_images" width="100px" height="100px"
                                    class="rounded-circle border ">
                            </a>
                            <h5 class="">{{ $user->name }}</h5>
                        </div>
                        <a href="{{ route('message_show',$user) }}">
                            <i class="fa-solid fa-message fa-xl " title="Message"></i>
                        </a>
                    </div>
                </li>

            @empty
                <li>No friends yet! </li>
            @endforelse
        </ul>
    </div>
</div>
