<ul class="list-unstyled friend rounded p-4 text-center ">
    <li class="mb-3 "><a href="{{route('home')}}" class="">Home</a></li>
    <li  class="mb-3 "><a href="{{route('explore')}}">Explore</a></li>
    <li  class="mb-3 "><a href="{{current_user()->path()}}">Profile</a></li>
    <li class="mb-3 position-relative"><a href="{{route('request',auth()->user())}}" class="">Requests
    </a>
</li>

    <li>
        <form action="/logout" method="POST">
            @csrf
            <button class="btn logout_btn pt-2" type="submit">logout</button>
        </form>
    </li>
</ul>




