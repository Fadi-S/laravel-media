<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Helpers\Slug;
use App\Publisher;
use Illuminate\Http\Request;

class PublishersController extends Controller
{
    public function index()
    {
        $publishers = Publisher::paginate(100);
        return view("admin.publishers.index", compact('publishers'));
    }

    public function create()
    {
        return view("admin.publishers.create");
    }

    public function show(Publisher $publisher)
    {
        return view("admin.publishers.show", compact('publisher'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:publishers',
        ]);
        $request['slug'] = (new Slug(new Publisher(), '-'))->createSlug($request->name);
        Publisher::create($request->all());
        return redirect(\Config::get("admin") . "/publishers/create");
    }

    public function edit(Publisher $publisher)
    {
        return view("admin.publishers.edit", compact('publisher'));
    }

    public function update(Request $request, Publisher $publisher)
    {
        $request->validate([
            'name' => 'required|unique:publishers',
        ]);
        $request['slug'] = (new Slug($publisher, '-'))->createSlug($request->name);
        $publisher->update($request->all());
        return redirect(\Config::get("admin") . "/publishers/$publisher->slug/edit");
    }

    public function deleteAll(Request $request)
    {
        foreach(Publisher::whereIn('id', explode(",", $request->post("ids")))->get() as $publisher)
            $publisher->delete();
        return response()->json(['success'=>"Publishers Deleted successfully."]);
    }

    public function destroy(Publisher $publisher)
    {
        $publisher->delete();
        return redirect(\Config::get('admin') . "/publishers");
    }
}
