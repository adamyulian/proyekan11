<div class="py-0 mt-16 bg-transparent">
    <div class="px-6 mx-auto max-w-7xl lg:px-8">
        <div class="max-w-2xl mx-auto lg:mx-0">
          <a href="/story" class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Kutipan cerita kami</a>
          <p class="mt-2 text-lg leading-8 text-gray-600">Temukan cerita pengguna Proyekan dalam mengelola proyeknya.</p>
        </div>
    <div class="grid max-w-2xl grid-cols-1 pt-10 mx-auto mt-4 gap-x-8 gap-y-16 lg:mx-0 lg:max-w-none lg:grid-cols-3">

        @forelse ( $latestPosts as $post )
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
          @empty
        @endforelse
    </div>
  </div>
