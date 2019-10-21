<?php
session_start();
error_reporting(0);
include("dbconnection.php");
$dt = date("Y-m-d");
$tim = date("H:i:s");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<title>:: Wallou Askan Wi ::</title>
<link rel="icon" href="favicon.ico" type="image/x-icon">
<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
<!-- JQuery DataTable Css -->
<link href="assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css" rel="stylesheet">
<link href="assets/css/main.css" rel="stylesheet">
<!-- Custom Css -->

<!-- Swift Themes. You can choose a theme from css/themes instead of get all themes -->
<link href="assets/css/themes/all-themes.css" rel="stylesheet" />
<script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">
</head>

<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-cyan">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>svp attendre...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->

    <!-- Morphing Search  -->

    <!-- Top Bar -->
    <nav class="navbar clearHeader">
        <div class="col-12">
            <div class="navbar-header"> <a href="javascript:void(0);" class="bars"></a> <a class="navbar-brand"
                    href="#">Wallou Askan Wi</a> </div>
            <ul class="nav navbar-nav navbar-right">
                <!-- Notifications -->
                <li>
                    <a data-placement="bottom" title="Full Screen" href="logout.php"><i
                            class="zmdi zmdi-sign-in"></i></a>
                </li>               

            </ul>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <?php
                if(isset($_SESSION[adminid]))
                {
            ?>
            <!--Admin Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MENU</li>
                    <li class="active open"><a href="adminaccount.php"><i
                                class="zmdi zmdi-home"></i><span>TABLEAU DE BORD</span></a></li>


                    <li><a href="javascript:void(0);" class="menu-toggle"><i
                                class="zmdi zmdi-calendar-check"></i><span>Profile</span> </a>
                        <ul class="ml-menu">
                            <li><a href="adminprofile.php">Profile Admin </a></li>
                            <li><a href="adminchangepassword.php">Changer Mot de passe</a></li>
                            <li><a href="admin.php">Ajouter Admin</a></li>
                            <li><a href="viewadmin.php">Voir Admin</a></li>
                        </ul>
                    </li>

                    <li><a href="javascript:void(0);" class="menu-toggle"><i
                                class="zmdi zmdi-calendar-check"></i><span>Rendez-vous</span> </a>
                        <ul class="ml-menu">
                            <li><a href="appointment.php">Nouveau rendez-vous</a></li>
                            <li><a href="viewappointmentpending.php">voir les rendez-vous en attente</a>
                            </li>
                            <li><a href="viewappointmentapproved.php">Voir les rendez-vous
                                    fixer</a></li>
                        </ul>
                    </li>
                    <li><a href="javascript:void(0);" class="menu-toggle"><i
                                class="zmdi zmdi-account-add"></i><span>Docteurs</span> </a>
                        <ul class="ml-menu">
                            <li><a href="doctor.php">Ajouter Docteur</a>
                            </li>
                            <li><a href="viewdoctor.php">View Docteur</a></li>
                           
                        </ul>
                    </li>
                    <li><a href="javascript:void(0);" class="menu-toggle"><i
                                class="zmdi zmdi-account-o"></i><span>Patients</span> </a>
                        <ul class="ml-menu">
                            <li><a href="patient.php">Ajouter Patient</a></li>
                            <li><a href="viewpatient.php">Voir les dossiers des patients</a></li>
                        </ul>
                    </li>


                    <li> <a href="javascript:void(0);" class="menu-toggle"><i
                                class="zmdi zmdi-settings-square"></i><span>Service</span> </a>
                        <ul class="ml-menu">
                            <li><a href="department.php">Ajouter Department</a></li>
                            <li><a href="viewdepartment.php">Voir Department</a></li>
                            <li><a href="treatment.php">Add type de traitement</a></li>
                            <li><a href="viewtreatment.php">Voir types de traitement</a></li>
                            <li><a href="medicine.php">Ajouter Medicament</a></li>
                            <li><a href="viewmedicine.php">Voir Medicament</a></li>
                        </ul>
                    </li>

                </ul>
            </div>
            <!-- Admin Menu -->
            <?php }?>


            <!-- doctor Menu -->
            <?php
            if(isset($_SESSION[doctorid]))
            {
            ?>
            <div class="menu">
                <ul class="list">
                    <li class="header">MENU</li>
                    <li class="active open"><a href="doctoraccount.php"><i
                                class="zmdi zmdi-home"></i><span>TABLEAU DE BORD</span></a></li>


                    <li><a href="javascript:void(0);" class="menu-toggle"><i
                                class="zmdi zmdi-calendar-check"></i><span>Profile</span> </a>
                        <ul class="ml-menu">
                            <li><a href="doctorprofile.php">Profile</a></li>
                            <li><a href="doctorchangepassword.php">Changer Mot de Passe</a></li>
                        </ul>
                    </li>

                    <li><a href="javascript:void(0);" class="menu-toggle"><i
                                class="zmdi zmdi-calendar-check"></i><span>Rendez-vous</span> </a>
                        <ul class="ml-menu">
                            <li><a href="viewappointmentpending.php" style="width:250px;">Voir les rendez-vous en attente</a>
                            </li>
                            <li><a href="viewappointmentapproved.php" style="width:250px;">Voir les rendez-vous
                                    fixe</a></li>
                        </ul>
                    </li>
                    <li><a href="javascript:void(0);" class="menu-toggle"><i
                                class="zmdi zmdi-account-add"></i><span>Docteurs</span> </a>
                        <ul class="ml-menu">
                           
                            <li><a href="doctortimings.php">Ajouter heure de visite</a></li>
                            <li><a href="viewdoctortimings.php">Voir heure de visite</a></li>
                        </ul>
                    </li>
                    <li><a href="javascript:void(0);" class="menu-toggle"><i
                                class="zmdi zmdi-account-o"></i><span>Patients</span> </a>
                        <ul class="ml-menu">
                            <li><a href="viewpatient.php">Voir Patient</a>
                            </li>
                        </ul>
                    </li>

                 

                    <li> <a href="javascript:void(0);" class="menu-toggle"><i
                                class="zmdi zmdi-settings-square"></i><span>Service</span> </a>
                        <ul class="ml-menu">
                            <li><a href="viewtreatmentrecord.php">Voir les dossiers de traitement</a></li>
                            <li><a href="viewtreatment.php">Voir traitement</a></li>
                        </ul>
                    </li>

                </ul>
            </div>

            <?php }; ?>
            <!-- doctor Menu -->




            <!-- patient Menu -->
            <?php
            if(isset($_SESSION[patientid]))
            {
            ?>
            <div class="menu">
                <ul class="list">
                    <li class="header">MENU </li>
                    <li class="active open"><a href="patientaccount.php"><i
                                class="zmdi zmdi-home"></i><span>TABLEAU DE BORD</span></a></li>


                    <li><a href="javascript:void(0);" class="menu-toggle"><i
                                class="zmdi zmdi-calendar-check"></i><span>Profile</span> </a>
                        <ul class="ml-menu">
                            <li><a href="patientprofile.php">Voir Profile</a></li>
                            <li><a href="patientchangepassword.php">Changer Mot de Passe</a></li>
                        </ul>
                    </li>

                    <li><a href="javascript:void(0);" class="menu-toggle"><i
                                class="zmdi zmdi-calendar-check"></i><span>Rendez-vous</span> </a>
                        <ul class="ml-menu">
                            <li><a href="patientappointment.php" >Ajouter rendez-vous</a></li>
                            <li><a href="viewappointment.php" >Voir rendez-vous</a></li>
                        </ul>
                    </li>
                    <li><a href="javascript:void(0);" class="menu-toggle"><i
                                class="zmdi zmdi-account-add"></i><span>Prescription</span> </a>
                        <ul class="ml-menu">
                            <li><a  href="patviewprescription.php">Voir les dossiers de prescription</a>
                            </li>
                        </ul>
                    </li>
                    <li><a href="javascript:void(0);" class="menu-toggle"><i
                                class="zmdi zmdi-account-o"></i><span>Traitement</span> </a>
                        <ul class="ml-menu">
                            <li><a href="viewtreatmentrecord.php">Voir les dossiers de traitement</a></li>
                    </li>
                </ul>
                </li>


                </ul>
            </div>

            <?php }; ?>
            <!-- patient Menu -->
        </aside>
        <!-- #END# Left Sidebar -->
     
    </section>
     <section class="content home">