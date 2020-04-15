<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Productcategory;
use Illuminate\Http\Request;

class ProductcategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware(['admin','backinvalidate']);
    }

    public function index()
    {
        $category = Productcategory::with(['products'=> function($query){
            $query->select('productid', 'prodcatid');
        }])->paginate(5);
        //dd($category);
        return view('admin.product.category', compact('category'));
    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {

        $rules = [
            'prodcatname' => 'required', 'string', 'max:100', 'unique:products',
            'description' => 'required', 'string', 'min:200',
            'status' => 'required'
        ];

        $validatedData = $request->validate($rules);

        $check = Productcategory::where('prodcatname', $request['productname'])->first();

        if($check){

            return redirect()->back()->withErrors('Product name already exist');
        }

        if($validatedData){
            $category = new Productcategory();
            $category->prodcatname = $validatedData['prodcatname'];
            $category->description = $validatedData['description'];
            $category->status = $validatedData['status'];

            $category->save();

            return $this->index()->withSuccess('Product category created');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $productcat = Productcategory::find($id);

        $productcat->status = ($productcat->status > 0) ? 0 : 1;

        $productcat->save();

        return redirect()->back()->withSuccess('Category status successfully changed');
    }
}
