<?php

namespace App\Http\Controllers\Api;

use Laravel\Lumen\Routing\Controller as Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Class ProductsController
 * @package App\Http\Controllers
 */
class ProductsController extends Controller
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
}
