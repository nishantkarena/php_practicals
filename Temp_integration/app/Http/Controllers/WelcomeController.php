<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cat = Category::where('active','1')->get();
        $selectedid= $request->activedata;
        if(empty($selectedid)){
            $data = Product::join('categories', 'categories.id', '=', 'category_id')
                ->join('users', 'users.id', '=', 'createdbyuser')
                ->where('products.active','=','1')
                ->where('categories.active','=','1')
              ->get(['products.*', 'categories.cname','users.email']);
        }else{
            $data = Product::join('categories', 'categories.id', '=', 'category_id')
                ->join('users', 'users.id', '=', 'createdbyuser')
                ->where('products.active','=','1')
                ->where('categories.active','=','1')
                ->where('category_id','=',$selectedid)
              ->get(['products.*', 'categories.cname','users.email']);
        }         
    
        return view('index',compact('data','cat','selectedid'))
            ->with('i', (request()->input('page', 1) - 1) * 2);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }
}
