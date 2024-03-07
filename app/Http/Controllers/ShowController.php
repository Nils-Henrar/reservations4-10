<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Show;

class ShowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $shows = Show::all(); // ou Db::select('select * from shows'); Db::table('shows')->get();

        return view('show.index', [
            'shows' => $shows,
            'resource' => 'spectacles'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        return view('show.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //


        $show = Show::find($id); // ou Db::select('select * from shows where id = ?', [$id]); Db::table('shows')->where('id', $id)->first();

        //récupérer les artistes du spectavles et les grouper par type

        $collaborateurs = [];

        foreach ($show->artistTypes as $artistType) {
            $collaborateurs[$artistType->type->type][] = $artistType->artist; // on crée un tableau associatif avec le type d'artiste comme clé et un tableau d'artistes comme valeur.
        }

        return view('show.show', [
            'show' => $show,
            'collaborateurs' => $collaborateurs,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
