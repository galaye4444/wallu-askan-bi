<?php
include("adheader.php");
include("dbconnection.php");
if(isset($_POST[submit]))
{
	if(isset($_GET[editid]))
	{
		$sql ="UPDATE medicine SET medicinename='$_POST[medicinename]',medicinecost='$_POST[medicinecost]',description='$_POST[description]',status='$_POST[status]' WHERE medicineid='$_GET[editid]'";
		if($qsql = mysqli_query($con,$sql))
		{
			echo "<script>alert('Fiche de médecament mise à jour avec succès...');</script>";
		}
		else
		{
			echo mysqli_error($con);
		}	
	}
	else
	{
		$sql ="INSERT INTO medicine(medicinename,medicinecost,description,status) values('$_POST[medicinename]','$_POST[medicinecost]','$_POST[description]','$_POST[status]')";
		if($qsql = mysqli_query($con,$sql))
		{
			echo "<script>alert('Fiche de médecament insérée avec succès...');</script>";
		}
		else
		{
			echo mysqli_error($con);
		}
	}
}
if(isset($_GET[editid]))
{
	$sql="SELECT * FROM medicine WHERE medicineid='$_GET[editid]' ";
	$qsql = mysqli_query($con,$sql);
	$rsedit = mysqli_fetch_array($qsql);
	
}
?>


<div class="container-fluid">
	<div class="block-header">
            <h2>Ajouter Nouveau Medicament</h2>
           
        </div>
  <div class="card">
   
    <form method="post" action="" name="frmmedicine" onSubmit="return validateform()">
    <table class="table table-hover">
      <tbody>
        <tr>
          <td width="34%">Nom Medicament</td>
          <td width="66%"><input placeholder="Ecrire ici" class="form-control" type="text" name="medicinename" id="medicinename" value="<?php echo $rsedit[medicinename]; ?>" /></td>
        </tr>
        <tr>
          <td width="34%">Medicine cost</td>
          <td width="66%"><input placeholder="Ecrire ici" class="form-control" type="text" name="medicinecost" id="medicinecost" value="<?php echo $rsedit[medicinecost]; ?>" /></td>
        </tr>
        <tr>
          <td>Description</td>
          <td><textarea placeholder="Ecrire ici" class="form-control no-resize" name="description" id="description" cols="45" rows="5"><?php echo $rsedit[description] ; ?></textarea></td>
        </tr>
        <tr>
          <td>Status</td>
          <td> <select class="form-control show-tick" name="status" id="status">
            <option value="">Select</option>
            <?php
		  $arr = array("Active","Inactive");
		  foreach($arr as $val)
		  {
			  if($val == $rsedit[status])
			  {
			  echo "<option value='$val' selected>$val</option>";
			  }
			  else
			  {
				  echo "<option value='$val'>$val</option>";			  
			  }
		  }
		  ?>
            </select></td>
        </tr>
        <tr>
          <td colspan="2" align="center"><input class="btn btn-default" type="submit" name="submit" id="submit" value="Enregistrer" /></td>
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
include("adfooter.php");
?>
<script type="application/javascript">
/*
var alphaExp = /^[a-zA-Z]+$/; //Variable to validate only alphabets
var alphaspaceExp = /^[a-zA-Z\s]+$/; //Variable to validate only alphabets and space
var numericExpression = /^[0-9]+$/; //Variable to validate only numbers
var alphanumericExp = /^[0-9a-zA-Z]+$/; //Variable to validate numbers and alphabets
var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/; //Variable to validate Email ID 

function validateform()
{
	if(document.frmmedicine.departmentname.value == "")
	{
		alert("Le nom du département ne doit pas être vide..");
		document.frmdept.departmentname.focus();
		return false;
	}
	else if(!document.frmmedicine.departmentname.value.match(alphaExp))
	{
		alert("Nom du département non valide..");
		document.frmdept.departmentname.focus();
		return false;
	}
	else if(document.frmmedicine.select.value == "" )
	{
		alert("Veuillez sélectionner le statut..");
		document.frmdept.select.focus();
		return false;
	}
	
	else
	{
		return true;
	}
}
*/
</script>
