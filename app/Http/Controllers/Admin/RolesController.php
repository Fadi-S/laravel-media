<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RolesController extends Controller
{
    public function __construct()
    {
        $this->middleware("admin");
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::paginate(100);
        return view("admin.roles.index", compact("roles"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.roles.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->request->add(['slug' => (new Slug(new Role(), "."))->createSlug($request->name)]);
        $role = Role::create($request->all());
        //$role->permissions()->sync($request->permissions);

        $role->adminLog()->create(['admin_id' => auth()->guard('admin')->id() , 'message' => 'new role has been added']);

        flash()->success("Role Created Successfully");
        return redirect(\Config::get("admin")."/roles/".$role->id."/edit");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        return view("admin.roles.edit", compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $role->update($request->all());
        $role->permissions()->sync($request->permissions);
        return redirect(\Config::get("admin")."/roles/".$role->id."/edit");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->permissions()->detach();
        $role->delete();
        return redirect(\Config::get("admin")."/roles/");
    }

    public function deleteAll(Request $request)
    {
        foreach(explode(",", $request->post("ids")) as $id):
            $role = Role::find($id);
            $role->permissions()->detach();
            $role->delete();
        endforeach;
        return response()->json(['success'=>"Roles Deleted successfully."]);
    }
}
