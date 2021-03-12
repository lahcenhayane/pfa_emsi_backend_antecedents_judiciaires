<?php

namespace App\Http\Controllers;

use App\Http\Requests\CriminalRequest;
use App\Models\Victime;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class VictimeController extends Controller
{
    protected $user;

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
        return Victime::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $victime =new Victime();
        $victime->cin = $request->cin;
        $victime->nom = $request->nom;
        $victime->addresse = $request->addresse;
        $victime->prenom = $request->prenom;
        $victime->dateNaissance = $request->dateNaissance;
        $victime->ville = $request->ville;
        $victime->tel = $request->tel;
        $victime->sexe = $request->sexe;
        $victime->save();

        return $victime;


        /*
        if ($criminal->hasFile('photo')) {
            $destination_path = 'public/image/criminals';
            $image = $request->file('photo');
            $image_name = $image->getClientOriginalName();
            $name = $request->cin+"."+$image_name +"."+$request->cin;
            $path = $request->file('image')->storeAs($destination_path, $name);
            $criminal->photo = $name;
        }
        */
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function find($id)
    {
        return Victime::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

    }
    public function modifier(Request $request)
    {
        $victime = Victime::Find($request->id);
        if ($victime->cin != $request->cin){
            $victime->cin = $request->cin;
        }
        $victime->nom = $request->nom;
        $victime->addresse = $request->addresse;
        $victime->prenom = $request->prenom;
        $victime->dateNaissance = $request->dateNaissance;
        $victime->ville = $request->ville;
        $victime->tel = $request->tel;
        $victime->sexe = $request->sexe;
        $victime->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $victime = Victime::find($id);
        $victime->delete();
    }
}
