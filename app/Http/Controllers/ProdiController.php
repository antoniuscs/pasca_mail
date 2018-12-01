<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Prodi;

class ProdiController extends Controller
{
    public function index (Request $req){
        $prodis = Prodi::orderBy('id','ASC')->get();
        return view ('prodi.index',compact('prodis'));  
    }

    public function create(){
        return view ('prodi.create',compact('prodis'));
    }

    public function store(Request $request)
    {
        Prodi::create($request->all());
        return redirect()->route('prodi.index');
    }

    public function edit($id){
        $prodis = Prodi::find($id);
        return view('prodi.edit', compact('prodis'));
    }

    public function update(Request $request, $id)
    {
        Prodi::find($id)->update($request->all());
        return redirect()->route('prodi.index');
    }

    public function updateStatus(Prodi $prodis)
    {
        $prodis->update([
            'status' => "0",
        ]);
        return redirect()->route('prodi.index');
    }

    public function destroy($id){
        Prodi::find($id)->delete();
        return redirect()->route('prodi.index');
    }
}
