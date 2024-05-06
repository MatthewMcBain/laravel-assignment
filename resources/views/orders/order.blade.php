<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Order') }}
        </h2>

        <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
            <span class="text-gray-800">{{ $order->id }}</span>
            <form method="POST" action="{{ route('orders.order.add') }}">
                @csrf
                @foreach ($order->pizzas as $pizza)
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
                <input type="hidden" name="total" value={{ $order->price }}>
                <input type="hidden" name="collection" value="{{ $order->collection }}">
                <div class="pl-6 flex space-x-2">
                    <div class="flex-1">
                        <p class="mt-4 text-lg text-gray-900">{{ $order->collection }}</p>
                        <p class="mt-4 text-lg text-gray-900">Total: £{{ $order->price }} </p>
                        <x-primary-button class="mt-4">{{ __('Re-order') }}</x-primary-button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>