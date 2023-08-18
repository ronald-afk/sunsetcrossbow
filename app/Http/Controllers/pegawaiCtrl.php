<?php

namespace App\Http\Controllers;
use App\Models\pengguna;
use App\Models\roles;
use App\Models\User;
use File;
use Illuminate\Http\Request;

class pegawaiCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $item = User::all();
        return view('admin.view_hadeer.mainPegawai',compact('item'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $item = User::all(); 
       return view('admin.view_hadeer.createPegawai',compact('item'));
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
        'name' => 'required|min:4|max:30',
        'id_roles' => 'required|numeric',
        'jk' => 'required',
        'email' => 'required|',
        'alamat' => 'required|min:5',
        'password' => 'required|min:8',
        'foto' => 'mimes:jpg,jpeg,giv,svg,cr2,png'

      ],$message);     

      //ambil informasi file yang diupload
    $file = $request->file('foto');

      //rename + ambil nama file
    $nama_file = time()."_".$file->getClientOriginalName();

      // proses upload
    $tujuan_upload = './template/img';
    $file->move($tujuan_upload,$nama_file);

      // proses insert database
      User::create([
        'name' => $request->name,
        'id_roles' => $request->id_roles,
        'jk' => $request->jk,
        'email' => $request->email,
        'no_telp' => $request->no_telp,
        'alamat' => $request->alamat,
        'password' => bcrypt($request->password) ,
        'foto' => $nama_file,
      ]);
        return redirect('/masterpegawai');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $data = User::find($id);
      $item = User::all();
      return view('admin.view_hadeer.showPegawai',compact('data','item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $item = User::find($id);
       return view('admin.view_hadeer.editPegawai',compact('item'));
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
            'name' => 'required|min:4|max:30',
            'id_roles' => 'required|numeric',
            'email' => 'required',
            'password' => 'required|min:5', 
            'jk' => 'required',
            'alamat' => 'required|min:5',
            'foto' => 'mimes:jpg,jpeg,giv,svg,cr2,png'
        ],$message);

        
        if ($request->foto != ''){
            // dengan ganti foto
            // perintah hapus file foto yang lama
            $pegawai = User::find($id);
            file::delete('/template/img'.$pegawai->foto);
  
            //ambil informasi file yang diupload
           $file = $request->file('foto');
  
          //rename + ambil nama file
           $nama_file = time()."_".$file->getClientOriginalName();
  
          // proses upload
          $tujuan_upload = './template/img';
          $file->move($tujuan_upload,$nama_file);
          // menyimpan data
          $pegawai->name = $request->name;
          $pegawai->id_roles = $request->id_roles;
          $pegawai->jk = $request->jk;
          $pegawai->email = $request->email;
          $pegawai->alamat = $request->alamat;
          $pegawai->password = $request->password;
          $pegawai->foto  = $nama_file;
          $pegawai->update();
          return redirect('/masterpegawai');
          } else {
             // tanpa ganti foto
             $pegawai = User::find($id);
             $pegawai->name = $request->name;
             $pegawai->id_roles = $request->id_roles;
             $pegawai->jk = $request->jk;
             $pegawai->email = $request->email;
             $pegawai->alamat = $request->alamat;
             $pegawai->password = $request->password;
             $pegawai->save();
             return redirect('/masterpegawai');
          }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $data = User::find($id)->delete();
       return redirect()->back();
    }
}

