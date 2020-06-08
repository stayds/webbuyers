<?php

namespace App\Http\Controllers\Mobile;

use App\Models\Discount;
use App\Models\Discountorder;
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
        $list = Product::where('status',1)->get();
        return response()->json($list, 200);
    }

    public function getOrderDetail($id){
        $detail = Product::find($id);
        return response()->json($detail, 200);
    }

    public function getDiscount(Request $request){
        $user = $this->authUser();
        $code = $request->code;
        $discheck = Discount::where(['code'=> $code, 'status'=> 1])->first();

        if($discheck){

            $disorder = Discountorder::where(['userid'=> $user->userid,'discountid'=>$discheck->id])
                ->where('used','>=',$discheck->use)
                ->first();

            if($disorder){
                return response()->json('Discount Code has already been used by you', 203);
            }
            $data['discountid'] = $discheck->id;
            $data['percent'] = $discheck->percent;

            return response()->json($data,200);

        }

        return response()->json('Discount Code Does not exist', 401);
    }

    private function authUser(){
        return auth()->user();
    }

}
