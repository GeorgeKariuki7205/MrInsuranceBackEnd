<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Client;
// use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */   

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        $credentials = request(['email', 'password']);

        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            // 'expires_in' => auth()->factory()->getTTL() * 60
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }
    public function activateAccount(Request $request){

        // return  $request->uuid;
        $uuidGenerated = $request->uuid;
        $clients = Client::where('uuidGenerated',$uuidGenerated)->get();

        $person = null;
        $purchases = null;
        foreach ($clients as $client) {
            # code...
            $person = $client->ClientbelongsToUser;
            $purchases = $client->ClienthasManyPurchase;
        }

        // ! saving the hashed password. 
        $person->password = Hash::make($request->newPassword);
        $person->account_activated = true;
        $person->account_activated_at =  Carbon::now();
        $person->save();

        // ! logging in to the application. 

        // $credentials = [$person->email, $request->newPassword];
        $credentials = array();
        $credentials['email'] = $person->email;
        $credentials['password'] =  $request->newPassword;

        if (! $token = Auth::attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $personalDetails = $person->all();
        // $purchasesMade =         
        return response()->json(['tokenDetails' => $this->respondWithToken($token),'personalDetails'=>$personalDetails,'purchases'=>$purchases], 200);

    }

}