<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pizza;

class pizzaController extends Controller {
    public function index() {
        $data =  [
            "pizzas" => Pizza::all(), // Pizza::where("type", 'premium')->get(), // Pizza::orderBy("name")->get(),, // Pizza::latest(),
        ];
    
        return view('pizzas.index', $data);
    }

    public function getById($id) {
        $data =  [
            "pizzas" => [ Pizza::findOrFail($id) ],
            "id" => $id
        ];
    
        return view('pizzas.index', $data);
    }

    public function createForm() {
        $data =  [];
    
        return view('pizzas.create', $data);
    }

    public function insert() {
        $name = request("name"); //query param name
        $type = request("type");
        $base = request("base");

        $pizza = new Pizza();
        $pizza->name = $name;
        $pizza->type = $type;
        $pizza->base = $base;

        $pizza->save(); //inserting it in db

        return redirect('/pizzas')->with("msg", "new pizza created");
    }

    public function deleteById($id) {
        $pizza = Pizza::findOrFail($id);
        $pizza->delete();

        return redirect('/pizzas')->with("msg", "pizza deleted"); 
    }
}
