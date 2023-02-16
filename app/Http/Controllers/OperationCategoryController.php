<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOperationCategoryRequest;
use App\Http\Requests\UpdateOperationCategoryRequest;
use App\Models\OperationCategory;

class OperationCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $operationCategories = OperationCategory::all();
        return view('operation-categories.index', compact('operationCategories'));
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
     */
    public function store(StoreOperationCategoryRequest $request)
    {
        $category = new OperationCategory();
        $category->fill($request->all());
        $category->save();

        return redirect()->route('operation-categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OperationCategory  $operationCategory
     * @return \Illuminate\Http\Response
     */
    public function show(OperationCategory $operationCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OperationCategory  $operationCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(OperationCategory $operationCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOperationCategoryRequest  $request
     * @param  \App\Models\OperationCategory  $operationCategory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOperationCategoryRequest $request, OperationCategory $operationCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OperationCategory $operationCategory)
    {
//        dd($operationCategory);
        $category = OperationCategory::find($operationCategory->id);
//        dd($category);
        $operationCategory->delete();

        return redirect()->route('operation-categories.index');
    }
}
