<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Orders') }}
        </h2>

        <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
            @foreach ($orders as $order)
            <div class="hidden">{{$runningTotal = 0}} </div>
            <div class="p-6 flex space-x-2">
                <div class="flex-1">
                    <div class="flex justify-between items-center">
                        <div>
                            <span class="text-gray-800">{{ $order->id }}</span>
                            @foreach ($order->pizzas as $pizza)
                            <div class="hidden">{{ $runningTotal += $pizza->price}} </div>
                            <p class="mt-4 text-lg text-gray-900">{{ $pizza->pizza_name }}</p>
                            <p class="mt-4 text-lg text-gray-900">{{ $pizza->size }}</p>
                            @endforeach
                            <p class="mt-4 text-lg text-gray-900">Total: £{{ $runningTotal }} </p>
                        </div>
                        <a href="{{ route('orders.show', $order) }}" class="px-6 py-3 text-white no-underline bg-black rounded hover:bg-slate-800 hover:text-white">{{ __('View') }}</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-app-layout>