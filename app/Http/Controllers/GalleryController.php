<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gallery;
use App\Http\Resources\Galleries;

class Gallery extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries = Gallery::all();
        return new Galleries($galleries);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $gallery = Gallery::create([
            'name' => $request->name,
            'user_id' => $request->user()->id
        ]);

        $gallery->medias()->sync($request->medias);

        return new Galleries($gallery);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $gallery = Gallery::find($id);
        return new Galleries($gallery);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $gallery = Gallery::where('id', $id)->update([
            'name' => $request->name,
            'user_id' => $request->user()->id
        ]);

        $gallery->medias()->sync($request->medias);

        return new Galleries(Gallery::find($gallery));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gallery = Gallery::where('id', $id)->delete();

        return new Galleries($gallery);
    }
}
