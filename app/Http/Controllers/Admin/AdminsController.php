<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;

class AdminsController extends Controller
{

    public function __construct()
    {
        $this->middleware("admin");
    }

    /* Showing forms methods */
    public function index()
    {
        $admins = Admin::get();
        return view("admin.admins.index", compact("admins"))->with("title", "Stgtube Backend | Admins");
    }

    public function show(Admin $admin)
    {
        return view("admin.admins.show", compact("admin"));
    }

    public function create()
    {
        return view("admin.admins.create")->with(["title" => "Stgtube Backend | Create Admin", "create"=>true]);
    }

    public function edit(Admin $admin)
    {
        return view("admin.admins.edit", compact('admin'))->with(["title"=> "Stgtube Backend | Edit $admin->name", "create"=>false]);
    }

    /* Backend methods */

    public function store(AdminRequest $request)
    {
        $admin = Admin::create($request->all());
        return redirect(\Config::get("admin")."/admins/".$admin->slug."/edit");
    }

    public function update(AdminRequest $request, Admin $admin)
    {
        $admin->update($request->except("password"));
        return redirect(\Config::get("admin")."/admins/".$admin->slug."/edit");
    }

    public function destroy(Admin $admin)
    {
        $admin->delete();
        return redirect(\Config::get("admin")."/admins/");
    }
}
