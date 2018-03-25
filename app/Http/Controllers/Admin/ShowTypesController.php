<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class showTypesController extends Controller
{
    public function index(ShowType $types)
    {
    	return view('admin.showTypes.index', compact('types'));
    }

    public function show(ShowType $type)
    {
        return view("admin.showTypes.show", compact('type'));
    }

    public function create()
    {
    	return view('admin.showTypes.create', compact('types'));
    }

    public function store()
    {
        $this->validate(request(),[
                'name' => 'required'
            ]);

        ShowType::create(request(['title', 'body']));

        return redirect(\Config::get("admin") . "/show/types/index");
    }

    

    // lessa msh 3arefhom
    public function edit()
    {
        
    }


    public function update()
    {       
        
    }

    public function deleteAll()
    {
        
    }

    public function destroy()
    {
        
    }
}

