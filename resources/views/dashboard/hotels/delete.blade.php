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
                <div class="p-6">
                    <h2 class="text-lg font-semibold text-gray-800 dark:text-white">Delete Hotel: {{ $hotel->name }}</h2>

                    <p>Are you sure you want to delete this hotel?</p>

                    <form action="{{ route('hotels.destroy', $hotel->id) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-semibold px-4 py-2 rounded-lg">Delete</button>

                        <a href="{{ route('dashboard.hotels') }}" class="text-blue-500 hover:text-blue-600 font-semibold px-4 py-2 rounded-lg">Cancel</a>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

</x-app-layout>