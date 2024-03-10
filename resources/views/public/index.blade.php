<x-app-layout>
    <!-- Hero -->
    <section class="bg-white dark:bg-gray-900 border-b-2">
        <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
            <div class="mr-auto place-self-center lg:col-span-7">
                <h1 class="max-w-2xl mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl xl:text-6xl dark:text-white">Все още търсиш система за управление на хотел?</h1>
                <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">На правилното място си! Въведи данни и започни още сега</p>
                <a href="/hotels" class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center text-gray-900 border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                    Въведи своя хотел
                </a> 
            </div>
            <div class="hidden lg:mt-0 lg:col-span-5 lg:flex">
                <img src="{{ asset('assets/images/hotel_thumb.jpg') }}">
            </div>                
        </div>
    </section>

    <!-- Client Comments -->
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16 lg:px-6">
            <div class="mx-auto max-w-screen-sm">
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Какво мислят за нас?</h2>
                <p class="mb-8 font-light text-gray-500 lg:mb-16 sm:text-xl dark:text-gray-400">Разгледайте мненията на нашите потребители</p>
            </div> 
            <div class="grid mb-8 lg:mb-12 lg:grid-cols-2">

                @foreach ($comments as $testimonial)
                <figure class="flex flex-col justify-center items-center p-8 text-center bg-gray-50 border border-gray-200 md:p-12 lg:border-r dark:bg-gray-800 dark:border-gray-700">
                    <blockquote class="mx-auto mb-8 max-w-2xl text-gray-500 dark:text-gray-400">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">{{ $testimonial->title }}</h3>
                        <p class="my-4">{{ $testimonial->comment }}</p>
                    </blockquote>
                    <figcaption class="flex justify-center items-center space-x-3">
                        <img class="w-9 h-9 rounded-full" src="" alt="profile picture">
                        <div class="space-y-0.5 font-medium dark:text-white text-left">
                            @if ($testimonial->user)
                            <div>{{ $testimonial->user->name }}</div>
                            <div class="text-sm font-light text-gray-500 dark:text-gray-400">{{ $testimonial->user->role }}</div>
                            @else
                            <div>User Not Found</div>
                            @endif
                        </div>
                    </figcaption>    
                </figure>
                @endforeach

            </div>
            <div class="text-center">
                <a href="comments/create" class="py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Имаш мнение за нас? Коментирай</a> 
            </div>
    </section>

    @include('layouts.footer')
</x-app-layout>
