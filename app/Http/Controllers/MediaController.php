<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Media;
use App\Http\Resources\Medias;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medias = Media::all();

        return new Medias($medias);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'fileToUpload' => 'required|file|max:1024',
        ]);
     
        $fileName = "fileName".time().'.'.$request->fileToUpload->getClientOriginalExtension();

        $path = $request->fileToUpload->storeAs('public/logos',$fileName);

        $media = Media::create([
            'name' => $fileName,
            'type' => $request->fileToUpload->getClientOriginalExtension(),
            'size' => Storage::size($path),
            'url'  => Storage::url($path),
            'user_id' => $request->user()->id
        ]);

        return new Medias($media);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $media = Media::find($id);

        return new Medias($media);
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
        //
        $media = Media::where('id', $id)
                      ->update($request->all());
        return new Medias(Media::find($media));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $media = Media::find($id);
        $media->delete();

        return new Medias($media);
    }
}
