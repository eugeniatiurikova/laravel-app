<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Source;
use App\Queries\SourcesQueryBuilder;
use App\Http\Requests\Admin\Sources\Create;
use App\Http\Requests\Admin\Sources\Edit;

class SourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SourcesQueryBuilder $builder)
    {
        return view('admin.sources.index', ['sourcesList' => $builder->getSources()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.sources.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Create $request, SourcesQueryBuilder $builder)
    {
        $source = $builder->create($request->validated());
        if($source->save()) {
            return redirect()->route('admin.sources.index')
                ->with('success','Source successfully added');
        }
        return back()->with('error','Cannot add source');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SourcesQueryBuilder $builder,string $id)
    {
        return view('admin.sources.edit', ['source' => $builder->getSourceById($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Edit $request, Source $source, SourcesQueryBuilder $builder)
    {
        if($builder->update($source, $request->validated())) {
            return redirect()->route('admin.sources.index')
                ->with('success','Source successfully category');
        }
        return back()->with('error','Cannot update source');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
