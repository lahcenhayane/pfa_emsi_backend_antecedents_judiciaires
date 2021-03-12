<?php

namespace App\Http\Controllers;

use App\Models\Criminal;
use App\Models\Fichier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
//        //return Criminal::with('fichiers')->get();
        return Fichier::with(['user'=>function($row){
            $row->select('users.id', 'users.ville');
        }])->get();

//        return Fichier::with("victimes")->get();
    }

    public function getAllInformation($id){
        return Fichier::with(['criminals','victimes'])->find($id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fichier = new Fichier();
        $fichier->numero = $request->numero;
        $fichier->lieu = $request->lieu;
        $fichier->descriptionFichier = $request->descriptionFichier;
        $fichier->typeCrime = $request->typeCrime;
        $fichier->user_id = $this->user->id;
        $fichier->save();


        $f =  Fichier::Where("numero", $request->numero)->first();
        $f->criminals()->syncWithoutDetaching($request->listCriminales);
        $f->victimes()->syncWithoutDetaching($request->listVictimes);
        return $f;
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function modifier(Request $request)
    {
        $fichier =  Fichier::Where("numero", $request->numero)->first();
        $fichier->descriptionFichier = $request->descriptionFichier;
        $fichier->typeCrime = $request->typeCrime;
        $fichier->lieu = $request->lieu;
        $fichier->user_id = $this->user->id;
        $fichier->save();
        $fichier->criminals()->syncWithoutDetaching($request->criminals);
        $fichier->victimes()->syncWithoutDetaching($request->victimes);
        return $fichier;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fichier = Fichier::find($id);
        $fichier->delete();
    }
}
