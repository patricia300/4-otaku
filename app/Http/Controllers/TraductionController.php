<?php

namespace App\Http\Controllers;

use App\Models\Langue;
use App\Models\Traduction;
use Illuminate\Http\Request;

class TraductionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ids = Traduction::all('id');
        $traductions = Traduction::with(['langue','commentaires'])->findMany($ids);

        return response([
            'traductions' => $traductions
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
        $traduction = Traduction::create($request->only(['parole_traduit']));

        $langue = Langue::find($request->langue_id);

        if($langue)
        {
            $langue->traductions()->save($traduction);
            $traduction->langue()->save($langue);
        }

        return response([
            'traduction' => $traduction
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Traduction  $traduction
     * @return \Illuminate\Http\Response
     */
    public function show(Traduction $traduction)
    {
        $traduction->langue;
        $traduction->commentaires;

        return response([
            'traduction' => $traduction
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Traduction  $traduction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Traduction $traduction)
    {
        $traduction = $traduction->updateOrFail($request->all());

        return response([
            'traduction_modifer' => $traduction
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Traduction  $traduction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Traduction $traduction)
    {
        $traduction->delete();

        return response([
            'traduction_supprimer' => $traduction
        ]);
    }
}
