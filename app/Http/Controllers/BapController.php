<?php

namespace App\Http\Controllers;

use App\Models\BapModel;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class BapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $baps = BapModel::all();
        return view('baps.index')->with(compact('baps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('baps.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required', 'type' => 'required', 'descriptif' => 'required', 'context' => 'required', 'objectif' => 'required']);

        $bap = new BapModel;
        $bap->user_id       = Auth::user()->id;
        $bap->username      = Auth::user()->name;
        $bap->id            = $request->id;
        $bap->validate      = 0;
        $bap->name          = $request->name;
        $bap->type          = $request->type;
        $bap->typeother     = $request->typeother;
        $bap->descriptif    = $request->descriptif;
        $bap->context       = $request->context;
        $bap->objectif      = $request->objectif;
        $bap->contrainte    = $request->contrainte;
        $bap->save();
        return redirect()->route('bap.index')->with('success', 'Votre Bap a bien été soumis.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bap = BapModel::findOrFail($id);

        return view('baps.show', compact('bap'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bap = BapModel::findOrFail($id);
        return view('baps.edit', compact('bap'));
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
        $this->validate($request, ['name' => 'required', 'type' => 'required', 'descriptif' => 'required', 'context' => 'required', 'objectif' => 'required']);

        $bap = BapModel::find($id);
        $bap->validate      = $request->validate;
        $bap->name          = $request->name;
        $bap->username      = Auth::user()->name;
        $bap->type          = $request->type;
        $bap->typeother     = $request->typeother;
        $bap->descriptif    = $request->descriptif;
        $bap->context       = $request->context;
        $bap->objectif      = $request->objectif;
        $bap->contrainte    = $request->contrainte;
        $bap->descriptif     = $request->descriptif;
//        $bap->user_id = $request->user_id;
        $bap->save();
        return redirect()->route('bap.show', $bap->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bap = BapModel::findOrFail($id);
        $bap->delete();
        return redirect()->route('bap.index', $id)->with('success', 'Votre bap a bien été supprimé.');
    }
}
