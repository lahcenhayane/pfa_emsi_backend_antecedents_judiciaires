<?php

namespace App\Http\Controllers;

use App\Http\Requests\CriminalRequest;
use App\Models\Criminal;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class CriminalController extends Controller
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
        return Criminal::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CriminalRequest $request)
    {  
        
        $criminal =new Criminal();
        $criminal->cin = $request->cin;
        $criminal->nom = $request->nom;
        $criminal->prenom = $request->prenom;
        $criminal->dateNaissance = $request->dateNaissance;
        $criminal->ville = $request->ville;
        $criminal->tel = $request->tel;
        $criminal->user_id = $this->user->id;
        $criminal->photo = $request->photo;
        $criminal->save();

        return $criminal;
        

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
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
