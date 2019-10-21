<?php
include("adformheader.php");
include("dbconnection.php");
if(isset($_POST[submit]))
{
	if(isset($_GET[editid]))
	{
		$sql ="UPDATE patient SET patientname='$_POST[patientname]',admissiondate='$_POST[admissiondate]',admissiontime='$_POST[admissiontme]',address='$_POST[address]',mobileno='$_POST[mobilenumber]',city='$_POST[city]',pincode='$_POST[pincode]',loginid='$_POST[loginid]',password='$_POST[password]',bloodgroup='$_POST[select2]',gender='$_POST[select3]',dob='$_POST[dateofbirth]',status='$_POST[select]' WHERE patientid='$_GET[editid]'";
		if($qsql = mysqli_query($con,$sql))
		{
			echo "<script>alert('fiche patient mise à jour avec succès...');</script>";
		}
		else
		{
			echo mysqli_error($con);
		}	
	}
	else
	{
		$sql ="INSERT INTO patient(patientname,admissiondate,admissiontime,address,mobileno,city,pincode,loginid,password,bloodgroup,gender,dob,status) values('$_POST[patientname]','$dt','$tim','$_POST[address]','$_POST[mobilenumber]','$_POST[city]','$_POST[pincode]','$_POST[loginid]','$_POST[password]','$_POST[select2]','$_POST[select3]','$_POST[dateofbirth]','Active')";
		if($qsql = mysqli_query($con,$sql))
		{
			echo "<script>alert('fiche patient insérée avec succès...');</script>";
			$insid= mysqli_insert_id($con);
			if(isset($_SESSION[adminid]))
			{
				echo "<script>window.location='appointment.php?patid=$insid';</script>";	
			}
			else
			{
				echo "<script>window.location='patientlogin.php';</script>";	
			}		
		}
		else
		{
			echo mysqli_error($con);
		}
	}
}
if(isset($_GET[editid]))
{
	$sql="SELECT * FROM patient WHERE patientid='$_GET[editid]' ";
	$qsql = mysqli_query($con,$sql);
	$rsedit = mysqli_fetch_array($qsql);
	
}
?>


<div class="container-fluid">
    <div class="block-header">
        <h2>Panneau d'enregistrement des patients</h2>

    </div>
    <div class="card">

        <form method="post" action="" name="frmpatient" onSubmit="return validateform()" style="padding: 10px">



            <div class="form-group"><label>Nom du Patient</label>
                <div class="form-line">
                    <input class="form-control" type="text" name="patientname" id="patientname"
                        value="<?php echo $rsedit[patientname]; ?>" />
                </div>
            </div>

            <?php
			if(isset($_GET[editid]))
			{
				?>

            <div class="form-group"><label>Date Admission </label>
                <div class="form-line">
                    <input class="form-control" type="date" name="admissiondate" id="admissiondate"
                        value="<?php echo $rsedit[admissiondate]; ?>" readonly />
                </div>
            </div>


            <div class="form-group"><label>Heure Admission</label>
                <div class="form-line">
                    <input class="form-control" type="time" name="admissiontme" id="admissiontme"
                        value="<?php echo $rsedit[admissiontime]; ?>" readonly />
                </div>
            </div>

            <?php
			}
			?>
            <div class="form-group">
                <label>Address</label>
                <div class="form-line">
                    <input class="form-control " name="address" id="tinymce" value="<?php echo $rsedit[address]; ?>">
                </div>
            </div>

            <div class="form-group"><label>Numero de Telephone</label>
                <div class="form-line">
                    <input class="form-control" type="text" name="mobilenumber" id="mobilenumber"
                        value="<?php echo $rsedit[mobileno]; ?>" />
                </div>
            </div>


            <div class="form-group"><label>Cite</label>
                <div class="form-line">
                    <input class="form-control" type="text" name="city" id="city"
                        value="<?php echo $rsedit[city]; ?>" />
                </div>
            </div>


            <div class="form-group"><label>Code PIN </label>
                <div class="form-line">
                    <input class="form-control" type="text" name="pincode" id="pincode"
                        value="<?php echo $rsedit[pincode]; ?>" />
                </div>
            </div>


            <div class="form-group"><label> ID</label>
                <div class="form-line">
                    <input class="form-control" type="text" name="loginid" id="loginid"
                        value="<?php echo $rsedit[loginid]; ?>" />
                </div>
            </div>


            <div class="form-group"><label>Mot de Passe</label>
                <div class="form-line">
                    <input class="form-control" type="password" name="password" id="password"
                        value="<?php echo $rsedit[password]; ?>" />
                </div>
            </div>


            <div class="form-group"><label>Confirmation Mot de Passe</label>
                <div class="form-line">
                    <input class="form-control" type="password" name="confirmpassword" id="confirmpassword"
                        value="<?php echo $rsedit[confirmpassword]; ?>" />
                </div>
            </div>


            <div class="form-group"><label>Groupe Sanguin</label>
                <div class="form-line"><select class="form-control show-tick" name="select2" id="select2">
                        <option value="">Select</option>
                        <?php
					$arr = array("A+","A-","B+","B-","O+","O-","AB+","AB-");
					foreach($arr as $val)
					{
						if($val == $rsedit[bloodgroup])
						{
							echo "<option value='$val' selected>$val</option>";
						}
						else
						{
							echo "<option value='$val'>$val</option>";			  
						}
					}
					?>
                    </select>
                </div>
            </div>


            <div class="form-group"><label>Gendre</label>
                <div class="form-line"><select class="form-control show-tick" name="select3" id="select3">
                        <option value="">Select</option>
                        <?php
				$arr = array("MALE","FEMALE");
				foreach($arr as $val)
				{
					if($val == $rsedit[gender])
					{
						echo "<option value='$val' selected>$val</option>";
					}
					else
					{
						echo "<option value='$val'>$val</option>";			  
					}
				}
				?>
                    </select>
                </div>
            </div>


            <div class="form-group"><label>Date de Naissance</label>
                <div class="form-line">
                    <input class="form-control" type="date" name="dateofbirth" max="<?php echo date("Y-m-d"); ?>"
                        id="dateofbirth" value="<?php echo $rsedit[dob]; ?>" />
                </div>
            </div>





            <input class="btn btn-default" type="submit" name="submit" id="submit" value="Enregistrer" />




        </form>
        <p>&nbsp;</p>
    </div>
