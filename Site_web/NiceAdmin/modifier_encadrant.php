<?php
// On démarre la session AVANT d'écrire du code HTML
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">

  <title>modifier encadrant</title>

  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="css/elegant-icons-style.css" rel="stylesheet" />
  <link href="css/font-awesome.min.css" rel="stylesheet" />
  <!-- full calendar css-->
  <link href="assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
  <link href="assets/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" />
  <!-- easy pie chart-->
  <link href="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen" />
  <!-- owl carousel -->
  <link rel="stylesheet" href="css/owl.carousel.css" type="text/css">
  <link href="css/jquery-jvectormap-1.2.2.css" rel="stylesheet">
  <!-- Custom styles -->
  <link rel="stylesheet" href="css/fullcalendar.css">
  <link href="css/widgets.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet" />
  <link href="css/xcharts.min.css" rel=" stylesheet">
  <link href="css/jquery-ui-1.10.4.min.css" rel="stylesheet">
  <!-- =======================================================
    Theme Name: NiceAdmin
    Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
    Author: BootstrapMade
    Author URL: https://bootstrapmade.com
  ======================================================= -->
</head>

<body>
  <!-- container section start -->
  <section id="container" class="">


    <?PHP
if (!isset($_SESSION['admin'])) {
   header('Location: login.php?#deconncter');
}
if ($_SESSION['admin']=="administrateur") {
include("header.php");
}else{
  include("header_sec.php");
}
?>
    <!--sidebar end-->
