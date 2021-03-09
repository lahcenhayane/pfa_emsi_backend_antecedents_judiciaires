<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationFormRequest;
use App\Models\Criminal;
use App\Models\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserController extends Controller
{
    /**
     * @var bool
     */
    public $loginAfterSignUp = true;

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request){
        $input = $request->only('email', 'password');
        $token = null;

        if (!$token = JWTAuth::attempt($input)) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid Email or Password',
            ], 401);
        }

        $user = User::where('email', $request->email)->first();
        return response()->json([
            'success' => true,
            'userToken' => $token,
            'userID' => $user->id,
            'userRole' => $user->role,
            'userName' => $user->name
        ], 200);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function logout(Request $request)
    {
        $this->validate($request, [
            'token' => 'required'
        ]);

        try {
            JWTAuth::invalidate($request->token);

            return response()->json([
                'success' => true,
                'message' => 'User logged out successfully'
            ]);
        } catch (JWTException $exception) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, the user cannot be logged out'
            ], 500);
        }
    }

    /**
     * @param RegistrationFormRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(RegistrationFormRequest $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->ville = $request->ville;
        $user->tel = $request->tel;
        $user->role = $request->role;
        $user->save();

        if ($this->loginAfterSignUp) {
            return $this->login($request);
        }

        return response()->json([
            'success'   =>  true,
            'data'      =>  $user
        ], 200);
    }

    public function index(){
        return User::all();
    }
    public function info(){
        return JWTAuth::parseToken()->authenticate();
    }
    public function destroy($id){
        $user = User::Find($id);
        $user->delete();
    }
    public function find($id){
        return User::find($id);
    }
    public function update(Request $request){
        $user = User::Find($request->id);
        $user->name = $request->name;
        if ($user->email != $request->email){
            $user->email = $request->email;
        }
        if ($request->password != null){
            $user->password = bcrypt($request->password);
        }
        $user->ville = $request->ville;
        $user->tel = $request->tel;
        $user->role = $request->role;
        $user->updated_at = new DateTime();
        $user->save();
    }

    public function countcriminal(){
        return Criminal::count();
        //return count($crim);
    }

}
