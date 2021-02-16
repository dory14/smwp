<?php

namespace Modules\MasterToko\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DataTables;
use Input;
use Redirect;
use DB;
use File;
use Modules\MasterToko\Entities\MasterToko;

class MasterTokoController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
      public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
//        return view('mastertoko::index');
//        $barang = MasterToko::all();
        $barang = DB::table('barang')
            ->leftJoin('satuan_barang', 'barang.satuan_id', '=', 'satuan_barang.satuan_id')            
            ->leftJoin('kategori_barang', 'barang.id_kategori', '=', 'kategori_barang.id_kategori')
            ->get();

//           dd($barang);
    	return view('mastertoko::index', ['barang' => $barang]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $data = '';
        $kategori = DB::table('kategori_barang')->get()->pluck('nama_kategori','id_kategori');        
        $satuan = DB::table('satuan_barang')->get()->pluck('nama_satuan','satuan_id');  
        
       
//        die(var_dump($kategori));
        $datap =[
            'route'=>'/master_toko/simpan',
            'kategori'=>$kategori,
            'satuan'=>$satuan,
            'action'=>'Tambah Data',
        ];
//        return View::make('crete_data')->with('data',$datap);
        return view('mastertoko::master_barang.create', compact('datap', 'data'));
    }
    
    function simpan(Request $request){
        
//        $this->validate($request, [
//            'nama' => 'required|string',
//            'alamat' => 'required|string',
//            'kelas' => 'required|string',
//           
//        ]);
        
        $file = $request->file('file');
 
      	// nama file
	$gambar = $file->getClientOriginalName();
 
      	// ekstensi file
	$type = $file->getClientOriginalExtension();
 
//      	// real path
//	echo 'File Real Path: '.$file->getRealPath();
//	echo '<br>';
 
      	// ukuran file
//	echo 'File Size: '.$file->getSize();
//	echo '<br>';
 
      	// tipe mim
//        die();
//      	// isi dengan nama folder tempat kemana file diupload
	$tujuan_upload = "data_file/img/";
	$file->move($tujuan_upload,$file->getClientOriginalName());
//        
       
       $data = [
           'nama_barang'=> $request->input('nama_barang'),           
           'id_kategori'=> $request->input('kategori_barang'),
           'stok'=> $request->input('stok'),
           'satuan_id'=> $request->input('satuan'),
           'harga_modal'=> $request->input('harga_modal'),
           'harga_jual'=> $request->input('harga_jual'),
           'gambar'=> $gambar,
           'type_gambar'=> $type,
           'path'=> $tujuan_upload,
           'created_by'=> Auth()->user()->id,
           'created_at'=> date('Y-m-d H:i:s'),
       ];
//        die(var_dump($data));
       //query bulder laravel
       DB::table('barang')->insert($data);
       return redirect::to('/master_toko')->with('message','berhasil di tambahkan');
       
    }
    
    function delete($id){      
       //query bulder laravel
       $gambar = DB::table('barang')->where('id_barang','=',$id)->first();
        File::delete($gambar->path.$gambar->gambar);
       
        DB::table('barang')->where('id_barang','=',$id)->delete();
       return redirect::to('/master_toko')->with('message','berhasil di hapus');
       
    }
    
    function update($id){
        $data = DB::table('barang')->where('id_barang','=',$id)->first();
//        die(var_dump($data));
        $kategori = DB::table('kategori_barang')->get()->pluck('nama_kategori','id_kategori');        
        $satuan = DB::table('satuan_barang')->get()->pluck('nama_satuan','satuan_id');  
        
       
//        die(var_dump($kategori));
        $datap =[
            'kategori'=>$kategori,
            'satuan'=>$satuan,
            'route'=>'/master_toko/edit_barang',
            'action'=>'Update Data',
        ];
      
       return view('mastertoko::master_barang.create', compact('datap', 'data'));
       
    }
    
     function edit_barang(Request $request){
//        die(var_dump($request));
//        $this->validate($request, [
//            'nama' => 'required|string',
//            'alamat' => 'required|string',
//            'kelas' => 'required|string',
//           
//        ]);
        
        $file = $request->file('file');
        
        if(! is_null($file)){
        $gambar = DB::table('barang')->where('id_barang','=',$request->input('id_barang'))->first();
//        die(dump($file));
        File::delete($gambar->path.$gambar->gambar);
        
      	// nama file
	$gambar = $file->getClientOriginalName();
 
      	// ekstensi file
	$type = $file->getClientOriginalExtension();

//      	// isi dengan nama folder tempat kemana file diupload
	$tujuan_upload = "data_file/img/";
	$file->move($tujuan_upload,$file->getClientOriginalName());
//        
       
       $data = [
           'nama_barang'=> $request->input('nama_barang'),           
           'id_kategori'=> $request->input('kategori_barang'),
           'stok'=> $request->input('stok'),
           'satuan_id'=> $request->input('satuan'),
           'harga_modal'=> $request->input('harga_modal'),
           'harga_jual'=> $request->input('harga_jual'),
           'gambar'=> $gambar,
           'type_gambar'=> $type,
           'path'=> $tujuan_upload,
            'updated_by'=> Auth()->user()->id,
           'updated_at'=> date('Y-m-d H:i:s'),
       ];
//        die(var_dump($data));
       //query bulder laravel
       }else{
           $data = [
           'nama_barang'=> $request->input('nama_barang'),           
           'id_kategori'=> $request->input('kategori_barang'),
           'stok'=> $request->input('stok'),
           'satuan_id'=> $request->input('satuan'),
           'harga_modal'=> $request->input('harga_modal'),
           'harga_jual'=> $request->input('harga_jual'),
            'updated_by'=> Auth()->user()->id,
           'updated_at'=> date('Y-m-d H:i:s'),
       ];
       }
       
       //query bulder laravel
       DB::table('barang')->where('id_barang','=',$request->input('id_barang'))->update($data);
       return redirect::to('/master_toko')->with('message','berhasil di update');
       
    }
    
    
    public function kategori()
    {
        $data = DB::table('kategori_barang')->get();
    	return view('mastertoko::kategori.index', ['kategori' => $data]);
    }
    
    public function create_kategori()
    {
        $data = '';
//        die(var_dump($data));
        $datap =[
            'route'=>'/master_toko/simpan_kategori',
            'action'=>'Tambah Data',
        ];
//        return View::make('crete_data')->with('data',$datap);
        return view('mastertoko::kategori.create', compact('datap', 'data'));
    }
    
      function simpan_kategori(Request $request){
        
        $this->validate($request, [
            'nama_kategori' => 'required|string',
        ]);
          
       $data = [
           'nama_kategori'=> $request->input('nama_kategori'),           
           'created_by'=> Auth()->user()->id,
           'created_at'=> date('Y-m-d H:i:s'),
       ];
//        die(var_dump($data));
       //query bulder laravel
       DB::table('kategori_barang')->insert($data);
       return redirect::to('/master_toko/kategori')->with('message','berhasil di tambahkan');
       
    }
    
    function delete_kategori($id){      
       //query bulder laravel
      
        DB::table('kategori_barang')->where('id_kategori','=',$id)->delete();
       return redirect::to('/master_toko/kategori')->with('message','berhasil di hapus');
       
    }
    
    public function edit_kategori(Request $request)
    {
//        die(var_dump($request));
       $this->validate($request, [
        'nama_kategori' => 'required|string',
        ]);
       
       
       $data = [
           'nama_kategori'=> $request->input('nama_kategori'),
           'updated_by'=> Auth()->user()->id,
           'updated_at'=> date('Y-m-d H:i:s'),
       ];
       
       //query bulder laravel
       DB::table('kategori_barang')->where('id_kategori','=',$request->input('id_kategori'))->update($data);
       return redirect::to('/master_toko/kategori')->with('message','berhasil di update');
       
    }
    
    function update_kategori($id){
       
       $data = DB::table('kategori_barang')->where('id_kategori','=',$id)->first();
//        die(var_dump($data));
        $datap =[
            'route'=>'/master_toko/edit_kategori',
            'action'=>'Update Data',
        ];
       return view('mastertoko::kategori.create', compact('datap', 'data'));
       
    }
    
     public function satuan()
    {
        $data = DB::table('satuan_barang')->get();
    	return view('mastertoko::satuan.index', ['satuan' => $data]);
    }
    
    public function create_satuan()
    {
        $data = '';
//        die(var_dump($data));
        $datap =[
            'route'=>'/master_toko/simpan_satuan',
            'action'=>'Tambah Data',
        ];
//        return View::make('crete_data')->with('data',$datap);
        return view('mastertoko::satuan.create', compact('datap', 'data'));
    }
    
    function simpan_satuan(Request $request){
//         die(dump($request));
        $this->validate($request, [
            'nama_satuan' => 'required|string'
        ]); 
       $data = [
           'nama_satuan'=> $request->input('nama_satuan'),           
           'created_by'=> Auth()->user()->id,
           'created_at'=> date('Y-m-d H:i:s'),
       ];
//        die(var_dump($data));
       //query bulder laravel
       DB::table('satuan_barang')->insert($data);
       return redirect::to('/master_toko/satuan')->with('message','berhasil di tambahkan');
       
    }
    
     function delete_satuan(Request $request,$id){      
       //query bulder laravel
         
//         return $request['id'];
      
       DB::table('satuan_barang')->where('satuan_id','=',$request['id'])->delete();
       return redirect::to('/master_toko/satuan')->with('message','berhasil di hapus');
       
    }
    
    function satuan_update($id){
        $data = DB::table('satuan_barang')->where('satuan_id','=',$id)->first();
//        die(var_dump($data));
        $datap =[
            'route'=>'/master_toko/edit_satuan',
            'action'=>'Update Data',
        ];
       return view('mastertoko::satuan.create', compact('datap', 'data'));
       
    }
    
     public function edit_satuan(Request $request)
    {
//        die(var_dump($request));
       $this->validate($request, [
        'nama_satuan' => 'required|string',
        ]);
       
       
       $data = [
           'nama_satuan'=> $request->input('nama_satuan'),
           'updated_by'=> Auth()->user()->id,
           'updated_at'=> date('Y-m-d H:i:s'),
       ];
       
       //query bulder laravel
       DB::table('satuan_barang')->where('satuan_id','=',$request->input('satuan_id'))->update($data);
       return redirect::to('/master_toko/satuan')->with('message','berhasil di update');
       
    }
    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('mastertoko::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('mastertoko::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
//    public function update(Request $request, $id)
//    {
//        //
//    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
