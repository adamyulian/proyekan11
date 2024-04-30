
    <div class="grid grid-cols-5 gap-4">
        <div class="grid grid-cols-2 col-span-4 gap-4">
        @foreach($posts as $post)
        <article class="flex flex-col items-start justify-between max-w-xl">
            <div class="flex items-center text-xs gap-x-4">
              <time class="text-gray-500">{{$post->created_at->diffForHumans()}}</time>
              <a href="#" class="relative z-10 rounded-full bg-gray-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100 hover:text-pink-900" >Marketing</a>
            </div>
            <div class="relative group">
                @if(Storage::exists($post->image))
                    <img src="{{ asset(Storage::url($post->image)) }}" alt="Post Image" class="object-cover w-full mt-2 border-2 border-teal-500 rounded-t-lg shadow-lg hover:border-pink-950 h-60 ">
                @else
                    <img src="{{ asset($post->image) }}" alt="Post Image" class="object-cover w-full mt-2 border-2 border-teal-500 rounded-t-lg shadow-lg hover:border-pink-950 h-60 ">
                @endif
              <h3 class="mt-3 text-lg font-semibold leading-6 text-gray-900 hover:bg-gray-100 hover:text-pink-900">
                <a href="{{ route('posts.show', $post->id) }}" wire:key="$post->id">
                  <span class="absolute inset-0"></span>
                  {{$post->title}}
                </a>
              </h3>
              <p class="mt-5 text-sm leading-6 text-gray-600 line-clamp-3">{{$post->content}}</p>
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
          </article>
        @endforeach
        </div>
        <div>
            <div class="w-full p-4 bg-white rounded-lg shadow-md">
                <h2 class="mb-2 text-xl font-semibold">Kategori</h2>
                <li class="mb-4 text-gray-600">{{$post->title}}</li>
            </div>
        </div>
    </div>
