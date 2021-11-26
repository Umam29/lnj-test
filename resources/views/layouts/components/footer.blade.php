<footer class="main-footer">
    <strong>Copyright &copy; 2021 UMAM.</strong>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{url('assets')}}/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{url('assets')}}/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{url('assets')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{url('assets')}}/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{url('assets')}}/dist/js/demo.js"></script>
<!-- SweetAlert2 -->
<script src="{{url('assets')}}/plugins/sweetalert2/sweetalert2.min.js"></script>

@if (session('status') == 1)
<script type="text/javascript">
    swal.fire({
        icon: 'success',
        title: "{{session('title')}}",
        text: "{{ session('message') }}",
    });
</script>

@elseif (session('status') == -1)

<script type="text/javascript">
    swal.fire({
        icon: 'error',
        title: "{{session('title')}}",
        text: "{{ session('message') }}",
    });
</script>
@endif

@yield('js')
