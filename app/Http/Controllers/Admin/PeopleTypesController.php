<?php

namespace App\Http\Controllers\Admin;

use App\Http\Helpers\Slug;
use App\PeopleType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PeopleTypesController extends Controller
{
    public function index()
    {
        $types = PeopleType::paginate(100);
        return view("admin.peopleTypes.index", compact('types'));
    }

    public function create()
    {
        return view("admin.peopleTypes.create");
    }

    public function show(PeopleType $type)
    {
        return view("admin.peopleTypes.show", compact('type'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:people_types',
        ]);
        $request['slug'] = (new Slug(new PeopleType(), '-'))->createSlug($request->name);
        PeopleType::create($request->all());
        return redirect(\Config::get("admin") . "/people/types/create");
    }

    public function edit(PeopleType $type)
    {
        return view("admin.peopleTypes.edit", compact('type'));
    }

    public function update(Request $request, PeopleType $type)
    {
        $request->validate([
            'name' => 'required|unique:people_types',
        ]);
        $request['slug'] = (new Slug($type, '-'))->createSlug($request->name);
        $type->update($request->all());
        return redirect(\Config::get("admin") . "/people/types/$type->slug/edit");
    }

    public function deleteAll(Request $request)
    {
        foreach(PeopleType::whereIn('id', explode(",", $request->post("ids")))->get() as $type)
            $type->delete();
        return response()->json(['success'=>"Types Deleted successfully."]);
    }

    public function destroy(PeopleType $type)
    {
        $type->delete();
        return redirect(\Config::get('admin') . "/people/types");
    }
}
