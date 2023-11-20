
            <div class="row mt-3 border border-2 ms-2 radius ">
                @forelse ($tweets as $tweet)
                @include('tweet')
                @empty
                  <p class="p-4 text-center mt-3">No tweets yet.</p>
                @endforelse
               <div class="d-flex justify-content-center bg-success">
               {{$tweets->links()}}

               </div>
            </div>
