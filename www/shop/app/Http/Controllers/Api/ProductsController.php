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

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updateProducts(Request $request)
    {
        $this->validate($request, [
            'id'          => 'required',
            'sku'         => 'required',
            'name'        => 'required',
            'description' => 'required',
        ]);

        DB::table('products')->where('id', $request->get('id'))->update([
            'sku'         => $request->get('sku'),
            'name'        => $request->get('name'),
            'description' => $request->get('description'),
        ]);

        return response()->json(['status' => 200]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function createProducts(Request $request)
    {
        $this->validate($request, [
            'sku'         => 'required|unique:products',
            'name'        => 'required',
            'description' => 'required',
        ]);

        DB::table('products')->insert([
            'sku'         => $request->get('sku'),
            'name'        => $request->get('name'),
            'description' => $request->get('description'),
        ]);

        return response()->json(['status' => 200]);
    }
}
