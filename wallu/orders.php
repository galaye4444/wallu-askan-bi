<?php
include("header.php");
include("dbconnection.php");
if(isset($_POST[submit]))
{
	if(isset($_GET[editid]))
	{
			$sql ="UPDATE orders SET patientid='$_POST[select2]', orderdate='$_POST[orderdate]', deliverydate='$_POST[deliverydate]', address='$_POST[address]', mobileno='$_POST[mobilenumber]', status ='$_POST[select]' WHERE orderid='$_GET[editid]'";
		if($qsql = mysqli_query($con,$sql))
		{
			echo "<script>alert('enregistrements de commandes mis à jour avec succès...');</script>";
		}
		else
		{
			echo mysqli_error($con);
		}	
	}
	else
	{
	$sql ="INSERT INTO orders( patientid, doctorid, orderdate, address, mobileno, note, status)  values('$_SESSION[patientid]','$_POST[docid]','$dt','$_POST[address]','$_POST[mobilenumber]','$_POST[note]','Pending')";
	if($qsql = mysqli_query($con,$sql))
	{
		echo "<script>alert('Commande passée avec succès...');</script>";
		echo "<script>window.location='vieworder.php';</script>";
	}
	else
	{
		echo mysqli_error($con);
	}
}
}
if(isset($_GET[editid]))
{
	$sql="SELECT * FROM orders WHERE orderid='$_GET[editid]' ";
	$qsql = mysqli_query($con,$sql);
	$rsedit = mysqli_fetch_array($qsql);
	
}
	$sql="SELECT * FROM patient WHERE patientid='$_SESSION[patientid]' ";
	$qsql = mysqli_query($con,$sql);
	$rsedit = mysqli_fetch_array($qsql);
?>

<div class="wrapper col2">
  <div id="breadcrumb">
    <ul>
      <li class="first">Ajouter Nouvelle Commande</li></ul>
  </div>
</div>
<div class="wrapper col4">
  <div id="container">
    <h1>Ici, vous pouvez commander des médicaments en ligne..</h1>
      <form method="post" action="" name="frmorders" onSubmit="return validateform()">
    <table width="490" border="3">
      <tbody>
        <tr>
          <td>Selectionnez Docteur</td>
          <td><select name="docid" id="docid">
            <option value="">Select</option>
            <?php
          	$sqldoctor= "SELECT * FROM doctor WHERE status='Active'";
			$qsqldoctor = mysqli_query($con,$sqldoctor);
			while($rsdoctor = mysqli_fetch_array($qsqldoctor))
			{
				if($rsdoctor[doctorid] == $rsedit[doctorid])
				{
				echo "<option value='$rsdoctor[doctorid]' selected>$rsdoctor[doctorid]-$rsdoctor[doctorname]</option>";
				}
				else
				{
				echo "<option value='$rsdoctor[doctorid]'>$rsdoctor[doctorid]-$rsdoctor[doctorname]</option>";				
				}
			}
		  ?>
          </select></td>
        </tr>
        <tr>
          <td width="34%">Address</td>
          <td width="66%"><textarea name="address" id="address" cols="45" rows="5"><?php echo $rsedit[address]; ?> </textarea></td>
        </tr>
        <tr>
          <td>Numero Telephone</td>
          <td><input type="text" name="mobilenumber" id="mobilenumber" value="<?php echo $rsedit[mobileno]; ?>" /></td>
        </tr>
        <tr>
          <td>Note</td>
          <td><textarea name="note" id="note" cols="45" rows="5"><?php echo $rsedit[note]; ?> </textarea></td>
        </tr>

        <tr>
          <td colspan="2" align="center"><input type="submit" name="submit" id="submit" value="Submit" /></td>
        </tr>
      </tbody>
    </table>
    </form>
    <p>&nbsp;</p>
  </div>
</div>
</div>
 <div class="clear"></div>
  </div>
</div>
<?php
include("footer.php");
?>
<script type="application/javascript">
var alphaExp = /^[a-zA-Z]+$/; //Variable to validate only alphabets
var alphaspaceExp = /^[a-zA-Z\s]+$/; //Variable to validate only alphabets and space
var numericExpression = /^[0-9]+$/; //Variable to validate only numbers
var alphanumericExp = /^[0-9a-zA-Z]+$/; //Variable to validate numbers and alphabets
var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/; //Variable to validate Email ID 

function validateform()
{
	if(document.frmorders.select2.value == "")
	{
		alert("Nom du patient doit pas etre vide..");
		document.frmorders.select2.focus();
		return false;
	}
	
	else if(document.frmorders.orderdate.value == "")
	{
		alert("Commande du patient doit pas etre vide..");
		document.frmorders.orderdate.focus();
		return false;
	}
	else if(document.frmorders.deliverydate.value == "")
	{
		alert("La date de livraison ne doit pas être vide..");
		document.frmorders.deliverydate.focus();
		return false;
	}
	else if(document.frmorders.address.value == "")
	{
		alert("Address doit pas etre vide..");
		document.frmorders.address.focus();
		return false;
	}
	else if(document.frmorders.mobilenumber.value == "")
	{
		alert("Numero de telephone doit pas etre vide..");
		document.frmorders.mobilenumber.focus();
		return false;
	}
	else if(!document.frmorders.mobilenumber.value.match(numericExpression))
	{
		alert("Numero de telephone invalide..");
		document.frmorders.mobilenumber.focus();
		return false;
	}
	else if(document.frmorders.select.value == "" )
	{
		alert("Veuillez sélectionner le statut..");
		document.frmorders.select.focus();
		return false;
	}
	else
	{
		return true;
	}
}
</script>
