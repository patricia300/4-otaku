<?php

namespace App\Http\Controllers;

use App\Models\Langue;
use App\Models\ParoleOriginale;
use Illuminate\Http\Request;

class ParoleOriginaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ids = ParoleOriginale::all('id');
        $paroleOriginales = ParoleOriginale::with('langue','details_chanson')->findMany($ids);

        return response([
            'parole_originales' => $paroleOriginales
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
        $paroleOriginale = ParoleOriginale::create($request->only(['langue']));
        $langue = Langue::find($request->langue_id);
        if($langue)
        {
            $langue->parole_originales()->save($paroleOriginale);
            $paroleOriginale->langue()->save($langue);
        }

        return response([
            'parole_originale' => $paroleOriginale
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ParoleOriginale  $paroleOriginale
     * @return \Illuminate\Http\Response
     */
    public function show(ParoleOriginale $paroleOriginale)
    {
        $paroleOriginale->details_chanson;
        $paroleOriginale->langue;

        return response([
            'parole_originale' => $paroleOriginale
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ParoleOriginale  $paroleOriginale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ParoleOriginale $paroleOriginale)
    {
        $paroleOriginale = $paroleOriginale->updateOrFail($request->all());

        return response([
            'parole_originale_modifier' => $paroleOriginale
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ParoleOriginale  $paroleOriginale
     * @return \Illuminate\Http\Response
     */
    public function destroy(ParoleOriginale $paroleOriginale)
    {
        $paroleOriginale->delete();

        return response([
            'parole_originale_supprimer' => $paroleOriginale
        ]);
    }
}
