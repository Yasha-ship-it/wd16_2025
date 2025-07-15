<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('news.index', ['news' => News::paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('news.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'title' => 'required',
            'desc' => 'max:255',
            'description' => 'max:2550',
        ]);
        News::create($validateData);
        return redirect()->route('news.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $new = News::where('id', $id)->first();
        return view('news.show', ['new' => $new]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $new = News::where('id', $id)->first();
        return view('news.edit', ['new' => $new]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validateData = $request->validate([
            'title' => 'required',
            'desc' => 'max:255',
            'description' => 'max:2550',
        ]);
        $new = News::findOrFail($id);
        $new->update($validateData);
        return redirect()->route('news.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $new = News::findOrFail($id);
        $new->delete();
        return redirect()->route('news.index');
    }

    public function indexApi(){
        return response()->json([
            News::paginate(10)
        ]);
    }
}
