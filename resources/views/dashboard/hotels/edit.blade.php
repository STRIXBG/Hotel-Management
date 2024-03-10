<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl text-gray-800 leading-tight">
            {{ __('Edit Hotel Dashboard') }}
        </h2>
    </x-slot>

    @include('partials.dashboard_aside')
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border rounded-lg dark:border-gray-700">
            <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                <div class="grid grid-cols-1 md:grid-cols-2">
                    <div class="p-6">
                        <h2 class="text-lg font-semibold text-gray-800 dark:text-white">Edit Hotel: {{ $hotel->name }}</h2>
                        <form action="{{ route('hotels.update', $hotel->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mt-6">
                                <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Hotel Name</label>
                                <input type="text" name="name" id="name" value="{{ $hotel->name }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <!-- Add more form fields for other hotel details -->
                            <div class="mt-6">
                                <label for="address" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Address</label>
                                <input type="text" name="address" id="address" value="{{ $hotel->address }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <div class="mt-6">
                                <label for="phone" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Phone</label>
                                <input type="text" name="phone" id="phone" value="{{ $hotel->phone }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <div class="mt-6">
                                <label for="city" class="block text-sm font-medium text-gray-700 dark:text-gray-300">City</label>
                                <select name="city_id" id="city" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    @foreach($cities as $city)
                                    <option value="{{ $city->id }}" @if($city->id == $hotel->city_id) selected @endif>{{ $city->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- End of additional form fields -->

                            <div class="mt-6">
                                <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest bg-indigo-600 hover:bg-indigo-700 active:bg-indigo-700 focus:outline-none focus:border-indigo-800 focus:ring focus:ring-indigo-200 disabled:opacity-25 transition">{{ __('Update Hotel') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>