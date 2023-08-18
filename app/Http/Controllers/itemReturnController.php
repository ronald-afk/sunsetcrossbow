<?php

namespace App\Http\Controllers;

use App\Exports\returnExport;
use App\Models\itemreturn;
use App\Models\items;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

use function Ramsey\Uuid\v1;

class itemReturnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = itemreturn::paginate(5);
        $item = itemreturn::all();
        return view('admin.view_hadeer.itemReturn',compact('data','item'));
    }

    public function selectSearch(Request $request)
    {
    	$item = [];
        if($request->has('q')){
            $search = $request->q;
            $item =items::select("id", "name")
            		->where('name', 'LIKE', "%$search%")
            		->get();
        }
        return response()->json($item);
    }

    public function exportReturn() 
    {
        return Excel::download(new returnExport, 'item_return.xlsx');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        ];

        $this->validate($request,[
            'item_id' => 'required',
            'qtt' => 'required|numeric',
            'alasan' => 'required|min:5',
        ],$message);

        itemreturn::create([
            'item_id' => $request->item_id,
            'qtt' => $request->qtt,
            'alasan' => $request->alasan
        ]);

        return redirect('/itemReturn');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $item = itemreturn::find($id);
      return view('admin.view_hadeer.itemReturn',compact('item'));
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
            'max' => ':attribute maksimal :max karakter',
            'numeric' => ':attribute harus berupa angka',
            'mimes' => 'file yang didukung yaitu jpg,jpeg,giv,svg,cr2',
            'size' => 'file yang diupload maksimal :size',
        ];

        $this->validate($request,[
            'qtt' => 'required|numeric',
            'alasan' => 'required|min:5'
        ],$message);

        $data = itemreturn::find($id);
        $data->qtt = $request->qtt;
        $data->alasan = $request->alasan;
        $data->update();
        return redirect('/itemReturn');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = itemreturn::find($id)->delete();
        return redirect()->back();
    }
}
