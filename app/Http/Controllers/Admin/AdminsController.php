<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use Illuminate\Http\Request;

class AdminsController extends Controller
{

    public function __construct()
    {
        $this->middleware("admin");
    }

    /* Showing forms methods */
    public function index()
    {
        $admins = Admin::with("role")->get();
        return view("admin.admins.index", compact("admins"))->with("title", "Stgtube Backend | Admins");
    }

    public function show(Admin $admin)
    {
        return view("admin.admins.show", compact("admin"));
    }

    public function create()
    {
        return view("admin.admins.create")->with("title", "Stgtube Backend | Create Admin");
    }

    public function edit(Admin $admin)
    {
        return view("admin.admins.edit", compact('admin'))->with("title", "Stgtube Backend | Edit $admin->display_name");
    }

    /* Backend methods */

    public function store(AdminRequest $request)
    {
        $admin = Admin::create($request->all());
        return redirect("backend/admins/@".$admin->name."/edit");
    }

    public function update(AdminRequest $request, Admin $admin)
    {
        if($request->password == "") $request = $request->except("password");
        $admin->update($request->all());
        return redirect("backend/admins/@".$admin->name."/edit");
    }

    public function delete(Admin $admin)
    {
        $admin->delete();
        return redirect("backend/admins/");
    }
}
