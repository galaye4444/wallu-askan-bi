<?php

include("adheader.php");
include("dbconnection.php");
if(isset($_POST[submit]))
{
	if(isset($_SESSION[doctorid]))
	{
		$sql ="UPDATE doctor SET doctorname='$_POST[doctorname]',mobileno='$_POST[mobilenumber]',departmentid='$_POST[select3]',loginid='$_POST[loginid]'WHERE doctorid='$_SESSION[doctorid]'";
		if($qsql = mysqli_query($con,$sql))
		{
			echo "<script>alert('profile du docteur mise a jour avec success...');</script>";
		}
		else
		{
			echo mysqli_error($con);
		}	
	}
	else
	{
		$sql ="INSERT INTO doctor(doctorname,mobileno,departmentid,loginid,password,status) values('$_POST[doctorname]','$_POST[mobilenumber]','$_POST[select3]','$_POST[loginid]','$_POST[password]','$_POST[select]')";
		if($qsql = mysqli_query($con,$sql))
		{
			echo "<script>alert('Docteur ajouter avec success...');</script>";
		}
		else
		{
			echo mysqli_error($con);
		}
	}
}
if(isset($_SESSION[doctorid]))
{
	$sql="SELECT * FROM doctor WHERE doctorid='$_SESSION[doctorid]' ";
	$qsql = mysqli_query($con,$sql);
	$rsedit = mysqli_fetch_array($qsql);
	
}
?>
<div class="container-fluid">
    <div class="block-header">
        <h2> Doctor's Profile</h2>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">

                <form method="post" action="" name="frmdoctprfl" onSubmit="return validateform()" style="padding: 10px">
                    <div class="row">
                        <div class="col-sm-4 col-xs-12">
                            <div class="form-group">
                                <label>Doctor Nom</label>
                                <div class="form-line">
                                    <input class="form-control" type="text" name="doctorname" id="doctorname"
                                        value="<?php echo $rsedit[doctorname]; ?>" />
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 col-xs-12">
                            <div class="form-group">
                                <label>Telephone</label>
                                <div class="form-line">
                                    <input class="form-control" type="text" name="mobilenumber" id="mobilenumber"
                                        value="<?php echo $rsedit[mobileno]; ?>" />
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 col-xs-12">
                            <div class="form-group">
                                <label>Department</label>
                                <div class="form-line">
                                    <select name="select3" id="select3" class="form-control show-tick">
                                        <option value="">Select</option>
                                        <?php
					$sqldepartment= "SELECT * FROM department WHERE status='Active'";
					$qsqldepartment = mysqli_query($con,$sqldepartment);
					while($rsdepartment=mysqli_fetch_array($qsqldepartment))
					{
						if($rsdepartment[departmentid] == $rsedit[departmentid])
						{
							echo "<option value='$rsdepartment[departmentid]' selected>$rsdepartment[departmentname]</option>";
						}
						else
						{
							echo "<option value='$rsdepartment[departmentid]'>$rsdepartment[departmentname]</option>";
						}

				}
				?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 col-xs-12">
                            <div class="form-group">
                                <label> ID</label>
                                <div class="form-line">
                                    <input class="form-control" type="text" name="loginid" id="loginid"
                                        value="<?php echo $rsedit[loginid]; ?>" />
                                </div>
                            </div>
                        </div>
                        
                       
                     
                    </div>

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
var alphaExp = /^[a-zA-Z]+$/; //Variable to validate only alphabets
var alphaspaceExp = /^[a-zA-Z\s]+$/; //Variable to validate only alphabets and space
var numericExpression = /^[0-9]+$/; //Variable to validate only numbers
var alphanumericExp = /^[0-9a-zA-Z]+$/; //Variable to validate numbers and alphabets
var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/; //Variable to validate Email ID 

function validateform() {
    if (document.frmdoctprfl.doctorname.value == "") {
        alert("Le nom du docteur doit pas etre vide..");
        document.frmdoctprfl.doctorname.focus();
        return false;
    } else if (!document.frmdoctprfl.doctorname.value.match(alphaspaceExp)) {
        alert("Le nom est invalide..");
        document.frmdoctprfl.doctorname.focus();
        return false;
    } else if (document.frmdoctprfl.mobilenumber.value == "") {
        alert("Le numero de telephone doit pas etre vide..");
        document.frmdoctprfl.mobilenumber.focus();
        return false;
    } else if (!document.frmdoctprfl.mobilenumber.value.match(numericExpression)) {
        alert("Le numero de telephone est invalide..");
        document.frmdoctprfl.mobilenumber.focus();
        return false;
    } else if (document.frmdoctprfl.select3.value == "") {
        alert("Le Department ID doit pas etre vide..");
        document.frmdoctprfl.select3.focus();
        return false;
    } else if (document.frmdoctprfl.loginid.value == "") {
        alert("Login ID doit pas etre vide..");
        document.frmdoctprfl.loginid.focus();
        return false;
    } else if (!document.frmdoctprfl.loginid.value.match(alphanumericExp)) {
        alert("loginid est invalide..");
        document.frmdoctprfl.loginid.focus();
        return false;
    } else if (document.frmdoctprfl.password.value == "") {
        alert("Le mot de passe doit pas etre vie ..");
        document.frmdoctprfl.password.focus();
        return false;
    } else if (document.frmdoctprfl.password.value.length < 8) {
        alert(" Le mot de passe doit avoir minimum 8 caracteres...");
        document.frmdoctprfl.password.focus();
        return false;
    } else if (document.frmdoctprfl.password.value != document.frmdoctprfl.cnfirmpassword.value) {
        alert("Les mot de passe ne correspondent pas ..");
        document.frmdoctprfl.password.focus();
        return false;
    } else if (document.frmdoctprfl.select.value == "") {
        alert("selectionnez un statut..");
        document.frmdoctprfl.select.focus();
        return false;
    } else {
        return true;
    }
}
</script>