</div>
</div>
<div class="clear"></div>
</div>
</div>
<?php
include("adformfooter.php");
?>
<script type="application/javascript">
var alphaExp = /^[a-zA-Z]+$/; //Variable to validate only alphabets
var alphaspaceExp = /^[a-zA-Z\s]+$/; //Variable to validate only alphabets and space
var numericExpression = /^[0-9]+$/; //Variable to validate only numbers
var alphanumericExp = /^[0-9a-zA-Z]+$/; //Variable to validate numbers and alphabets
var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/; //Variable to validate Email ID 

function validateform() {
    if (document.frmpatient.patientname.value == "") {
        alert("Nom du patient doit pas etre vide..");
        document.frmpatient.patientname.focus();
        return false;
    } else if (!document.frmpatient.patientname.value.match(alphaspaceExp)) {
        alert("Nom invalide..");
        document.frmpatient.patientname.focus();
        return false;
    } else if (document.frmpatient.admissiondate.value == "") {
        alert("Date d\'admission doit pas etre vide..");
        document.frmpatient.admissiondate.focus();
        return false;
    } else if (document.frmpatient.admissiontme.value == "") {
        alert("Heure d\'admission doit pas etre vide..");
        document.frmpatient.admissiontme.focus();
        return false;
    } else if (document.frmpatient.address.value == "") {
        alert("Addresse doit pas etre vide..");
        document.frmpatient.address.focus();
        return false;
    } else if (document.frmpatient.mobilenumber.value == "") {
        alert("Numero de telephone doit pas etre vide..");
        document.frmpatient.mobilenumber.focus();
        return false;
    } else if (!document.frmpatient.mobilenumber.value.match(numericExpression)) {
        alert("Numero invalide..");
        document.frmpatient.mobilenumber.focus();
        return false;
    } else if (document.frmpatient.city.value == "") {
        alert("Cite doit pas etre vide..");
        document.frmpatient.city.focus();
        return false;
    } else if (!document.frmpatient.city.value.match(alphaspaceExp)) {
        alert("Cite invalide..");
        document.frmpatient.city.focus();
        return false;
    } else if (document.frmpatient.pincode.value == "") {
        alert("code pin doit pas etre vide..");
        document.frmpatient.pincode.focus();
        return false;
    } else if (!document.frmpatient.pincode.value.match(numericExpression)) {
        alert("code pin invalide..");
        document.frmpatient.pincode.focus();
        return false;
    } else if (document.frmpatient.loginid.value == "") {
        alert("ID doit pas etre vide..");
        document.frmpatient.loginid.focus();
        return false;
    } else if (!document.frmpatient.loginid.value.match(alphanumericExp)) {
        alert("ID invalide..");
        document.frmpatient.loginid.focus();
        return false;
    } else if (document.frmpatient.password.value == "") {
        alert("Mot de passe doit pas etre vide..");
        document.frmpatient.password.focus();
        return false;
    } else if (document.frmpatient.password.value.length < 8) {
        alert("Votre mot de passe doit contenir au moins 8 caracteres...");
        document.frmpatient.password.focus();
        return false;
    } else if (document.frmpatient.password.value != document.frmpatient.confirmpassword.value) {
        alert("Les mots de passe ne correspondent pas..");
        document.frmpatient.confirmpassword.focus();
        return false;
    } else if (document.frmpatient.select2.value == "") {
        alert("Groupe Sanguin doit pas etre vide..");
        document.frmpatient.select2.focus();
        return false;
    } else if (document.frmpatient.select3.value == "") {
        alert("Gendre doit pas etre vide..");
        document.frmpatient.select3.focus();
        return false;
    } else if (document.frmpatient.dateofbirth.value == "") {
        alert("Date de Naissance doit pas etre vide..");
        document.frmpatient.dateofbirth.focus();
        return false;
    } else if (document.frmpatient.select.value == "") {
        alert("Veuillez selectionnez un statut..");
        document.frmpatient.select.focus();
        return false;
    } else {
        return true;
    }
}
</script>
