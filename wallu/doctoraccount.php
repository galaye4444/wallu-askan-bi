
<?php

include("adheader.php");
include 'dbconnection.php';

if(!isset($_SESSION[doctorid]))
{
	echo "<script>window.location='doctorlogin.php';</script>";
}

?>
<div class="container-fluid">
  <div class="block-header">
    <h1>Welcome <?php  $sql="SELECT * FROM `doctor` WHERE doctorid='$_SESSION[doctorid]' ";
    $doctortable = mysqli_query($con,$sql);
    $doc = mysqli_fetch_array($doctortable);

    echo 'Dr. '. $doc[doctorname]; ?>

  </h1>
</div>
</div>





<div class="card">
  <section class="container">
    <div class="row clearfix" style="margin-top: 10px">
      <div class="col-lg-4 col-md-4 col-sm-6">
        <div class="info-box-4 hover-zoom-effect">
          <div class="icon"> <i class="zmdi zmdi-account col-blue"></i> </div>
          <div class="content">
            <div class="text">Nouveau rendez-vous</div>
            <div class="number"><?php
            $sql = "SELECT * FROM appointment WHERE `doctorid`=1 AND appointmentdate=' ".date("Y-m-d")."'";
            $qsql = mysqli_query($con,$sql);
            echo mysqli_num_rows($qsql);
            ?></div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-6">
        <div class="info-box-4 hover-zoom-effect">
          <div class="icon"> <i class="zmdi zmdi-account col-green"></i> </div>
          <div class="content">
            <div class="text">Numero du Patient</div>
            <div class="number"><?php
            $sql = "SELECT * FROM patient WHERE status='Active'";
            $qsql = mysqli_query($con,$sql);
            echo mysqli_num_rows($qsql);
            ?></div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-6">
        <div class="info-box-4 hover-zoom-effect">
          <div class="icon"> <i class="zmdi zmdi-bug col-blush"></i> </div>
          <div class="content">
            <div class="text">rendez-vous d'aujourdhui</div>
            <div class="number">
              <?php
              $sql = "SELECT * FROM appointment WHERE status='Active' AND `doctorid`=1 AND appointmentdate=' ".date("Y-m-d")."'" ;
            $qsql = mysqli_query($con,$sql);
            echo mysqli_num_rows($qsql);
            ?>
            </div>
          </div>
        </div>
      </div>
      
    </div>
  </section>
</div>



<?php
include("adfooter.php");
?>
