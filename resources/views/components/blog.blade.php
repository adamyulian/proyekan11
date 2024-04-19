<div class="bg-transparent mt-16 py-0">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto max-w-2xl lg:mx-0">
          <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Kutipan cerita kita</h2>
          <p class="mt-2 text-lg leading-8 text-gray-600">Temukan cerita pengguna Proyekan dalam mengelola proyeknya.</p>
        </div>
    <div class="mx-auto mt-4 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 pt-10 lg:mx-0 lg:max-w-none lg:grid-cols-3">

        @foreach ( $posts as $post )
        <article class="flex max-w-xl flex-col items-start justify-between">
            <div class="flex items-center gap-x-4 text-xs">
              <time class="text-gray-500">{{$post->created_at->diffForHumans()}}</time>
              <a href="#" class="relative z-10 rounded-full bg-gray-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100 hover:text-pink-900" >Marketing</a>
            </div>
            <div class="group relative">
                <img src="{{ asset($post->image) }}" alt="Post Image" class="shadow-lg hover:border-pink-950 border-2 border-teal-500 rounded-t-lg mt-2 w-full h-60 object-cover ">
              <h3 class="mt-3 text-lg font-semibold leading-6 text-gray-900 hover:bg-gray-100 hover:text-pink-900">
                <a href="#">
                  <span class="absolute inset-0"></span>
                  {{$post->title}}
                </a>
              </h3>
              <p class="mt-5 line-clamp-3 text-sm leading-6 text-gray-600">{{$post->content}}</p>
            </div>
            <div class="relative mt-4 flex items-center gap-x-4">
              <img src="https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" class="mt-2 h-10 w-10 rounded-full bg-transparent-50">
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
  </div>
