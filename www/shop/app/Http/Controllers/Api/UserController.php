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

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updateUser(Request $request)
    {
        $this->validate($request, [
            'id'        => 'required',
            'email'     => 'required|email',
            'password'  => 'required',
            'firstname' => 'required',
            'lastname'  => 'required',
        ]);

        DB::table('users')->where('id', $request->get('id'))->update([
            'email'     => $request->get('email'),
            'password'  => Hash::make($request->get('password')),
            'firstname' => $request->get('firstname'),
            'lastname'  => $request->get('lastname'),
        ]);

        return response()->json(['status' => 200]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function createUser(Request $request)
    {
        $this->validate($request, [
            'email'     => 'required|email|unique:users',
            'password'  => 'required',
            'firstname' => 'required',
            'lastname'  => 'required',
        ]);

        DB::table('users')->insert([
            'email'     => $request->get('email'),
            'password'  => Hash::make($request->get('password')),
            'firstname' => $request->get('firstname'),
            'lastname'  => $request->get('lastname'),
        ]);

        return response()->json(['status' => 200]);
    }
}
