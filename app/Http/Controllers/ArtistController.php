<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artist;
use Illuminate\Database\Eloquent\Model;
use App\Models\Type;
use Illuminate\Support\Facades\DB;

class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 
        $artists = Artist::all(); // ou Db::select('select * from artists'); Db::table('artists')->get();
        return view('artist.index', [
            'artists' => $artists,
            'resource' => 'artistes'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $types = Type::all();

        return view('artist.create', [
            'types' => $types
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param \Illuminate\Http\Request $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validation des données du formulaire

        $validated = $request->validate([
            'firstname' => 'required|max:60',
            'lastname' => 'required|max:60',
        ]);

        $artist = new Artist();

        $artist->firstname = $validated['firstname'];
        $artist->lastname = $validated['lastname'];

        $artist->save();

        if ($request->has('types')) {
            $artist->types()->attach($request->types); //attach permet d'ajouter des types à un artiste
        }

        return redirect()->route('artist.index');
    }

    /**
     * Display the specified resource.
     * 
     * @param string $id
     * 
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        // 
        $artist = Artist::find($id);

        return view('artist.show', [
            'artist' => $artist
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     * 
     * @param string $id
     * 
     * @return \Illuminate\Http\Response
     */
    public function edit(string $id)
    {
        //

        $artist = Artist::find($id);
        $types = Type::all();

        return view('artist.edit', [
            'artist' => $artist,
            'types' => $types
        ]);
    }

    /**
     * Update the specified resource in storage.
     * 
     * @param \Illuminate\Http\Request $request
     * 
     * @param string $id
     * 
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, string $id)
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        // validation des données du formulaire
        $validated = $request->validate([
            'firstname' => 'required|max:60',
            'lastname' => 'required|max:60',
            'types' => 'array'
        ]);

        //le formulaire est validé, on récupère l'artiste à modifier
        $artist = Artist::find($id);

        //on met à jour les champs de l'artiste
        $artist->firstname = $validated['firstname'];
        $artist->lastname = $validated['lastname'];

        //on met à jour les types de l'artiste
        $artist->types()->sync($validated['types']);

        DB::statement('SET FOREIGN_KEY_CHECKS=1');
        return redirect()->route('artist.show', ['id' => $artist->id]); // ou return view('artist.show', ['artist' => $artist]);
    }

    /**
     * Remove the specified resource from storage.
     * 
     * @param string $id
     * 
     * @return \Illuminate\Http\Response
     */
    public function delete(string $id)
    {
        // abaisser la contrainte de clé étrangère

        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        $artist = Artist::find($id);


        if ($artist) {
            $artist->delete();
        }
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
        return redirect()->route('artist.index');
    }

    public function showBySlug(string $slug)
    {
        $artist = Artist::where('slug', $slug)->first();
        return view('artists.show', [
            'artist' => $artist
        ]);
    }
}
