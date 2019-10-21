<?php
include("adheader.php");
include("dbconnection.php");

session_start();
if(!isset($_SESSION[adminid]))
{
    echo "<script>window.location='adminlogin.php';</script>";
}
if(!isset($_SESSION[adminid]))
{
    echo "<script>window.location='adminlogin.php';</script>";
}

?>


<div class="container-fluid">
    <div class="block-header">
        <h2>Dashboard</h2>
        <small class="text-muted">Bienvenu dans la panel Admin</small>
    </div>







    <div class="row clearfix">
        <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="info-box-4 hover-zoom-effect">
                <div class="icon"> <i class="zmdi zmdi-account col-red"></i> </div>
                <div class="content">
                    <div class="text">Totale Patient</div>
                    <div class="number">
                        <?php
                        $sql = "SELECT * FROM patient WHERE status='Active'";
                        $qsql = mysqli_query($con,$sql);
                        echo mysqli_num_rows($qsql);
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="info-box-4 hover-zoom-effect">
                <div class="icon"> <i class="zmdi zmdi-account col-green"></i> </div>
                <div class="content">
                    <div class="text">Total Docteurs </div>
                    <div class="number">
                        <?php
                        $sql = "SELECT * FROM doctor WHERE status='Active' ";
                        $qsql = mysqli_query($con,$sql);
                        echo mysqli_num_rows($qsql);
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="info-box-4 hover-zoom-effect">
                <div class="icon"> <i class="zmdi zmdi-bug col-blush"></i> </div>
                <div class="content">
                    <div class="text">Admin executant</div>
                    <div class="number">
                        <?php
                        $sql = "SELECT * FROM admin WHERE status='Active'";
                        $qsql = mysqli_query($con,$sql);
                        echo mysqli_num_rows($qsql);
                        ?>
                    </div>
                </div>
            </div>
        </div>
        
    </div>


   

    <div class="clear"></div>
</div>
</div>
<?php
include("adfooter.php");
?>
