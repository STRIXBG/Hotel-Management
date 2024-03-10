<x-app-layout>
    <x-slot name="header" >
        <h2 class="text-xl text-gray-800 leading-tight">
            {{ __('Section:') }} <span class="text-indigo-700 font-semibold">{{ __($section) }}</span>
        </h2>
    </x-slot>


    @include('partials.dashboard_aside')


    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border rounded-lg dark:border-gray-700">

            @if ($hotels_count > 0)
            <div
                class="mb-10 overflow-hidden duration-300 border bg-indigo-100 rounded-lg dark:bg-dark-2 shadow-1 hover:shadow-3 dark:shadow-card dark:hover:shadow-3"
                >
                <div class="p-8 text-center sm:p-9 md:p-7 xl:p-9">
                    <h3>
                        {{ __('ownedHotels', ['hotels_count' => $hotels_count]) }}

                    </h3>
                    <p class="text-base leading-relaxed text-body-color mb-7">
                        {{ __('addHotel', ['limit' => __('No Limit')]) }}
                    </p>
                </div>
            </div>
            @else
            <div class="bg-white py-24 sm:py-32 mx-auto max-w-2xl text-center">
                <h2 class="text-base font-semibold leading-7 text-indigo-600">{{ __("You still don't have a hotel") }}</h2>
                <p class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">{{ __('Click on ADD button to begin') }}</p>
            </div>
            @endif

            <!-- My Hotels -->
            <div class="flex flex-wrap -mx-4 my-5">
                @foreach ($hotels as $hotel)
                <div class="w-full md:w-1/2 lg:w-1/3 xl:w-1/4 px-4 mb-4">
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <!-- Съдържание на картата -->
                        <h2 class="text-lg font-semibold mb-2">{{ $hotel->name }}</h2>
                        <img src="{{ $hotel->image }}" alt="{{ $hotel->address }}" class="w-full mb-4 rounded-md">
                        <p class="text-gray-700 mb-4">{{ $hotel->description }}</p>
                        <!-- Бутони за действия -->
                        <div class="flex justify-between items-center">
                            <a href="{{ route('dashboard.hotels.visit', $hotel->id) }}" class="text-blue-500 hover:text-blue-700">
                                {{__('See') }}
                            </a>

                            <div>
                                <a href="{{ route('dashboard.hotels.edit', $hotel->id) }}" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                    {{ __('Edit') }}
                                </a>

                                <a href="{{ route('dashboard.hotels.delete', $hotel->id) }}" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                    {{ __('Delete') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>


            <div class="text-center my-4">
                @if ($hotels_count > 0)
                <p>{{ __('You want to add a new hotel?') }}</p>
                @endif
                <button id="addHotelButton" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                    {{ __('ADD') }}
                </button>
            </div>

            <div id="newHotelForm" style="display: none;">
                <form action="{{ route('hotels.store') }}" method="POST" class="w-full max-w-md mx-auto">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name:</label>
                        <input type="text" id="name" name="name" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <div class="mb-4">
                        <label for="address" class="block text-gray-700 text-sm font-bold mb-2">Address:</label>
                        <input type="text" id="address" name="address" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <div class="mb-4">
                        <label for="phone" class="block text-gray-700 text-sm font-bold mb-2">Phone:</label>
                        <input type="text" id="phone" name="phone" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <div class="mb-4">
                        <label for="city" class="block text-gray-700 text-sm font-bold mb-2">City:</label>
                        <select id="city" name="city_id" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            @foreach ($cities as $city)
                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Create Hotel</button>
                    </div>
                </form>

            </div>
        </div>
    </div>





</x-app-layout>

<script>
    $(document).ready(function () {
        $('#addHotelButton').click(function () {
            $('#newHotelForm').toggle();
        });
    });
</script>