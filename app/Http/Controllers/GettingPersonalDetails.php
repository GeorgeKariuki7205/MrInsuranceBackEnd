<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
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

        return response()->json(['personalData' => $request->uuid], 200);

    }
}
