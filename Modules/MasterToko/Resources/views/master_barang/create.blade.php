@extends('admin.adminlte')

@section('content')
<section class="content">
     <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3>{{$datap['action']}}</h3>
          </div>
          
        </div>
          <hr/>
      </div><!-- /.container-fluid -->
    </section>
    
    <div class="container-fluid">
    <div class="card card-primary ">
              <div class="card-header">
                <h3 class="card-title">Form Barang</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              {{ Form::open(array('url' => $datap['route'], 'files' => true, 'enctype'=>'multipart/form-data'))}}
              
                <div class="card-body">
                  <div class="form-group">
                    {{ Form::hidden("id_barang",(isset($data->id_barang) && $data->id_barang !='')?$data->id_barang:'')}}
                    {{Form::label('nama_barang', 'Nama Barang')}}
                    {{ Form::text("nama_barang",(isset($data->nama_barang) && $data->nama_barang !='')?$data->nama_barang:'',["placeholder"=>"Nama Barang","class"=>"input form-control"])}}
                  </div>
                  <div class="form-group">
                    {{Form::label('kategori_barang', 'Kategori Barang')}}
                    {{Form::select('kategori_barang',$datap['kategori'], isset($data->id_kategori)? $data->id_kategori:''  ,["class"=>"input form-control"])}}
                  </div>
                    <div class="form-group">
                    {{Form::label('stok', 'Stok Barang')}}
                    {{ Form::text("stok",(isset($data->stok) && $data->stok !='')?$data->stok:'',["placeholder"=>"Stok Barang","class"=>"input form-control col-md-2"])}}
                  </div>
                    <div class="form-group ">
                    {{Form::label('satuan', 'Satuan Barang')}}
                    {{Form::select('satuan', $datap['satuan'], isset($data->satuan_id)? $data->satuan_id:'',["class"=>"input form-control col-sm-1", ])}}
                   </div>
                    <div class="form-group">
                    {{Form::label('harga_modal', 'Harga Modal')}}
                    {{ Form::text("harga_modal",(isset($data->harga_modal) && $data->harga_modal !='')?$data->harga_modal:'',["placeholder"=>"Harga Modal","class"=>"input form-control"])}}
                  </div>
                    <div class="form-group">
                    {{Form::label('harga_jual', 'Harga Jual')}}
                    {{ Form::text("harga_jual",(isset($data->harga_jual) && $data->harga_jual !='')?$data->harga_jual:'',["placeholder"=>"Harga Jual","class"=>"input form-control"])}}
                  </div>
                   
                  <div class="form-group">
                    {{Form::label('upload_gambar', 'Upload Gambar')}}
                    <div class="ml-2 col-sm-6">
                        <div id="msg"></div>
                        
                          <input type="file" name="file" class="file" accept="image/*">
                          <div class="input-group my-3">
                            <input type="text" class="form-control" disabled placeholder="Upload File" id="file">
                            <div class="input-group-append">
                              <button type="button" class="browse btn btn-primary">Browse...</button>
                            </div>
                          </div>
                        
                      </div>
                      <div class="ml-2 col-sm-6 imgs">
                        <img src= {{ (isset($data->gambar) && $data->gambar !=='') ? asset($data->path.$data->gambar) : "https://placehold.it/80x80"}} id="preview" class="img-thumbnail">
                      </div>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  {!! Form::submit($datap['action'],['class'=>'btn btn-success'])!!}
                </div>
             {{ Form::close() }}
            </div>
</div>
</section>&nbsp;
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
       <script>
$(function () {
  bsCustomFileInput.init();
});
$(document).on("click", ".browse", function() {
  var file = $(this).parents().find(".file");
  file.trigger("click");
});
$('input[type="file"]').change(function(e) {
  var fileName = e.target.files[0].name;
  $("#file").val(fileName);

  var reader = new FileReader();
  reader.onload = function(e) {
    // get loaded data and render thumbnail.
    document.getElementById("preview").src = e.target.result;
  };
  // read the image file as a data URL.
  reader.readAsDataURL(this.files[0]);
});
</script>
<style>
    .file {
  visibility: hidden;
  position: absolute;
}
.imgs{
    heigt:20px;
    width:200px;
}

</style>
@endsection