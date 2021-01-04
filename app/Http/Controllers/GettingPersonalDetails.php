<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use Illuminate\Support\Facades\Hash;
use Carbon;
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

        public function activateAccount(Request $request){

            return  $request->uuid;
            $uuidGenerated = $request->uuid;
            $clients = Client::where('uuidGenerated',$uuidGenerated)->get();
    
            $person = null;
            foreach ($clients as $client) {
                # code...
                $person = $client->ClientbelongsToUser;
            }
    
            // ! saving the hashed password. 
            $person->password = Hash::make($request->newPassword);
            $person->account_activated = true;
            $person->account_activated_at = Carbon::now;
            $person->save();
    
            // ! logging in to the application. 
    
            $credentials = request([$person->email, $request->newPassword]);
    
            if (! $token = auth()->attempt($credentials)) {
                return response()->json(['error' => 'Unauthorized'], 401);
            }
    
            return $this->respondWithToken($token);
    
        }
}
