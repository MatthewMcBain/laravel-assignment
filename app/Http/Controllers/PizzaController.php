<?php

namespace App\Http\Controllers;

use App\Models\Pizza;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;

class PizzaController extends Controller
{
    /**    * Add the Pizza to Cart
     */
    public function addToCart(Pizza $pizza): RedirectResponse
    {
        $cart = session('cart', collect([]));
        $cart->push($pizza);
        session(['cart' => $cart]);
        return redirect(route('pizzas.index'));
    }

    public function addToOrder(Request $request): RedirectResponse
    {
        $order = $request->user()->orders()->create();
        $order->pizzas()->sync($request->pizzas);

        return redirect(route('pizzas.index'));
    }


    /**    * Show the Pizzas in Cart
     */
    public function cart(): View
    {
        $cart = session('cart', collect([]));
        return view('pizzas.cart', [
            'pizzas' => $cart,
        ]);
    }

        /**    * Show the Pizzas in Order
     */
    public function orders(): View
    {
        return view('pizzas.orders', [
            'orders' => Order::with('user')->latest()->get(),
        ]); 
    }


    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        // return view('pizzas.index');
        return view('pizzas.index', [
            'pizzas' => Pizza::get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     //
    // }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'pizza_name' => 'required|string|max:255',
        ]);

        // $request->user()->chirps()->create($validated);
        // $request->user()->pizzas()->create($validated);
        $request->user()->orders()->create($validated);

        return redirect(route('pizzas.cart'));
    }

    

    /**
     * Display the specified resource.
     */
    public function show(Pizza $pizza)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pizza $pizza)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pizza $pizza)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pizza $pizza)
    {
        //
    }
}
