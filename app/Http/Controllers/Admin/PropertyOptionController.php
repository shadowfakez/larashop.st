<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\PropertyOption;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PropertyOptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Property $property
     * @return Application|Factory|View
     */
    public function index(Property $property)
    {
        $propertyOptions = PropertyOption::where('property_id', $property->id)->paginate(10);
        return view('admin.property-options.index', compact('property', 'propertyOptions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Property $property
     * @return Application|Factory|View
     */
    public function create(Property $property)
    {
        return view('admin.property-options.create', compact('property'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param Property $property
     * @return RedirectResponse
     */
    public function store(Request $request, Property $property)
    {
        $params = $request->all();
        $params['property_id'] = $property->id;
        PropertyOption::create($params);
        return redirect()->route('admin.property-options.index', compact('property'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PropertyOption  $propertyOption
     * @return \Illuminate\Http\Response
     */
    public function show(PropertyOption $propertyOption)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Property $property
     * @param PropertyOption $propertyOption
     * @return Application|Factory|View
     */
    public function edit(Property $property, PropertyOption $propertyOption)
    {
        return view('admin.property-options.edit', compact('property', 'propertyOption'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PropertyOption  $propertyOption
     * @return RedirectResponse
     */
    public function update(Request $request, Property $property, PropertyOption $propertyOption)
    {
        $params = $request->all();
        $params['property_id'] = $property->id;
        $propertyOption->update($params);
        return redirect()->route('admin.property-options.index', compact('property', 'propertyOption'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PropertyOption  $propertyOption
     * @return RedirectResponse
     */
    public function destroy(Property $property, PropertyOption $propertyOption)
    {
        $propertyOption->delete();
        return redirect()->route('admin.property-options.index', compact('property'));
    }
}
