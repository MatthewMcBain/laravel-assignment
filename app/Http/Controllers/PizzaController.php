<?php

namespace App\Http\Controllers;

use App\Models\Pizza;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
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
        $request->session()->forget('cart');
        return redirect(route('orders.index'));
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

    public function store(Request $request)
    {
        //
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
