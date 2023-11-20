@extends('components.app')
@section('content')
    <div class=" pb-3 border">
        <div class="bg-success">
            <h3 class="text-center pt-2 ">Chat_Box</h3>
            <div class="d-flex align-items-center gap-2 pb-3 chat_margin ">
                <img src="{{ $user->avatar }}" class="rounded-circle ms-2" alt="" width="50px" height="50px">
                <p>{{ $user->name }}</p>
            </div>
        </div>

        <div class="row  pt-2 overflow-auto chat_style">
            <div class="col-6">

                @foreach ($chats_user as $chats)
                    <p class="bg-info p-3 ms-2 rounded-pill">{{ $chats->message }}</p>
                @endforeach

            </div>
            <div class="col-6 mt-4">

                @foreach ($follower_chats as $chat)
                    <p class=" bg-danger p-3 me-2 rounded-pill">{{ $chat->message }}</p>
                @endforeach

            </div>
        </div>

        {{-- <div class="row">
            <div class="col-12">
                <div class="row bg-info">
                    <p>Lorem ipsum dolor sit amet.</p>
                </div>
                <div class="row ">
                    <div class=" bg-danger d-flex flex-row-reverse">
                    <p>Lorem ipsum dolor sit amet.</p>
                    <p>Lorem ipsum dolor sit amet.</p>
                    <p>Lorem ipsum dolor sit amet.</p>
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="ms-3">
            <form action="{{ route('message_store', $user->id) }}" method="POST">
                @csrf
                <input type="text" placeholder="" name='message' class="p-2 rounded-pill w-75" autofocus>
                {{-- <input type="image" src="" alt="Submit" width="48" height="48"> --}}
                <button class="btn btn-primary">send</button>
            </form>
        </div>
    </div>
@endsection
