<?php

namespace App\Http\Controllers;

use App\Models\Carts;
use App\Models\items;
use App\Models\transaction;
use App\Models\transaction_detail;
use Illuminate\Http\Request;


class transactionCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       $item = items::doesntHave('cart')->where('stock', '>' , 0)->get()->sortBy('name');
       $carts = items::has('cart')->get()->sortByDesc('cart.created_at');
    //    $carts = items::paginate(7) ;
       return view('admin.view_hadeer.mastertransaction',compact('item','carts'));
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
    Carts::create($request->all());
       return redirect()->back()->with('status','Item added to cart');
       $message = [
        'required' => ':attribute harus diisi dulu',
        'min' => ':attribute minimal :min karakter',
        'max' => ':attribute maksimal :max karakter',
        'numeric' => ':attribute harus berupa angka'

    ] ;

    $this->validate($request,[
    'total' => 'required|numeric',
    'pay_total' => 'required|numeric',

  ],$message);   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detail = transaction::find($id);
        return view('admin.view_hadeer.showTransaction',compact('detail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        Carts::findorFail($id)->update($request->all());
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       Carts::findorFail($id)->delete();
       return redirect()->back();
    }

    public function laporan(){
        return view('admin.view_hadeer.historytransaction');
    }

    public function history($time1,$time2,$user)
    {
        $history = transaction::whereBetween('waktu' , [date('d-M-Y', strtotime($time1)), $time2])->get();
        return view('admin.view_hadeer.showtransac',compact('history','time1','time2','user'));
    }


    public function checkout(request $request){
        $data = $request->all();
        $data['waktu'] = now();
        $transaction = transaction::create($data);
        foreach(Carts::all() as $item){
            transaction_detail::create([
                'transaction_id' => $transaction->id,
                'item_id'        => $item->item_id,
                'qtt'            => $item->qtt,
                'subtotal'       => $item->item->price * $item->qtt
            ]);
        }
        Carts::truncate();
        return redirect(route('mastertransaction.show',$transaction->id));
    }

    
    public function reset(){
        Carts::whereNotNull('id')->delete();
        return back();
    }

}
