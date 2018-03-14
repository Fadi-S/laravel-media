<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Http\Controllers\Controller;
use App\Http\Helpers\Slug;
use App\Http\Requests\AdminRequest;
use Illuminate\Http\Request;
use \Auth;
use \Storage;

class AdminsController extends Controller
{

    public function __construct()
    {
        $this->middleware("admin");
    }

    /* Showing forms methods */
    public function index()
    {
        $admins = Admin::paginate(100);
        return view("admin.admins.index", compact("admins"));
    }

    public function show(Admin $admin)
    {
        return view("admin.admins.show", compact("admin"));
    }

    public function create()
    {
        return view("admin.admins.create")->with(["create"=>true]);
    }

    public function edit(Admin $admin)
    {
        return view("admin.admins.edit", compact('admin'))->with(["create"=>false]);
    }

    /* Backend methods */

    public function store(AdminRequest $request)
    {
        $request->request->add(['slug' => (new Slug(new Admin(), "."))->createSlug($request->name)]);
        $admin = Admin::create($request->all());


        $admin->adminLog()->create(['admin_id' => auth()->guard('admin')->id()]);

        return redirect(\Config::get("admin")."/admins/".$admin->slug);
    }

    public function update(AdminRequest $request, Admin $admin)
    {
        $request['slug'] = (new Slug($admin, '-'))->createSlug($request->name);
        $admin->update($request->except("password"));
        return redirect(\Config::get("admin")."/admins/".$admin->slug."/edit");
    }

    public function destroy(Admin $admin)
    {
        $admin->delete();
        return redirect(\Config::get("admin")."/admins/");
    }

    public function deleteAll(Request $request)
    {
        Admin::whereIn('id', explode(",", $request->post("ids")))->delete();
        return response()->json(['success'=>"Admins Deleted successfully."]);
    }

    public function picture(Request $request)
    {
        $admin = Auth::guard("admin")->user();
        if ($request->method() == "GET") {
            Storage::delete($admin->picture);
            $admin->picture = "";
        } else if ($request->hasFile("picture")) {
            Storage::delete($admin->picture);
            $admin->picture = Storage::putFile("public/Pictures", $request->picture);
        }
        $admin->save();
        return redirect()->back();
    }
}
