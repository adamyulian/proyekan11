<div>
    <div class="flex justify-center">
        <div class="bg-teal-50 rounded-lg w-3/4">
            <article class="flex flex-col mx-8">
                <div class="flex justify-between items-center text-xs gap-x-4">
                    <div class="flex-grow mt-8 gap-x-4">
                        <img src="https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" class="w-10 h-10 mt-2 rounded-full bg-transparent-50">
                        <div class="text-sm leading-6">
                          <p class="font-semibold text-gray-900">
                            <a href="#">
                              <span class=""></span>
                              {{$post->user->name}}
                            </a>
                          </p>
                          <p class="text-gray-600">Co-Founder / CTO</p>
                        </div>
                      </div>
                    <div class ="flex-shrink">
                    <time class="text-gray-500">{{$post->created_at->diffForHumans()}}</time>
                    <a href="#" class="mx-2 z-10 rounded-full bg-teal-600 px-3 py-1.5 font-medium text-white hover:bg-gray-100 hover:text-pink-900" >Marketing</a>
                    </div>
                </div>
                <div class="relative">
                    <h1 class="mt-6 text-6xl font-semibold leading-6 text-gray-900 hover:text-pink-900">
                        <a href="#">
                          <span class=""></span>
                          {{$post->title}}
                        </a>
                      </h1>
                </div>
                <div class="relative group">
                    @if(Storage::exists($post->image))
                    <img src="{{ asset(Storage::url($post->image)) }}" alt="Post Image" class="object-cover w-full mt-12 border-2 border-teal-500 rounded-t-lg shadow-lg h-60 ">
                    @else
                    <img src="{{ asset($post->image) }}" alt="Post Image" class="object-cover w-full mt-12 border-2 border-teal-500 rounded-t-lg shadow-lg h-60 ">
                    @endif
                  <p class="mt-5 text-lg leading-6 text-gray-600 line-clamp-3">{{$post->content}}</p>
                </div>
              </article>
        </div>
    </div>
    @include('components.blog')
</div>

