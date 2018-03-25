<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class fileTypesController extends Controller
{
    public function index(FileType $types)
    {
        return view('admin.fileType.index', compact('types'));
    }

    public function show(FileType $type)
    {
        return view("admin.fileType.show", compact('type'));
    }

    public function create()
    {
        return view('admin.fileType.create', compact('types'));
    }

    public function store()
    {
        $this->validate(request(),[
                'name' => 'required'
            ]);

        FileType::create(request(['title', 'body']));

        return redirect(\Config::get("admin") . "/file/types/index");
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
