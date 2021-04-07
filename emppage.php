<?php

session_start();
include_once 'connection.php';

if ($_SESSION['User_role'] != 'admin') {
    header("location: login.php");
} else {

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php include 'header.php'; ?>
        <title>admin</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>

    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">
            <div>
                <?php

                include 'navbar.php';
                include 'sidebar.php';
                include 'emp_page.php';
                
                ?>
            </div>

        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ajaxy/1.6.1/scripts/jquery.ajaxy.min.js" integrity="sha512-bztGAvCE/3+a1Oh0gUro7BHukf6v7zpzrAb3ReWAVrt+bVNNphcl2tDTKCBr5zk7iEDmQ2Bv401fX3jeVXGIcA==" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ajaxy/1.6.1/scripts/jquery.ajaxy.js" integrity="sha512-4WpSQe8XU6Djt8IPJMGD9Xx9KuYsVCEeitZfMhPi8xdYlVA5hzRitm0Nt1g2AZFS136s29Nq4E4NVvouVAVrBw==" crossorigin="anonymous"></script>
        <!-- jQuery -->
        <script src="plugins/jquery/jquery.min.js"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
            $.widget.bridge('uibutton', $.ui.button)
        </script>
        <!-- Bootstrap 4 -->
        <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- ChartJS -->
        <script src="plugins/chart.js/Chart.min.js"></script>
        <!-- Sparkline -->
        <script src="plugins/sparklines/sparkline.js"></script>
        <!-- JQVMap -->
        <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
        <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
        <!-- jQuery Knob Chart -->
        <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
        <!-- daterangepicker -->
        <script src="plugins/moment/moment.min.js"></script>
        <script src="plugins/daterangepicker/daterangepicker.js"></script>
        <!-- Tempusdominus Bootstrap 4 -->
        <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
        <!-- Summernote -->
        <script src="plugins/summernote/summernote-bs4.min.js"></script>
        <!-- overlayScrollbars -->
        <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
        <!-- AdminLTE App -->
        <script src="dist/js/adminlte.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="dist/js/demo.js"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="dist/js/pages/dashboard.js"></script>
    </body>

    <script>
    $(document).ready(function() {
        $('#insert-from').on('submit', function(e){
            e.preventDefault();
            
            $.ajax({
                url: 'insert.php',
                method:"post",
                data:$('#insert-from').serialize(),
                beforeSend:function(){
                    $('#insert').val('Insert..');
                },
                success: function(data){
                    console.log(data);
                    // $('#insert-from')[0].reset();
                    // $('#addModal').modal('hide');
                    // location.reload();
                }
            })
        })


        $('.view_data').click(function() {
            var uid=$(this).attr('id');
            console.log(uid);
            $.ajax({
                url:"https://knockdowncenter.000webhostapp.com/project/select.php",
                method:"post",
                data:{id:uid},
                success: function(data){
                    $('#detail').html(data);
                    $('#dataModal').modal('show');
                    
                }
            })
            
        })
        $('.delete_data').click(function(){
            var uid = $(this).attr('id');
            console.log(uid);
            $.ajax({
                url:"https://knockdowncenter.000webhostapp.com/project/delete.php",
                method:"post",
                data:{id:uid},
                success: function(data){
                location.reload();
                    
                }
            })
        })
        $('.edit_data').click(function(){
            var uid = $(this).attr('id');
            console.log(uid);
            $.ajax({
                url:"https://knockdowncenter.000webhostapp.com/project/fetch.php",
                method:"post",
                data:{id:uid},
                dataType:"json",
                success: function(data){
                    $('#id_check').val(data.id_check);
                    $('#id_emp').val(data.id_emp);
                    $('#username').val(data.username);
                    $('#password').val(data.password);
                    $('#role').val(data.role);
                    $('#position').val(data.position);
                    $('#perfix').val(data.perfix);
                    $('#nname').val(data.nname);
                    $('#fname').val(data.fname);
                    $('#lname').val(data.lname);
                    $('#tel').val(data.tel);
                    $('#b_date').val(data.b_date);
                    $('#hose').val(data.hose);
                    $('#supdistrict').val(data.supdistrict);
                    $('#district').val(data.district);
                    $('#province').val(data.province);
                    $('#PostalCode').val(data.PostalCode);
                    $('#updateModal').modal('show');

                }
            })
        })
    });

</script>


<script language="JavaScript">
	function chkNumber(ele)
	{
	var vchar = String.fromCharCode(event.keyCode);
	if (vchar<'0' || vchar>'9') return false;
	ele.onKeyPress=vchar;
	}
</script>

    </html>

<?php } ?>



