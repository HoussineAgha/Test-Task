<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * @param Request $request
     * @return User
     */
    public function register(Request $request)
    {
        try {
            //validate
            $DataValidate = Validator::make($request->all(),[
                'name'=>'required',
                'email'=>'required|unique:users',
                'password'=>'required|min:5'
            ]);
            if($DataValidate->fails()){
                return response()->json([
                    'status'=>false,
                    'message'=>'Something went wrong, try again',
                    'error'=> $DataValidate->errors()
                ],401);
            }
            //user-Agent
            $detect = new \Detection\MobileDetect;
            $deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'computer');
            //store new user
            $newUser = new User();
            $newUser->name = $request->name;
            $newUser->email = $request->email;
            $newUser->role = 'user';
            $newUser->password = Hash::make($request->password);
            $newUser->email_verified_at = now();
            $newUser->deviceType = $deviceType;
            $newUser->save();

            return response()->json([
                'status'=>true,
                'message'=>'create user successfully',
                '_token'=> $newUser->createToken("Api Token")->plainTextToken
            ],200);

        } catch (\Throwable $th) {
            return response()->json([
                'status'=>false,
                'message'=>$th->getMessage(),
            ],500);
        }
    }

    /**
     * @param Request $request
     * @return User
     */
    public function login(Request $request)
    {
        try {
        //validate
            $DataValidate = Validator::make($request->all(),[
                'email'=>'required',
                'password'=>'required'
            ]);
            if($DataValidate->fails()){
                return response()->json([
                    'status'=>false,
                    'message'=>'Something went wrong, try again',
                    'error'=> $DataValidate->errors()
                ],401);
            }
            //progress login
            $user = User::where('email',$request->email)->first();
            if ($user && auth()->attempt(['email' => request()->email, 'password' => request()->password, 'status' => true])) {
                //user-Agent
                $detect = new \Detection\MobileDetect;
                $deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'computer');
                auth()->user()->update([
                    'deviceType' => $deviceType,
                ]);
                return response()->json([
                    'status'=>true,
                    'message'=>'login user successfully',
                    '_token'=> $user->createToken("Api Token")->plainTextToken
                ],200);
            }else{
                return response()->json([
                    'status'=>false,
                    'message'=>'The email or password is incorrect',
                ],401);
            }

        } catch (\Throwable $th) {
            return response()->json([
                'status'=>false,
                'message'=>$th->getMessage(),
            ],500);
        }
    }
}
