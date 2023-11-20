<div class="row">
    <div class="col border border-info p-4 border-2 border_radius">
        <form action="{{route('home')}}" method="POST">
            @csrf
            <textarea class="w-100 p-4 rounded border-2" placeholder="what's up doc?" name="body" required autofocus></textarea>

            <hr class="">
            <footer class="d-flex justify-content-between">
                <img src="{{current_user()->avatar}}" alt="_images" width="100px" height="100px"
                    class="rounded-circle border">
                <div>
                    <button type="submit" class="btn btn-info m-4">tweet-roo !</button>
                </div>
            </footer>
        </form>
        @error( 'body')
        <p class="text-danger fs-5">{{$message}}</p>
        @enderror
    </div>
</div>
