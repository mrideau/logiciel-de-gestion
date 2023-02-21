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
     */
    public function create()
    {
        return $this->edit();
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
     * Show the form for editing the specified resource.
     */
    public function edit(OperationCategory $operationCategory = null)
    {
        return view('operation-categories.create-edit', compact('operationCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOperationCategoryRequest $request, OperationCategory $operationCategory)
    {
        $operationCategory->fill($request->all());
        $operationCategory->save();

        return redirect()->route('operation-categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OperationCategory $operationCategory)
    {
//        $category = OperationCategory::find($operationCategory->id);
        $operationCategory->delete();

        return redirect()->route('operation-categories.index');
    }
}
