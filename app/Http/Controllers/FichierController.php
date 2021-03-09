<?php

namespace App\Http\Controllers;

use App\Models\Criminal;
use App\Models\Fichier;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class FichierController extends Controller
{
    private $user;
    public function __construct()
    {
        $this->user = JWTAuth::parseToken()->authenticate();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Criminal::with('fichiers')->find('saqwei0923u-rdjkpowkj-d0923umx0r2e');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        $fichier = new Fichier();
//        $fichier->titre = $request->titre;
//        $fichier->descriptionFichier = $request->descriptionFichier;
//        $fichier->typeCrime = $request->typeCrime;
//        $fichier->user_id = $this->user->id;
//        $fichier->save();
//        $fichier->criminals()->syncWithoutDetaching($request->criminals);
//        return "OK";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return null;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return "Put";
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
        return "Put 1";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return "delete";
    }
}
