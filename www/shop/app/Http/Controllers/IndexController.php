<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\ProductsController;
use App\Http\Controllers\Api\UserController as UserController;
use Laravel\Lumen\Routing\Controller as Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;

/**
 * Class IndexController
 * @package App\Http\Controllers
 */
class IndexController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $products = DB::select("SELECT * FROM products");

        return view('index', ['products' => $products]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function admin(Request $request)
    {
        $userId = $request->session()->get('user_id', null);

        if ($userId === null) {
            return view('login', ['error' => 'Please login first']);
        }

        return view('admin');
    }

    /**
     * @param Request $request
     * @return \Illuminate\View\View
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(Request $request)
    {
        $userController = new UserController();

        try {
            $userController->login($request);
        } catch (\Exception $exception) {
            return view('login', ['error' => 'Please check your credentials!']);
        }

        $userId = $request->session()->get('user_id', null);

        if ($userId === null) {
            return view('login', ['error' => 'Please check your credentials!']);
        }

        return view('admin');
    }

    /**
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function logout(Request $request)
    {
        $userController = new UserController();
        $userController->logout($request);

        return redirect('admin');
    }

    /**
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function user(Request $request)
    {
        return view('createUser');
    }

    /**
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function userCreate(Request $request)
    {
        $userController = new UserController();

        try {
            $userController->createUser($request);
        } catch (\Illuminate\Validation\ValidationException $exception) {
            return view('createUser', ['error' => $exception->getMessage(), 'errors' => $exception->errors()]);
        }

        return view('createUser', ['success' => 'New user was created!']);
    }

    /**
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function product(Request $request)
    {
        return view('createProduct');
    }

    /**
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function productCreate(Request $request)
    {
        $userController = new ProductsController();

        try {
            $userController->createProducts($request);
        } catch (\Illuminate\Validation\ValidationException $exception) {
            return view('createProduct', ['error' => $exception->getMessage(), 'errors' => $exception->errors()]);
        }

        return view('createProduct', ['success' => 'New product was created!']);
    }
}