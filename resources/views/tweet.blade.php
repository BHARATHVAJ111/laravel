
<div class="{{$loop->last?'':'border-bottom border-2'}}">
    <div class="d-flex  p-3 gap-2  flex-wrap ">
        <div class="">
           <a href="{{route('profile',$tweet->user)}}">
            <img src="{{$tweet->user->avatar}}" alt="_images" width="100px" height="100px"
            class="rounded-circle border">
        </a>
        </div>
        <div class="pt-4">
           <a href="{{route('profile',$tweet->user)}}">
            <h1>{{$tweet->user->name}}</h1>
           </a>
            <p style="max-width:400px" class="">{{$tweet->body}}</p>
        </div>
    </div>
     @include('components.like_button')
</div>

