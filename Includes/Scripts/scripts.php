<?php
/**
 * Created by PhpStorm.
 * User: remco
 * Date: 9/1/2017
 * Time: 3:12 PM
 */
?>

<!-- Bootstrap core JavaScript -->
<script src="../../Includes/Lib/bootstrap/jquery/jquery.min.js"></script>
<script src="../../Includes/Lib/bootstrap/popper/popper.min.js"></script>
<script src="../../Includes/Lib/bootstrap/js/bootstrap.min.js"></script>

<!-- Plugin JavaScript -->
<script src="../../Includes/Lib/bootstrap/jquery-easing/jquery.easing.min.js"></script>
<!--<script src="../../Includes/Lib/bootstrap/chart.js/Chart.min.js"></script>-->
<script src="../../Includes/Lib/bootstrap/datatables/jquery.dataTables.js"></script>
<script src="../../Includes/Lib/bootstrap/datatables/dataTables.bootstrap4.js"></script>


<!-- Custom scripts for this template -->
<!--<script src="../../Includes/Lib/bootstrap/js/sb-admin.min.js"></script>-->

<script src="../../Includes/Js/default.js"></script>

<script>
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove();
        });
    }, 4000);
</script>

