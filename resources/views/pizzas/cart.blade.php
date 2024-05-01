<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pizzas') }}
        </h2>

        <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
            @foreach ($pizzas as $pizza)
            <div class="p-6 flex space-x-2">
                <div class="flex-1">
                    <div class="flex justify-between items-center">
                        <div>
                            <span class="text-gray-800">{{ $pizza->pizza_name }}</span>
                        </div>
                    </div>
                    <p class="mt-4 text-lg text-gray-900">{{ $pizza->description }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-app-layout>