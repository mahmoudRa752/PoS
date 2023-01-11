</div>
<!-- /.content-wrapper -->

</div>
<!-- ./wrapper -->
<script>
$('.delete').click(function(e){
    var that = $(this)
    e.preventDeault();

    var n =new Noty(){
        text = "Confirm Delete",
        type = "warning",
        killer = true,
        buttons :[
            Noty.button('Yes','btn btn-success mr-2',function(){
                that.closest('form').submit();
            }),
            Noty.button('No','btn btn-primary mr-2',function(){
                n.close();
            })
        ]
    }
});
</script>
<!-- jQuery -->
<script src="{{asset('dashboard/js/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('dashboard/js/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('dashboard/js/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('dashboard/js/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('dashboard/js/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('dashboard/js/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('dashboard/js/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('dashboard/js/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('dashboard/js/moment/moment.min.js')}}"></script>
<script src="{{asset('dashboard/js/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('dashboard/js/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('dashboard/js/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('dashboard/js/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dashboard/js/adminlte.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dashboard/js/demo.js')}}"></script>

<!-- custom js file -->
<script src="{{asset('dashboard/js/custom/image-preview.js')}}"></script>
<script src="{{asset('dashboard/js/custom/order.js')}}"></script>

</body>
</html>
