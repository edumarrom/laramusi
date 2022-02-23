<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAlbumRequest;
use App\Http\Requests\UpdateAlbumRequest;
use App\Models\Album;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albumes = Album::all();

        return view('albumes.index', [
            'albumes' => $albumes,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $album = new Album();

        return view('albumes.create', [
            'album' => $album,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAlbumRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAlbumRequest $request)
    {
        $validados = $request->validated();
        // return dd($validados);
        $album = new Album($validados);
        $album->save();

        $request->file('portada')->storeAs(
            'portadas',
            $album->id . '.jpg',
            'local',
        );
        $img = Image::make(storage_path('app/portadas/' . $album->id . '.jpg'));
        $img->resize(100, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        Storage::makeDirectory('public/portadas');
        $img->save(public_path('storage/portadas/' . $album->id . '.jpg'));
        Storage::disk('local')->delete('portadas/' . $album->id . '.jpg');
        return redirect()->route('albumes.index')->with('success', 'Album creado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function show(Album $album)
    {
        return view('albumes.show', [
            'album' => $album,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function edit(Album $album)
    {
        return view('albumes.edit', [
            'album' => $album,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAlbumRequest  $request
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAlbumRequest $request, Album $album)
    {
        $validados = $request->validated();
        $album->titulo = $validados['titulo'];
        $album->autor = $validados['autor'];
        $album->save();

        if ($request->file('portada')) {
            $request->file('portada')->storeAs(
                'portadas',
                $album->id . '.jpg',
                'local',
            );

        $img = Image::make()storage_path('app/portadas' . $album->id . '.jpg');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function destroy(Album $album)
    {
        //
    }

    public function descargar(Album $album)
    {
        $img = public_path('storage/portadas/' . $album->id . '.jpg');
        return response()->download($img);
    }
}
