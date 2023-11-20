    @extends('components.app')
@section('content')



    <div class="row">
        <div class="col relative">
            <img src="{{ asset('images/cartoons-wallpaper-preview.jpg') }}" alt="_images" height="350px" width="700px"
                class="micky_image">

            <img src="{{$user->avatar}}" alt="_images" class="rounded-circle  avatar_image" >
        </div>


        <div class="d-flex justify-content-between align-items-center pt-5">
            <div class="">
                <h2 class="fs-4 username_style">{{ $user->name }}</h2>
                <p>{{ $user->created_at->diffForHumans() }}</p>

                <a href="{{route('request',auth()->user())}}" class="">
                <i class="fa-solid fa-heart fa-xl position-relative {{auth()->user()->request->count()?'text-danger':''}}" title="Notifications"><span class="fs-6">{{auth()->user()->request->count()}}</span>
                </i>
                </a>

               

            </div>
            <div class="d-flex">
                {{-- Edit profile button --}}
                {{-- or use current_user() method app/helpers.php --}}
                @can('edit',$user)
                <a href="{{$user->path('edit')}}" class="btn btn-light border rounded-pill">Edit profile</a>
                @endcan
                {{-- Follow me button --}}

             @include('components.follow_button')
             {{-- @component('components.follow_button')

             @endcomponent --}}
             {{-- <x-follow-button :user="$user">

             </x-follow-button> --}}

            </div>
        </div>


        <div class="pt-5">
            <p>
                Mickey Mouse represents everything that Walt Disney wanted to portray- happiness, fun, dreams, and the
                ability to bring families together. The Mickey symbol has the power to evoke positive emotions and make
                memorable experiences, thus forming a strong and consistent meaning round the world.
            </p>
        </div>
    </div>
    @include('timeline', [
        'tweets' => $tweets
    ])
@endsection
