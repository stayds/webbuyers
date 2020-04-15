<?php

namespace App\Http\Controllers\Mobile;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{

    /**
     * @OA\Get(
     *     path="/product/list",
     *     tags={"product"},
     *     summary="Entire list of enabled products",
     *     operationId="getProductList",
     *      @OA\Response(
     *         response=200,
     *          description="successful operation",
     *          @OA\JsonContent(
     *              @OA\AdditionalProperties(
     *                  type="integer",
     *                  format="int32"
     *              )
     *          )
     *     ),
     *
     *    security={
     *       {"api_key": {}}
     *     }
     * )
     */


    public function index(){
        $list = Product::all();
        return response()->json($list, 200);
    }

    public function getOrderDetail($id){
        $detail = Product::find($id);
        return response()->json($detail, 200);
    }

}
