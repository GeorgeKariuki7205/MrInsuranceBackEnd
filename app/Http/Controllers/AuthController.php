<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Carbon;
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

    // ! this controller is used to update the password of a user. 

    protected function updatePassword(Request $request){

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