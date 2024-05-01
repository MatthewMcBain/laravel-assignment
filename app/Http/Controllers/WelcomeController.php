<?php

namespace App\Http\Controllers;

use App\Models\Pizza;
use App\Models\Topping;

class WelcomeController extends Controller
{
    //
    public function index()
    {
        return view('welcome', [
            'pizzas' => Pizza::get(),
            'toppings' => Topping::get(),
        ]);
    }
}
