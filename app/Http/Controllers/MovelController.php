<?php

namespace App\Http\Controllers;

use App\Models\Movel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MovelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
         

         if($request->hasFile('image') && $request->file('image')->isValid()){

            $requestImage = $request->image;

            $extencao = $requestImage->extension();

            $imageName = md5($requestImage.strtotime("now"));

            $requestImage->move(public_path('img/teste'), $imageName);
                
                Movel::create([
                    'tipo' => $request->tipo,
                    'descricao' => $request->descricao,
                    'foto' => $imageName,
                    'user_id'=>Auth::user()->id,
                ]);
            // var_dump($request->tipo,$request->descricao,$imageName);
            }
        return redirect('dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Movel  $movel
     * @return \Illuminate\Http\Response
     */
    public function show(Movel $movel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Movel  $movel
     * @return \Illuminate\Http\Response
     */
    public function edit(Movel $movel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Movel  $movel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movel $movel)
    {
        
        $movel->update([
            'tipo' => $request->tipo,
            'descricao' => $request->descricao, 
        ]);
         return redirect('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Movel  $movel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movel $movel)
    {
         $movel->delete();
        
        return redirect('dashboard');
    }
}
