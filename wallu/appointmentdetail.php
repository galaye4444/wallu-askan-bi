<?php
session_start();
include("dbconnection.php");
if(isset($_POST[submitapp]))
{
	$sql ="INSERT INTO appointment(appointmenttype,roomid,departmentid,appointmentdate,appointmenttime,doctorid) values('$_POST[select]','$_POST[select2]','$_POST[select3]','$_POST[date]','$_POST[time]','$_POST[select5]')";
	if($qsql = mysqli_query($con,$sql))
	{
		echo "<script>alert('rendez-vous ajouter avec success...');</script>";
	}
	else
	{
		echo mysqli_error($con);
	}
}

if(isset($_GET[editid]))
{
	$sql="SELECT * FROM appointment WHERE appointmentid='$_GET[editid]' ";
	$qsql = mysqli_query($con,$sql);
	$rsedit = mysqli_fetch_array($qsql);
	
}

	$sqlappointment1 = "SELECT max(appointmentid) FROM appointment where patientid='$_GET[patientid]' AND (status='Active' OR status='Approved')";
	$qsqlappointment1 = mysqli_query($con,$sqlappointment1);
	$rsappointment1=mysqli_fetch_array($qsqlappointment1);
	
	$sqlappointment = "SELECT * FROM appointment where appointmentid='$rsappointment1[0]'";
	$qsqlappointment = mysqli_query($con,$sqlappointment);
	$rsappointment=mysqli_fetch_array($qsqlappointment);
	
if(mysqli_num_rows($qsqlappointment) == 0)
{
	echo "<center><h2>Aucun rendez-vous trouve..</h2></center>";
}
else
{
	$sqlappointment = "SELECT * FROM appointment where appointmentid='$rsappointment1[0]'";
	$qsqlappointment = mysqli_query($con,$sqlappointment);
	$rsappointment=mysqli_fetch_array($qsqlappointment);
	
	$sqlroom = "SELECT * FROM room where roomid='$rsappointment[roomid]' ";
	$qsqlroom = mysqli_query($con,$sqlroom);
	$rsroom =mysqli_fetch_array($qsqlroom);
	
	$sqldepartment = "SELECT * FROM department where departmentid='$rsappointment[departmentid]'";
	$qsqldepartment = mysqli_query($con,$sqldepartment);
	$rsdepartment =mysqli_fetch_array($qsqldepartment);
	
	$sqldoctor = "SELECT * FROM doctor where doctorid='$rsappointment[doctorid]'";
	$qsqldoctor = mysqli_query($con,$sqldoctor);
	$rsdoctor =mysqli_fetch_array($qsqldoctor);
?>
<table class="table table-bordered table-striped">
  
  
  <tr>
    <td>Department</td>
    <td>&nbsp;<?php echo $rsdepartment[departmentname]; ?></td>
  </tr>
  <tr>
    <td>Docteur</td>
    <td>&nbsp;<?php echo $rsdoctor[doctorname]; ?></td>
  </tr>
  <tr>
    <td>Date du rendez-vous</td>
    <td>&nbsp;<?php echo date("d-M-Y",strtotime($rsappointment[appointmentdate])); ?></td>
  </tr>
  <tr>
    <td>Heure du rendez-vous</td>
    <td>&nbsp;<?php echo date("h:i A",strtotime($rsappointment[appointmenttime])); ?></td>
  </tr>
</table>
<?php
}
?>
<script type="application/javascript">
function validateform()
{
	
	if(document.frmappntdetail.select.value == "")
	{
		alert("Le type du rendez-vous doit pas etre vide..");
		document.frmappntdetail.select.focus();
		return false;
	}
	else if(document.frmappntdetail.select2.value == "")
	{
		alert("Le type du salle doit pas etre vide..");
		document.frmappntdetail.select2.focus();
		return false;
	}
	else if(document.frmappntdetail.select3.value == "")
	{
		alert("Le nom du departement doit pas etre vide..");
		document.frmappntdetail.select3.focus();
		return false;
	}
	else if(document.frmappntdetail.date.value == "")
	{
		alert("La date du rendez-vous doit pas etre vide..");
		document.frmappntdetail.date.focus();
		return false;
	}
	else if(document.frmappntdetail.time.value == "")
	{
		alert("L\'heure du rendez-vous doit pas etre vide..");
		document.frmappntdetail.time.focus();
		return false;
	}
	else if(document.frmappntdetail.select5.value == "")
	{
		alert("Le nom du docteur doit pas etre vide..");
		document.frmappntdetail.select5.focus();
		return false;
	}
	else
	{
		return true;
	}
}
</script>