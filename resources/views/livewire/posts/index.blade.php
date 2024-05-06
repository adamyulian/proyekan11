
    {{-- <div class="grid grid-cols-5 gap-4">
        <div class="grid grid-cols-2 col-span-4 gap-4">
        @foreach($posts as $post)
        <article class="flex flex-col items-start justify-between max-w-xl text-wrap">
            <div class="flex items-center text-xs gap-x-4">
              <time class="text-gray-500">{{$post->created_at->diffForHumans()}}</time>
              <a href="#" class="relative rounded-full bg-gray-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100 hover:text-pink-900" >Marketing</a>
            </div>
            <div class="grid grid-rows-3" style="max-width: 400px;"><!-- Adjust the max-width value according to your design -->
                <div class="flex row-span-2">
                    @if(Storage::exists($post->image))
                    <img src="{{ asset(Storage::url($post->image)) }}" alt="Post Image" class="flex object-cover w-full mt-2 border-2 border-teal-500 rounded-t-lg shadow-lg hover:border-pink-950 h-60 ">
                    @else
                    <img src="{{ asset($post->image) }}" alt="Post Image" class="flex object-cover w-full mt-2 border-2 border-teal-500 rounded-t-lg shadow-lg hover:border-pink-950 h-60 ">
                    @endif
                </div>
                <div class="flex row-span-2">
                    <h3 class="mt-3 text-lg font-semibold text-gray-900 hover:bg-gray-100 hover:text-pink-900">
                        <a href="{{ route('posts.show', $post->id) }}" wire:key="$post->id">
                            <span class="row-auto max-h-fit"></span>
                            {{$post->title}}
                        </a>
                    </h3>
                </div>
                <div class="flex row-span-2 mt-5 text-sm leading-6 text-gray-600 line-clamp-3 ">
                    <p>{!! implode(' ', array_slice(str_word_count($post->content, 1), 0, 50)) !!}</p>
                </div>
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
    </div> --}}

    {{-- <div class="grid grid-cols-2 col-span-4 gap-4">
        @forelse ( $posts as $post )
        <ul class="grid max-w-[26rem] sm:max-w-[52.5rem] mt-16 sm:mt-20 md:mt-32 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 mx-auto gap-6 lg:gap-y-8 xl:gap-x-8 lg:max-w-7xl px-4 sm:px-6 lg:px-8">
            <li class="group relative rounded-3xl bg-teal-50 p-6 dark:bg-teal-800/80 dark:highlight-white/5 hover:bg-teal-100 dark:hover:bg-teal-700/50">
                <div class="aspect-[672/494] relative rounded-md transform overflow-hidden shadow-[0_2px_8px_rgba(15,23,42,0.08)] bg-teal-200 dark:bg-teal-700">
                    @if(Storage::exists($post->image))
                    <img src="{{ asset(Storage::url($post->image)) }}" alt="Post Image" class="flex object-cover w-full mt-2 border-2 border-teal-500 rounded-t-lg shadow-lg hover:border-pink-950 h-60 ">
                    @else
                    <img src="{{ asset($post->image) }}" alt="Post Image" class="flex object-cover w-full mt-2 border-2 border-teal-500 rounded-t-lg shadow-lg hover:border-pink-950 h-60 ">
                    @endif
                    <div>
                        <video preload="none" muted="" playsinline="" class="absolute inset-0 w-full h-full [mask-image:radial-gradient(white,black)]">
                            <source src="/_next/static/media/openai.com.e55b5afbebfae62d1350968a66653eef24f49dfe.mp4" type="video/mp4">
                        </video>
                    </div>
                </div>
                <div class="flex flex-wrap items-center mt-6">
                    <h2 class="text-sm leading-6 text-teal-900 dark:text-white font-semibold group-hover:text-sky-500 dark:group-hover:text-pink-900">
                        <a href="/showcase/openai">
                            <span class="absolute inset-0 rounded-3xl">
                            </span>OpenAI / ChatGPT
                        </a>
                    </h2>
                        <svg class="w-6 h-6 flex-none opacity-0 group-hover:opacity-100" viewBox="0 0 24 24" fill="none">
                            <path d="M9.75 15.25L15.25 9.75M15.25 9.75H10.85M15.25 9.75V14.15" stroke="#0EA5E9" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            </path>
                        </svg>
                        <p class="w-full flex-none text-[0.8125rem] leading-6 text-slate-500 dark:text-pink-900">Marketing website &amp; chat interface
                        </p>
                </div>
            </li>
        </ul>
        @empty

        @endforelse


    </div> --}}

    <!--
  This example requires some changes to your config:

  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/aspect-ratio'),
    ],
  }
  ```
-->
<div class="bg-transparent mx-auto w-11/12">
    <div class="mx-auto">
      <h2 class="text-2xl font-bold tracking-tight text-gray-900">Cerita Kami</h2>
    <div class="grid grid-cols-3 gap-4">
        @foreach ($posts as $post)
        <div class="mt-6 grid-flow-col gap-x-6 gap-y-10 xl:gap-x-8">
            <div class="group relative">
              <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-slate-200 lg:aspect-none group-hover:opacity-75 lg:h-80">
                        @if(Storage::exists($post->image))
                        <img src="{{ asset(Storage::url($post->image)) }}" alt="Post Image" class="flex object-cover mt-2 rounded-t-lg shadow-lg h-full w-full">
                        @else
                        <img src="{{ asset($post->image) }}" alt="Post Image" class="flex object-cover mt-2 rounded-t-lg shadow-lg h-full w-full">
                        @endif
              </div>
              <div class="mt-4 flex justify-between">
                <div>
                  <h3 class="text-xl text-gray-700">
                    <a href="{{ route('posts.show', $post->id) }}" wire:key="$post->id">
                        <span class="row-auto max-h-fit"></span>
                        {{$post->title}}
                    </a>
                  </h3>
                  <time class="flex items-center text-xs gap-x-4 text-gray-500">{{$post->created_at->diffForHumans()}}</time>

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

