<?php

namespace App\Http\Controllers\Admin;

use App\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PermissionsController extends Controller
{
    private $url = "permissions";

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
        $permissions = Permission::paginate(100);
        return view("admin.permissions.index", compact("permissions"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.permissions.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->request->add(['slug' => (new Slug(new Permission(), "."))->createSlug($request->name)]);
        $permission = Permission::create($request->all());
        flash()->success("Permission Created Successfully");
        return redirect(\Config::get("admin")."/".$this->url."/".$permission->id."/edit");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        return view("admin.permissions.edit", compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {
        $permission->update($request->all());
        return redirect(\Config::get("admin")."/".$this->url."/".$permission->id."/edit");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        $permission->roles()->detach();
        $permission->delete();
        return redirect(\Config::get("admin")."/".$this->url);
    }

    public function deleteAll(Request $request)
    {
        Permission::whereIn('id', explode(",", $request->post("ids")))->delete();
        return response()->json(['success'=>"Permissions Deleted successfully."]);
    }
}
