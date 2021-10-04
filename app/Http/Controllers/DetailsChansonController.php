<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\DetailsChanson;
use App\Models\Source;
use Illuminate\Http\Request;

class DetailsChansonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        $ids = DetailsChanson::all('id');
        $detailsChansons =  DetailsChanson::with(['source','categorie'])->findMany($ids);
        return response([
            'details_chansons' => $detailsChansons
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $detailsChanson = DetailsChanson::create($request->only(['titre','artiste','numero']));

        $source = Source::find($request->source_id);
        $categorie = Categorie::find($request->categorie_id);

        $source->details_chansons()->save($detailsChanson);
        $detailsChanson->source()->associate($source);

       
        $categorie->details_chansons()->save($detailsChanson);
        $detailsChanson->categorie()->save($categorie);

        return response([
            'details_chanson' => $detailsChanson
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DetailsChanson  $detailsChanson
     * @return \Illuminate\Http\Response
     */
    public function show(DetailsChanson $detailsChanson)
    {
        $detailsChanson->find(['nb_vu' => $detailsChanson->nb_vu + 1]);
        $detailsChanson->source;
        $detailsChanson->categorie;
        return response([
            'detailsChanson' => $detailsChanson
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DetailsChanson  $detailsChanson
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DetailsChanson $detailsChanson)
    {
        $detailsChanson->updateOrFail($request->all());
        return response([
            'details_chanson_modifier' => $detailsChanson,
            'message' => 'Modification avec succès',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DetailsChanson  $detailsChanson
     * @return \Illuminate\Http\Response
     */
    public function destroy(DetailsChanson $detailsChanson)
    {
        $detailsChanson->delete();

        return response([
            'message' => 'suppression avec succès',
            'details_chanson_supprimer' => $detailsChanson
        ]);
    }
}
