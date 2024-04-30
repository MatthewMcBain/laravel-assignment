<?php

namespace App\Http\Controllers;

use App\Models\Pizza;
use App\Models\Topping;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    //
    public function index()
    {
        // $pizzas = Pizza::all();
        // return view('welcome')->with('pizzas', $pizzas);
        return view('welcome', [
            'pizzas' => Pizza::get(),
            'toppings' => Topping::get(),
        ]);
    }
}
