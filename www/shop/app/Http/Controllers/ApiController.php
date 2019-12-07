<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

/**
 * Class ApiController
 * @package App\Http\Controllers
 */
class ApiController extends Controller
{
    /**
     * @param Request $request
     * @param null $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function products(Request $request, $id = null)
    {
        $products = DB::select("SELECT * FROM products");

        return response()->json($products);
    }

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
