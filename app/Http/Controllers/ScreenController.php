<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\Screen as Screens;
use App\Screen;

class ScreenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $screens = Screen::all();
        return Screens::collection($screens);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $screen = Screen::create([
            'name' => $request->name,
            'resoulution' => $request->resoulution,
            'location' => $request->location,
            'gallery_id' => $request->gallery_id,
            'user_id' => $request->user()->id
        ]);

        return new Screens($screen);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Screen $screen)
    {
        //$screen = Screen::find($id);
        return new Screens($screen);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Screen $screen)
    {
        //$screen = Screen::find($id);
        $screen->update([
            'name' => $request->name,
            'resoulution' => $request->resoulution,
            'location' => $request->location,
            'gallery_id' => $request->gallery_id,
            'user_id' => $request->user()->id
        ]);

        return new Screens($screen);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Screen $screen)
    {
        //$screen = Screen::find($id);
        $screen->delete();
        return new Screens($screen);
    }
}
