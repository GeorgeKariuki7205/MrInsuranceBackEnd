<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
class GettingPersonalDetails extends Controller
{
    //
    public function getPersonalDetailsOfUser(Request $request){

        $uuidGenerated = $request->uuid;
        $clients = Client::where('uuidGenerated',$uuidGenerated)->get();

        $personalData = null;
        foreach ($clients as $client) {
            # code...
            $personalData = $client->ClientbelongsToUser->all();
        }

        return response()->json(['personalData' => $personalData], 200);

    }

        // ! this controller is used to update the password of a user. 


}
