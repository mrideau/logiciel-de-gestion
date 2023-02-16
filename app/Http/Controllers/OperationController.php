<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOperationRequest;
use App\Http\Requests\UpdateOperationRequest;
use App\Models\Operation;
use App\Models\OperationCategory;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Date;

class OperationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $filterYear = request('year');
        $filterMonth = request('month');

        $operations = Operation::query();

        if (isset($filterYear)) {
            $operations = $operations->whereYear('date', $filterYear);
        }

        if (isset($filterMonth)) {
            $operations = $operations->whereMonth('date', $filterMonth);
        }

        $operations = $operations->orderBy('date', 'ASC')->get();

        $total = $operations->reduce(function($carry, $item) {
            $carry += $item->value;
            return $carry;
        });

        $yearMin = Date::create(Operation::all()->min('date'))?->year;
        $yearMax = Date::create(Operation::all()->max('date'))?->year;

        $years = collect([$yearMin]);

        if ($yearMin && $yearMax && $yearMax != $yearMin) {
            for ($i = $yearMin + 1; $i <= $yearMax; $i ++) {
                $years->push($i);
            }
        }

        $format = request('format');

        if ($format == 'pdf') {
            $pdf = PDF::loadView('components.operations-table', compact('operations', 'total', 'years'))
                ->setPaper('a4', 'portrait');

            return $pdf->stream();
        }

        return view('operations.index', compact('operations', 'total', 'years'));
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
    public function store(StoreOperationRequest $request)
    {
        $category = OperationCategory::find($request->category_id);

        $operation = new Operation();

        $operation->fill($request->all());

        switch ($request->type) {
            case 'add':
                $operation->value = abs($request->value);
                break;

            case 'subtract':
                $operation->value = abs($request->value) * -1;
                break;
        }

        $operation->category()->associate($category);

        $operation->save();

        return redirect()->route('operations.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Operation  $operation
     * @return \Illuminate\Http\Response
     */
    public function show(Operation $operation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Operation $operation = null)
    {
        $operationCategories = OperationCategory::all();
        return view('operations.create-edit', compact('operation', 'operationCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOperationRequest $request, Operation $operation)
    {
        $operation->fill($request->all());

        if ($operation->category->id != $request->category_id) {
            $newCategory = OperationCategory::find($request->category_id);
            $operation->category()->dissociate();
            $operation->category()->associate($newCategory);
        }

        $operation->save();

        return redirect()->route('operations.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Operation $operation)
    {
        $operation->deleteOrFail();

        return redirect()->route('operations.index');
    }
}
