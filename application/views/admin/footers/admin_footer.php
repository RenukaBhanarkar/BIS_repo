
<!-- Footer -->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url();?>assets/admin/vendor/jquery/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/js/bootstrap-timepicker.min.js" integrity="sha512-2xXe2z/uA+2SyT/sTSt9Uq4jDKsT0lV4evd3eoE/oxKih8DSAsOF6LUb+ncafMJPAimWAXdu9W+yMXGrCVOzQA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
 <script src="<?php echo base_url();?>assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="<?php echo base_url();?>assets/admin/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url();?>assets/admin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url();?>assets/admin/js/sb-admin-2.min.js"></script>
    
    
    <!-- Page level plugins -->
    <!-- <script src="<?php echo base_url();?>assets/admin/vendor/chart.js/Chart.min.js"></script> -->

    <!-- Page level custom scripts -->
    <!-- <script src="<?php echo base_url();?>assets/admin/js/demo/chart-area-demo.js"></script>
    <script src="<?php echo base_url();?>assets/admin/js/demo/chart-pie-demo.js"></script> -->
    <script>
    $(document).ready(function () {
    $('#example').DataTable({
        // scrollX: true,
    });

    $(".timepicker").click(function(){
        $(".bootstrap-timepicker-widget .glyphicon-chevron-up").html("<i class='fa fa-chevron-up' aria-hidden='true'></i>");
    $(".bootstrap-timepicker-widget .glyphicon-chevron-down").html("<i class='fa fa-chevron-down' aria-hidden='true'></i>");
    });

});
   </script>
   <script>
var message = "This function is not allowed here";

function rtclickcheck(keyp) {
    if (navigator.appName == "Netscape" && keyp.which == 3) {
       alert(message);
        return false;
    }
    if (navigator.appVersion.indexOf("MSIE") != -1 && event.button == 2) {
       alert(message);
        return false;
    }
}
$(document).ready(function(e){
    $(".loader").fadeOut("fast");
});
</script>

    <!-- Scroll to Top Button-->
  

<!-- <script>
                        CKEDITOR.replace( 'editor1' );
                        CKEDITOR.replace( 'editor2' );
                        CKEDITOR.replace( 'editor3' );
                        CKEDITOR.replace( 'editor4' );
                        CKEDITOR.replace( 'editor5' );
                        CKEDITOR.replace( 'editor6' );
                        CKEDITOR.replace( 'editor7' );
                        CKEDITOR.replace( 'editor8' );
                </script> -->
</body>
</html>