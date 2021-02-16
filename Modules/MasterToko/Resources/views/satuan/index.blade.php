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
    <a href={{ route('mastertoko.create_satuan') }} class="btn btn-success">Tambah Data</a>
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
            <th>Nama Satuan</th>
            <th>Action</th>
        </tr>
    </thead>
     <tbody>
                            @foreach($satuan as $p)
                            <tr>
                                <td>{{ $p->nama_satuan }}</td>
                                <td>
                                    <a href="{{url('master_toko/satuan_update',['id'=>$p->satuan_id])}}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
<!--                                    <a href="{{url('master_toko/satuan_delete', $p->satuan_id)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                   -->
                                   
                                    <form action="/master_toko/delete_satuan/{{ $p->satuan_id }}" method="post" class='d-inline'>
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                                    </form>

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

