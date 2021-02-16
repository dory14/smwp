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
                <h3 class="card-title">Form Satuan Barang</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              {{ Form::open(array('url' => $datap['route']))}}
                @csrf
                @method('put');
                <div class="card-body">
                  <div class="form-group">
                    {{Form::label('nama_satuan', 'Satuan')}}
                    {{ Form::hidden("satuan_id",(isset($data->satuan_id) && $data->satuan_id !='')?$data->satuan_id:'')}}
                    {{ Form::text("nama_satuan",(isset($data->nama_satuan) && $data->nama_satuan !='')?$data->nama_satuan:'',["placeholder"=>"Satuan Barang","class"=>"input form-control"])}}
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