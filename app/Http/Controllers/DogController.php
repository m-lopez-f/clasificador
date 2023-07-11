<?php

namespace App\Http\Controllers;

use App\Dog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class DogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Dog::get();
    }

    /**
     * Display a oneresource.
     *
     * @return \Illuminate\Http\Response
     */
    public function one(Request $request, $dogID)
    {

        $dog = Dog::where('id', $dogID)->first();
        $path = storage_path($dog->path_photo);
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = Storage::get($dog->path_photo);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
        $dog->path_photo = $base64;
        return $dog;
    }


    public function filter(REquest $request)
    {
        $inputs = $request->all();
        $filters = [];
        foreach ($inputs as $key => $input) {
            if ($input) {
               $filters[] = [$key, 'like', '%'.$input.'%'];
            }
        }
        return Dog::where($filters)->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->input('name');
        $race = $request->input('race');
        $size = $request->input('size');
        $color = $request->input('color');
        $identifier = $request->input('identifier');
        $owner = $request->input('owner');

        $extension = $request->photo->extension();
        $path = $request->photo->storeAs('images', md5($name).'.'.$extension, 'public');

        $dog = new Dog;
        $dog->name = $name;
        $dog->race = $race;
        $dog->size = $size;
        $dog->color = $color;
        $dog->identifier = $identifier;
        $dog->owner = $owner;
        $dog->path_photo = $path;
        $dog->save();

        return ['id' => $dog->id];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dog  $dog
     * @return \Illuminate\Http\Response
     */
    public function show(Dog $dog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dog  $dog
     * @return \Illuminate\Http\Response
     */
    public function edit(Dog $dog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dog  $dog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dog $dog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dog  $dog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dog $dog)
    {
        //
    }
}
