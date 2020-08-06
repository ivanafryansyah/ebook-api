<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    public function me(){

        return nl2br("nis : 3103118076 \n
            name : Ivan Afryansyah \n
            gender : male \n
            phone : 085290091081 \n
            class : XII RPL 3");
        // [
        //     "nis" => "3103118076"  , 
        //     "name" => "Ivan Afryansyah" , 
        //     "gender" => "male" ,
        //     "phone" => "085290091081" , 
        //     "class" => "XII RPL 3"
        // ];
    
    }
}
