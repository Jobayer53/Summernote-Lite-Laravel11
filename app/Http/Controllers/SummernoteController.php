<?php

namespace App\Http\Controllers;

use App\Models\Summernote;
use Illuminate\Http\Request;

class SummernoteController extends Controller
{
    function store(Request $request){
        $summernote = new Summernote();
        $summernote->data = $request->data;
        $summernote->save();
        return back();
    }

    function edit($id){
        $datas= Summernote::find($id);
        return view('edit',compact('datas'));

    }
    function update(Request $request){
        $summernote = Summernote::find($request->id);
        $summernote->data = $request->data;
        $summernote->save();
        return back();
    }
}
