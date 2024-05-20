
<div class="w-11/12 py-16 mx-auto bg-transparent">
    <div class="mx-auto">
      <h2 class="text-3xl font-bold tracking-tight text-gray-900">Cerita Kami</h2>
    <div class="grid grid-cols-3 gap-4">
        @foreach ($posts as $post)
        <div class="grid-flow-col mt-6 gap-x-6 gap-y-10 xl:gap-x-8">
            <div class="relative group">
              <div class="w-full overflow-hidden rounded-md aspect-h-1 aspect-w-1 bg-slate-200 lg:aspect-none group-hover:opacity-75 lg:h-80">
                        @if(Storage::exists($post->image))
                        <img src="{{ asset(Storage::url($post->image)) }}" alt="Post Image" class="flex object-cover w-full h-full mt-2 rounded-t-lg shadow-lg">
                        @else
                        <img src="{{ asset($post->image) }}" alt="Post Image" class="flex object-cover w-full h-full mt-2 rounded-t-lg shadow-lg">
                        @endif
              </div>
              <div class="flex justify-between mt-4">
                <div>
                  <h3 class="text-xl text-gray-700">
                    <a href="{{ route('posts.show', $post->slug) }}" wire:key="$post->slug">
                        <span class="row-auto max-h-fit"></span>
                        {{$post->title}}
                    </a>
                  </h3>
                  <time class="flex items-center text-xs text-gray-500 gap-x-4">{{$post->created_at->diffForHumans()}}</time>

                </div>
                <a href="#" class="flex items-center text-xs gap-x-4 relative rounded-full bg-teal-100 px-3 py-1.5 text-gray-600 hover:bg-gray-100 hover:text-pink-900" >Marketing</a>
              </div>
              <div class="relative flex items-center mt-4 gap-x-4">
                <img src="https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" class="w-10 h-10 mt-2 rounded-full bg-transparent-50">
                <div class="text-sm leading-6">
                  <p class="font-semibold text-gray-900">
                    <a href="#">
                      <span class="absolute inset-0"></span>
                      {{$post->user->name}}
                    </a>
                  </p>
                  <p class="text-gray-600">Co-Founder / CTO</p>
                </div>
              </div>
            </div>

          </div>
          @endforeach

    </div>

    </div>
  </div>

