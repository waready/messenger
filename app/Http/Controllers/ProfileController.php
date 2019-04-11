<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function edit(){
        return view('profile');
    }
    public function update(Request $request){
        //dd($request->all());
         $user = auth()->user();
         $user -> name = $request->name;
         if ($request->passwaord)
            $user -> password = bcrypt($request->password);

        $file = $request->image;
         if ($file){

         }  
         $user->image = $fileName;
         $user->save(); 

        // return 'peticion post';
    }
}
