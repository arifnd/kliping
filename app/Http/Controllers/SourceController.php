<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostSourceRequest;
use App\Models\Source;
use App\Models\Type;
use Carbon\Carbon;

class SourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('sources.index', [
            'sources' => Source::get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sources.create', [
            'types' => Type::get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\PostSourceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostSourceRequest $request)
    {
        $source = new Source();
        $source->type_id = $request->type;
        $source->name = $request->name;
        $source->url = $request->url;
        $source->next_update = Carbon::Now();
        $source->active = $request->active;
        $source->save();

        return redirect()->route('sources.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Source  $source
     * @return \Illuminate\Http\Response
     */
    public function show(Source $source)
    {
        $source->type_id = $request->type;
        $source->name = $request->name;
        $source->url = $request->url;
        $source->next_update = $request->next_update;
        $source->active = $request->active;
        $source->save();

        return redirect()->route('sources.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Source  $source
     * @return \Illuminate\Http\Response
     */
    public function edit(Source $source)
    {
        return view('sources.edit', [
            'source' => $source,
            'types' => Type::get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\PostSourceRequest  $request
     * @param  \App\Models\Source  $source
     * @return \Illuminate\Http\Response
     */
    public function update(PostSourceRequest $request, Source $source)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Source  $source
     * @return \Illuminate\Http\Response
     */
    public function destroy(Source $source)
    {
        //
    }
}
