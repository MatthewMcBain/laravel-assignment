<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Order') }}
        </h2>

        <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
            <span class="text-gray-800">{{ $order->id }}</span>
            <form method="POST" action="{{ route('pizzas.order.add') }}">
                <div class="hidden">{{$runningTotal = 0}} </div>
                @csrf
                @foreach ($order->pizzas as $pizza)
                <div class="hidden">{{ $runningTotal += $pizza->price}} </div>
                <div class="p-6 flex space-x-2">
                    <div class="flex-1">
                        <p class="mt-4 text-lg text-gray-900">{{ $pizza->pizza_name }}</p>
                        <p class="mt-4 text-lg text-gray-900">{{ $pizza->description }}</p>
                        <p class="mt-4 text-lg text-gray-900">{{ $pizza->size }}</p>
                        <p class="mt-4 text-lg text-gray-900">£{{ $pizza->price }}</p>
                    </div>
                </div>
                <input type="hidden" name="pizzas[]" value="{{ $pizza->id }}">
                @endforeach
                <div class="pl-6 flex space-x-2">
                    <div class="flex-1">
                        <p class="mt-4 text-lg text-gray-900">Total: £{{ $runningTotal }} </p>
                        <x-primary-button class="mt-4">{{ __('Re-order') }}</x-primary-button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>