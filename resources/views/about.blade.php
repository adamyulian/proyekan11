<x-layouts.app>
    <div class="relative py-16 overflow-hidden bg-transparent isolate">
        <div class="px-6 mx-auto max-w-7xl lg:px-8">
          <div class="max-w-2xl mx-auto lg:mx-0">
            <h2 class="font-sans text-4xl font-bold tracking-tight text-gray-900">Tentang Kami</h2>
            <p class="mt-6 text-lg leading-8 text-gray-600">"Proyekan.com adalah perusahaan yang berfokus pada inovasi di industri konstruksi khususnya dalam perencanaan dan pengelolaan sumber daya. Kami bersama - sama tumbuh dengan perkembangan teknologi mendukung perencanaan dan pengelolaan sumber daya di dunia konstruksi yang lebih efektif dan efisien. Kami menyediakan analisa biaya konstruksi dalam sebuah buku dan mengembangkan suatu portal berbasis web untuk mempermudah pengelolaan proyek konstruksi, termasuk didalamnya pengelolaan anggaran dan tenaga kerja, semuanya dapat diakses dengan mudah melalui satu platform web."</p>
          </div>
          <div class="max-w-2xl mx-auto mt-10 lg:mx-0 lg:max-w-none">
            <div class="grid grid-cols-1 text-base font-semibold leading-7 text-gray-900 gap-x-8 gap-y-6 sm:grid-cols-2 md:flex lg:gap-x-10">
              <a href="#">Komunitas <span aria-hidden="true">&rarr;</span></a>
              <a href="#">Kursus Pembelajaran <span aria-hidden="true">&rarr;</span></a>
              <a href="#">Publikasi Buku <span aria-hidden="true">&rarr;</span></a>
              {{-- <a href="#">Meet our leadership <span aria-hidden="true">&rarr;</span></a> --}}
            </div>
            <dl class="grid grid-cols-1 gap-8 mt-16 sm:mt-20 sm:grid-cols-2 lg:grid-cols-4">
              <div class="flex flex-col-reverse">
                <dt class="text-base leading-7 text-gray-600">Alumni Teknik Sipil</dt>
                <dd class="text-2xl font-bold leading-9 tracking-tight text-gray-900">1</dd>
              </div>
              <div class="flex flex-col-reverse">
                <dt class="text-base leading-7 text-gray-600">Full-time colleagues</dt>
                <dd class="text-2xl font-bold leading-9 tracking-tight text-gray-900">300+</dd>
              </div>
              <div class="flex flex-col-reverse">
                <dt class="text-base leading-7 text-gray-600">Hours per week</dt>
                <dd class="text-2xl font-bold leading-9 tracking-tight text-gray-900">40</dd>
              </div>
              <div class="flex flex-col-reverse">
                <dt class="text-base leading-7 text-gray-600">Paid time off</dt>
                <dd class="text-2xl font-bold leading-9 tracking-tight text-gray-900">Unlimited</dd>
              </div>
            </dl>
          </div>
        </div>
      </div>
      @include('components.footer')
</x-layouts.app>
