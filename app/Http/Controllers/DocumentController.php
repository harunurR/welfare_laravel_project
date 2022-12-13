<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $document= Document::paginate(10);
        return view('document.index', compact('document'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('document.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cat = new Document;
        $cat->date =$request->date;
        $cat->name =$request->name;
        if($request->has('image')){
            $imageName= rand(111,999).time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/document'), $imageName);
            $cat->image=$imageName;
        }
        $cat->remark = $request->remark;
        $cat->save();
        
        return redirect()->route('document.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function show(Document $document)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $document= Document::findOrFail($id);
        return view('document.edit',compact('document'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $document=Document::find($id);
        $document->date = $request->date;
        $document->name = $request->name;
        if($request->has('image')){
            $imageName= rand(111,999).time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/document'), $imageName);
            $document->image=$imageName;
        }
        $document->remark = $request->remark;
        $document->save();
        return redirect()->route('document.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
        //
    }
}
