<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;


class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        if($request->has('trashed')){
            $data = Product::onlyTrashed()->join('categories', 'categories.id', '=', 'category_id')
                ->join('users', 'users.id', '=', 'createdbyuser')
                ->where('categories.active','=','1')
                ->get(['products.*', 'categories.cname','users.email']);
            
            return view('admin.productlist',compact('data'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
        }else{
            $cat = Category::where('active','1')->get();
            $selectedid= $request->activedata;
            if(empty($selectedid)){
            $data = Product::join('categories', 'categories.id', '=', 'category_id')
                ->join('users', 'users.id', '=', 'createdbyuser')
                ->where('categories.active','=','1')
                ->get(['products.*', 'categories.cname','users.email']);
            }else{
            $data = Product::join('categories', 'categories.id', '=', 'category_id')
                ->join('users', 'users.id', '=', 'createdbyuser')
                ->where('categories.active','=','1')
                ->where('category_id','=',$selectedid)
                ->get(['products.*', 'categories.cname','users.email']);
            }         
        }
        return view('admin.productlist',compact('data','cat','selectedid'))
              ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cat = Category::where('active','1')->get();
        return view('admin.product_add',compact('cat'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:4|max:20|string',
            'category_id' => 'required',
            'active'=>'required',
            'images'=>'required|image|mimes:jpg,png,jpeg|max:4096|',
        ],[
                'name.required' => 'Name is required',
                'images.required'=>'Please select File',
        ]);
        $user= auth()->user();
        $product = new Product;
        if($request->file('images')) {
            $imageName = time().'.'.$request->images->extension();
            $request->images->move(public_path('images'), $imageName);
            $product->name = $request->name;
            $product->category_id = $request->category_id;
            $product->active = $request->active;
            // $product=$request->all();
            $product['createdbyuser']=$user->id;
            $product['images'] = $imageName;
            $product->save();
            return redirect('product')
                        ->with('success','Product created successfully.');
        }else{
            echo "error";
        }
    }

    public function restore($id)
    {
        $data = Product::onlyTrashed()->find($id)->restore();
        return redirect()->route('product.index')
                        ->with('success','Product Restored successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request  $request)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Product::find($id);
        $cat = Category::where('active','1')->get();
        return view('admin.product_edit',compact('data','cat'));
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
        $request->validate([
            'name' => 'required|min:4|max:20|string',
            'category_id' => 'required',
            'active'=>'required',
            'images'=>'image|mimes:jpg,png,jpeg|max:4096|',
        ],[
                'name.required' => 'Name is required',
        ]);
        $product= Product::find($id);
        
        if(!empty($request->images)) {
            unlink(public_path('images/'.$product->images));
            $imageName = time().'.'.$request->images->extension();
            $request->images->move(public_path('images'), $imageName);
            $product->name = $request->name;
            $product->category_id = $request->category_id;
            $product->active = $request->active;
            // $product['createdbyuser']=$user->id;
            $product['images'] = $imageName;
            $product->update();
        }else{
            $product->name = $request->name;
            $product->category_id = $request->category_id;
            $product->active = $request->active;
            // $product['createdbyuser']=$user->id;
            $product->update();
        }
        return redirect('product')
                        ->with('success','Product Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user= Product::find($id)->delete();;
        // unlink(public_path('images/'.$user->images));
        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
        // return redirect('product')
        //                 ->with('success','Product deleted successfully');
    }
    public function fdelete($id)
    {
        $user= Product::onlyTrashed()->find($id);
        unlink(public_path('images/'.$user->images));
        $user->forceDelete();
      
        return redirect('product')
                        ->with('success','Product deleted successfully');
    }
    
}