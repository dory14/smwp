@extends('admin.adminlte')

@section('content')
<section class="content">
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3>Data Barang</h3>
          </div>
          
        </div>
          <hr/>
      </div><!-- /.container-fluid -->
    </section>
<div class="container-fluid">
    <div class='rata-kanan'>
    <a href={{ route('mastertoko.create') }} class="btn btn-success">Tambah Data</a>
    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
    </div>
    <br>
    <table id="example1" class="table table-bordered table-striped" cellspacing="0"
    width="100%" role="grid" style="width: 100%;">
    <thead>
        <tr>
            <th>Nama Barang</th>
            <th>Gambar</th>
            <th>Kategori</th>
            <th>Stok</th>
            <th>Satuan</th>
            <th>Harga Modal</th>
            <th>Harga jual</th>
            <th>Action</th>
        </tr>
    </thead>
     <tbody>
                            @foreach($barang as $p)
                            <tr>
                                <td>{{ $p->nama_barang }}</td>
                                <td>
                                    <a href={{asset($p->path.$p->gambar)}}>
                                        <img src={{asset($p->path.$p->gambar)}}  class="img-size-50 img-circle mr-3">
                                    </a>
                                </td>
                                <td>{{ $p->nama_kategori }}</td>
                                <td>{{ $p->stok }}</td>
                                <td>{{ $p->nama_satuan }}</td>
                                <td>{{ $p->harga_modal }}</td>
                                <td>{{ $p->harga_jual }}</td>

                                <td>
                                    <a href="{{url('master_toko/update',$p->id_barang)}}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                    <a href="{{url('master_toko/delete', $p->id_barang)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
</table>
</div>
</section>


@endsection


@section('js')
       <script type="text/javascript">
      $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    
    </script>
@endsection

