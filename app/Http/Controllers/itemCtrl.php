<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\items;
use Illuminate\Http\Request;


class itemCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Items::all();
        $category = Category::all();

        return view('admin.view_hadeer.mainItem',compact('data','category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('admin.view_hadeer.mainItem',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = [
            'required' => ':attribute harus diisi dulu',
            'min' => ':attribute minimal :min karakter',
            'max' => ':attribute maksimal :max karakter',
            'numeric' => ':attribute harus berupa angka',
            'mimes' => 'file yang didukung yaitu jpg,jpeg,giv,svg,cr2',
            'size' => 'file yang diupload maksimal :size',

        ] ;

        $this->validate($request,[
        'category_id' => 'required|numeric',
        'name' => 'required',
        'stock' => 'required|numeric',
        'price' => 'required|numeric',

      ],$message);     

    //   //ambil informasi file yang diupload
    // $file = $request->file('foto');

    //   //rename + ambil nama file
    // $nama_file = time()."_".$file->getClientOriginalName();

    //   // proses upload
    // $tujuan_upload = './template/img';
    // $file->move($tujuan_upload,$nama_file);

      // proses insert database
      Items::create([
        'category_id' => $request->category_id,
        'name' => $request->name,
        'stock' => $request->stock,
        'price' => $request->price,
        // 'alamat' => $request->alamat,
        // 'about' => $request->about,
        // 'foto' => $nama_file
      ]);
        return redirect('/masteritem');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       return view('admin.view_hadeer.mainItem');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::all();
        $item = Items::find($id);
        return view('admin.view_hadeer.edititem',compact('item','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $message = [
            'required' => ':attribute harus diisi dulu',
            'min' => ':attribute minimal :min karakter',
            'max' => ':attibute maksimal :max karakter',
            'numeric' => ':attribute harus berupa angka',
          
        ] ;

        $this->validate($request,[
            'name' => 'required|min:3',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'category_id' => 'required|numeric',
    

      ],$message);

      $item = items::find($id);
      $item->category_id = $request->category_id;
      $item->name = $request->name;
      $item->stock = $request->stock;
      $item->price = $request->price;
      $item->update();
      return redirect('/masteritem');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $data = items::find($id)->delete();
       return redirect('/masteritem')->with('succes','Data has been delete');

    }

    // public function createItem($id){
    //     $category = Category::find($id);
    //     return view('admin.view_hadeer.mainItem',compact('category'));
    // }
    public function reset(){
        items::whereNotNull('id')->delete();
        return back();
    }

}