<?php
$connexion=mysqli_connect("localhost","root","");
$s="stage";
$connect_base=mysqli_select_db($connexion,$s); 
if (isset($_POST['nom'])) {
$cin2=$_SESSION['encadrant'];
$donne=$_POST;
$nom=$donne['nom'];
$prenom=$donne['prenom'];
$cin=$donne['cin'];
$date=$donne['date'];
$tel=$donne['tel'];
$mail=$donne['mail'];
$ad=$donne['adresse']; 
$m1="UPDATE `encadrant` SET `cin_encadrant`='$cin', `nom_encadrant`='$nom',`prenom_encadrant`='$prenom',`date_de_naissance`='$date',`tel`='$tel',`Email`='$mail',`Adresse`='$ad' WHERE `cin_encadrant`='$cin2' ";
$resultat1=mysqli_query($connexion,$m1);
if ($resultat1==1) {
   header('Location: Enregistrer_absence.php?');
}else{
   echo " <center><font color=\"#FF0000\"><h1>Error!</h1></font></center> "; 
}
}
?>
<?php
if (isset($_GET['var2'])) {
$cin=$_GET['var2'];
$_SESSION['encadrant']=$cin;


$m1="SELECT * FROM `encadrant` where cin_encadrant='$cin' ";
$resultat1=mysqli_query($connexion,$m1);
$ligne = mysqli_fetch_array ($resultat1);
$nom=$ligne['nom_encadrant'];
$prenom=$ligne['prenom_encadrant'];
$date=$ligne['date_de_naissance'];
$tel=$ligne['tel'];
$mail=$ligne['Email'];
$ad=$ligne['Adresse'];
}
?>
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">

        <!-- Form validations -->
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
Ajouter Encadrant
              </header>
              <div class="panel-body">
                <div class="form">
                  <form class="form-validate form-horizontal" id="feedback_form"  action="<?php echo $_SERVER['SCRIPT_NAME']; ?>"method="POST">
                    <div class="form-group ">
                      <label for="cname" class="control-label col-lg-2">Nom :<span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control" id="cname" name="nom" minlength="5" type="text" value="<?php echo $nom ?>" required />
                      </div>
                    </div>
                       <div class="form-group ">
                      <label for="cname" class="control-label col-lg-2">Prenom :<span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control" id="cname" name="prenom" minlength="5" type="text" value="<?php echo $prenom ?>" required />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="cemail" class="control-label col-lg-2">CIN <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control" id="cname"  type="text" name="cin" value="<?php echo $cin ?>" required />
                      </div>
                    </div>
                       <div class="form-group ">
                      <label for="cname" class="control-label col-lg-2">Tel :<span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control" id="cname" name="tel" minlength="5" type="text" value="$tel" required />
                      </div>
                    </div>
                       <div class="form-group ">
                      <label for="cname" class="control-label col-lg-2">Date de Naissance :<span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control" id="cname" name="date" minlength="5" type="Date" value="<?php echo $date ?>" required />
                      </div>
                    </div>
                        <div class="form-group ">
                      <label for="cname" class="control-label col-lg-2">Mail :<span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control" id="cemail" name="mail" minlength="5" type="email" value="<?php echo $mail ?>" required />
                      </div>
                    </div>
                        <div class="form-group ">
                      <label for="cname" class="control-label col-lg-2">Adresse :<span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control" id="cname" name="adresse" minlength="5" type="text" value="<?php echo $ad ?>" required />
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <div class="col-lg-offset-2 col-lg-10">
                        <button class="btn btn-primary" type="submit">Enregistrer</button>
                      </div>
                    </div>
                  </form>
                </div>

              </div>
            </section>
          </div>
        </div>
      </section>
    </section>
        <!--/.row-->


                <!-- project team & activity end -->

      
  <!-- javascripts -->
  <script src="js/jquery.js"></script>
  <script src="js/jquery-ui-1.10.4.min.js"></script>
  <script src="js/jquery-1.8.3.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui-1.9.2.custom.min.js"></script>
  <!-- bootstrap -->
  <script src="js/bootstrap.min.js"></script>
  <!-- nice scroll -->
  <script src="js/jquery.scrollTo.min.js"></script>
  <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
  <!-- charts scripts -->
  <script src="assets/jquery-knob/js/jquery.knob.js"></script>
  <script src="js/jquery.sparkline.js" type="text/javascript"></script>
  <script src="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
  <script src="js/owl.carousel.js"></script>
  <!-- jQuery full calendar -->
  <<script src="js/fullcalendar.min.js"></script>
    <!-- Full Google Calendar - Calendar -->
    <script src="assets/fullcalendar/fullcalendar/fullcalendar.js"></script>
    <!--script for this page only-->
    <script src="js/calendar-custom.js"></script>
    <script src="js/jquery.rateit.min.js"></script>
    <!-- custom select -->
    <script src="js/jquery.customSelect.min.js"></script>
    <script src="assets/chart-master/Chart.js"></script>

    <!--custome script for all page-->
    <script src="js/scripts.js"></script>
    <!-- custom script for this page-->
    <script src="js/sparkline-chart.js"></script>
    <script src="js/easy-pie-chart.js"></script>
    <script src="js/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="js/jquery-jvectormap-world-mill-en.js"></script>
    <script src="js/xcharts.min.js"></script>
    <script src="js/jquery.autosize.min.js"></script>
    <script src="js/jquery.placeholder.min.js"></script>
    <script src="js/gdp-data.js"></script>
    <script src="js/morris.min.js"></script>
    <script src="js/sparklines.js"></script>
    <script src="js/charts.js"></script>
    <script src="js/jquery.slimscroll.min.js"></script>
    <script>
      //knob
      $(function() {
        $(".knob").knob({
          'draw': function() {
            $(this.i).val(this.cv + '%')
          }
        })
      });

      //carousel
      $(document).ready(function() {
        $("#owl-slider").owlCarousel({
          navigation: true,
          slideSpeed: 300,
          paginationSpeed: 400,
          singleItem: true

        });
      });

      //custom select box

      $(function() {
        $('select.styled').customSelect();
      });

      /* ---------- Map ---------- */
      $(function() {
        $('#map').vectorMap({
          map: 'world_mill_en',
          series: {
            regions: [{
              values: gdpData,
              scale: ['#000', '#000'],
              normalizeFunction: 'polynomial'
            }]
          },
          backgroundColor: '#eef3f7',
          onLabelShow: function(e, el, code) {
            el.html(el.html() + ' (GDP - ' + gdpData[code] + ')');
          }
        });
      });
    </script>

</body>

</html>
