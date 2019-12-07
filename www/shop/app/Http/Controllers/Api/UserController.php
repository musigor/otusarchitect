<?php

namespace App\Http\Controllers\Api;

use Laravel\Lumen\Routing\Controller as Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(Request $request)
    {
        $this->validate($request, [
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $user = DB::selectOne("SELECT * FROM users WHERE email = ?", [$request->get('email')]);

        if ($user) {
            if (Hash::check($request->get('password'), $user->password)) {
                $request->session()->put('user_id', $user->id);
                return response()->json(['status' => 'success']);
            }
        }

        return response()->json(['error' => 'please check your credentials'], 401);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        $request->session()->flush();

        return response()->json(['status' => 200]);
    }
}
