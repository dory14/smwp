<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>System Managemant Warung</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href={{asset("assets/plugins/fontawesome-free/css/all.min.css")}}>
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href={{asset("assets/dist/css/adminlte.min.css")}}>
   <link rel="stylesheet" href={{asset("assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css")}}>
  <link rel="stylesheet" href={{asset("assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css")}}>
  <link rel="stylesheet" href={{asset("assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css")}}>

</head>
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->
<body class="hold-transition sidebar-mini">
<div class="wrapper">
 @include('admin.header')
  <!-- /.navbar -->
@include('admin.sidebar')
  <!-- Main Sidebar Container -->
  

  <!-- Content Wrapper. Contains page content -->
  
  <main class="py-4">
      <div class="content-wrapper">
            @yield('content')
      </div>

  </main>
 
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
   
    <div class="float-right d-none d-sm-inline-block">
       <strong>Copyright &copy; Dory Achmad</strong>
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src={{asset("assets/plugins/jquery/jquery.min.js")}}></script>
<!-- Bootstrap -->
<script src={{asset("assets/plugins/bootstrap/js/bootstrap.bundle.min.js")}}></script>
<!-- AdminLTE -->
<script src={{asset("assets/dist/js/adminlte.js")}}></script>

<!-- OPTIONAL SCRIPTS -->
<script src={{asset("assets/plugins/chart.js/Chart.min.js")}}></script>
<!-- AdminLTE for demo purposes -->
<script src={{asset("assets/dist/js/demo.js")}}></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src={{asset("assets/dist/js/pages/dashboard3.js")}}></script>


<!-- DataTables  & Plugins -->
<script src={{asset("assets/plugins/datatables/jquery.dataTables.min.js")}}></script>
<script src={{asset("assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js")}}></script>
<script src={{asset("assets/plugins/datatables-responsive/js/dataTables.responsive.min.js")}}></script>
<script src={{asset("assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js")}}></script>
<script src={{asset("assets/plugins/datatables-buttons/js/dataTables.buttons.min.js")}}></script>
<script src={{asset("assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js")}}></script>
<script src={{asset("assets/plugins/jszip/jszip.min.js")}}></script>
<script src={{asset("assets/plugins/pdfmake/pdfmake.min.js")}}></script>
<script src={{asset("assets/plugins/pdfmake/vfs_fonts.js")}}></script>
<script src={{asset("assets/plugins/datatables-buttons/js/buttons.html5.min.js")}}></script>
<script src={{asset("assets/plugins/datatables-buttons/js/buttons.print.min.js")}}></script>
<script src={{asset("assets/plugins/datatables-buttons/js/buttons.colVis.min.js")}}></script>
<script src={{asset("assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js")}}></script>
 @yield('js')
</body>
</html>
