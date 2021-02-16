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
                <h3 class="card-title">Form Kategori Barang</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              {{ Form::open(array('url' => $datap['route']))}}
              
                <div class="card-body">
                  <div class="form-group">
                    {{Form::label('nama_kstegori', 'Kategori')}}
                    {{ Form::hidden("id_kategori",(isset($data->id_kategori) && $data->id_kategori !='')?$data->id_kategori:'')}}
                    {{ Form::text("nama_kategori",(isset($data->nama_kategori) && $data->nama_kategori !='')?$data->nama_kategori:'',["placeholder"=>"Kategori Barang","class"=>"input form-control"])}}
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
</script>
@endsection