
<div class="d-flex">
       <form action="/tweety/tweets/{{$tweet->id}}/like" method="POST">
        @csrf
    <button class="btn">
        <i class="fa-solid fa-thumbs-up  fs-3 ms-2 {{$tweet->isLikedBy(current_user())?'text-info':'text-secondary'}}"></i>
        <button class="btn">{{$tweet->likes ?:0}}</button>
    </button>
       </form>


       <form action="/tweety/tweets/{{$tweet->id}}/like" method="POST" >
        @csrf
        @method('DELETE')
        <button class="btn">
            <i class="fa-solid fa-thumbs-down fs-3 ms-2 {{$tweet->isDislikedBy(current_user())?'text-info':'text-secondary'}}"></i>
        <button class="btn">{{$tweet->dislikes?:0}}</button>
        </button>
       </form>
    </div>
