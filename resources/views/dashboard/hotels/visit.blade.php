<!-- resources/views/dashboard/hotels/view.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl text-gray-800 leading-tight">
            {{ __('View Hotel') }}: {{ $hotel->name }}
        </h2>
    </x-slot>

    @include('partials.dashboard_aside')

    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border rounded-lg dark:border-gray-700">
            <!-- Hotel Details Section -->
            <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                <div class="p-6">
                    <h2 class="text-lg font-semibold text-gray-800 dark:text-white">Hotel Details</h2>
                    <div class="mt-6">
                        <p class="block text-sm font-medium text-gray-700 dark:text-gray-300">Hotel Name:</p>
                        <p class="mt-1 text-sm text-gray-900 dark:text-white">{{ $hotel->name }}</p>
                    </div>
                    <div class="mt-6">
                        <p class="block text-sm font-medium text-gray-700 dark:text-gray-300">Hotel Address:</p>
                        <p class="mt-1 text-sm text-gray-900 dark:text-white">{{ $hotel->address }}</p>
                    </div>
                    <div class="mt-6">
                        <p class="block text-sm font-medium text-gray-700 dark:text-gray-300">Hotel Phone:</p>
                        <p class="mt-1 text-sm text-gray-900 dark:text-white">{{ $hotel->phone }}</p>
                    </div>
                    <div class="mt-6">
                        <p class="block text-sm font-medium text-gray-700 dark:text-gray-300">Hotel City:</p>
                        <p class="mt-1 text-sm text-gray-900 dark:text-white">{{ $hotel->city->name }}</p>
                    </div>
                    <!-- Display other hotel details -->
                </div>
            </div>

            <!-- Reservations Section -->
            <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                <div class="p-6">
                    <h2 class="text-lg font-semibold text-gray-800 dark:text-white">Reservations</h2>

                    <!-- Display reservations related to this hotel -->
                    @if ($hotel->reservations->count() > 0)
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Customer Name
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Check-in Date
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Check-out Date
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Room Number:
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($hotel->reservations as $reservation)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $reservation->customer_name }} {{ $reservation->customer_family }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $reservation->start_date }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $reservation->end_date }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $reservation->room->number }}
                                </td>
                                <!-- Add more columns if needed -->
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <p class="text-gray-500">No reservations found for this hotel.</p>
                    @endif
                </div>
            </div>

            <!-- Rooms Section -->
            <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                <div class="p-6">
                    <h2 class="text-lg font-semibold text-gray-800 dark:text-white">Rooms</h2>

                    <div class="overflow-x-auto">
                        <table class="table-auto w-full">
                            <thead>
                                <tr>
                                    <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Room Number</th>
                                    <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Is Available</th>
                                    <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Type</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($rooms as $room)
                                <tr class="bg-white">
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $room->number }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $room->available ? 'Yes' : 'No' }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $room->type }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>



            <!-- Other Sections as needed -->

            <!-- Back Button Section -->
            <div class="mt-6">
                <a href="{{ route('dashboard.hotels') }}" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest bg-indigo-600 hover:bg-indigo-700 active:bg-indigo-700 focus:outline-none focus:border-indigo-800 focus:ring focus:ring-indigo-200 disabled:opacity-25 transition">{{ __('Back to Hotels') }}</a>
            </div>
        </div>
    </div>
</x-app-layout>
