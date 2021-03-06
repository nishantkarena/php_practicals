<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
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
            $data = Category::onlyTrashed()->paginate(5);
        }else{
            $data = Category::latest()->paginate(5);
        }
        return view('admin.categorylist',compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category_add');
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
            'name' => 'required|min:4|max:14|string',
        ],[
                'name.required' => 'Name is required',
        ]);
        $user = new Category;
        $user->cname = $request->name;
        $user->active = $request->active;
        $user->save();
        return redirect('category')
                        ->with('success','Category created successfully.');
    }

    public function restore($id)
    {
        $data = Category::onlyTrashed()->find($id)->restore();
        return redirect()->route('category.index')
                        ->with('success','Category Restored successfully');
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
        $data = Category::find($id);
        return view('admin.category_edit',compact('data'));
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
            'name' => 'required|min:4|max:14|string',
        ],[
                'name.required' => 'Name is required',
        ]);
        $user= Category::find($id);
        $user->cname=$request->name;
        $user->active = $request->active;
        $user->update();
        return redirect('category')
                        ->with('success','Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::find($id)->delete();
        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
        // return redirect()->route('category.index')
        //         ->with('success','Admin deleted successfully');
    }

    public function fdelete($id){
        Category::onlyTrashed()->find($id)->forceDelete();
        return redirect()->route('category.index')
                ->with('success','Category deleted successfully');
    }
}
