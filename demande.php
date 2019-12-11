<!DOCTYPE html>
<html lang="en">
<?php
	  session_start();
	  if (empty($_SESSION))
	  {header("location:login.php");}
	?>	
<!-- Mirrored from www.spruko.com/demo/splite/emptypage.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 10 Feb 2019 18:35:07 GMT -->
<head>

		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Liste des Demandes </title>

		<!--favicon -->
		<link rel="icon" href="favicon.html" type="image/x-icon"/>

		<!--Bootstrap.min css-->
		<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">

		<!--Icons css-->
		<link rel="stylesheet" href="assets/css/icons.css">

		<!--Style css-->
		<link rel="stylesheet" href="assets/css/style.css">

		<!--mCustomScrollbar css-->
		<link rel="stylesheet" href="assets/plugins/scroll-bar/jquery.mCustomScrollbar.css">

		<!--Sidemenu css-->
		<link rel="stylesheet" href="assets/plugins/toggle-menu/sidemenu.css">

	</head>

	<body class="app ">
	<?php require 'header.php' ?>


	<div class="app-content">
					<section class="section">

                        <!--page-header open-->
						<div class="page-header">
							<h4 class="page-title">Liste des demandes</h4>


						</div>
             <div class="breadcome-heading" style="margin-left: 40%;">
                                        
                                    </div>
                                    <a data-toggle="tooltip" title="Télécharger PDF" href="TelechargerDemande.php" class="fa fa-download fa-2x" target="_blank" style="color: black;">
                                        <!--<button data-toggle="tooltip" data-placement="left"  title="Telecharger Liste Produits PDF" class="btn"><i class="icon nalika-download"></i></button>-->
                                    </a>

						<!--page-header closed-->

<?php include "../Core/DemandeC.php";
    $demandeC = new DemandeC();
$dd= date_create()->format('Y-m-d');
    $listedemande = $demandeC->afficherDemande();
?>


	<div class="product-status mg-b-30" style="margin-top:10px">

            <div class="container-fluid" style="margin-top:20px">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-status-wrap">

                           <br>
                           <br>
                           <br>
                           <br>

  <form action="demande.php" method="GET" style="width: 100%;>

  <div style="display: flex;margin-bottom:10px;">
<div class=" mb-2" style="margin-left:6px; margin-top:5px;">
   <div class="section-admin container-fluid res-mg-t-15" style="margin-top:10px;">
      <div class="row admin text-center" style="margin-top:50px;">
          <div class="col-md-12">
              <div class="row">
                  <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                      <div class="admin-content analysis-progrebar-ctn" style="background-color:white;color:black;"><div class="stats-icon pull-right">
                              <i class="fa fa-street-view" aria-hidden="true"></i>
                          </div>
                          <h4 class="text-left text-uppercase" style="color:black;"><b>Sommee Partenariat</b></h4>
                          <div class="row vertical-center-box vertical-center-box-tablet">
                              <div class="col-xs-9 cus-gh-hd-pro">
                                  <h2 class="text-right no-margin" style="color:green;font-size:20px;"><?php $ClientFidele=$demandeC->NBRPART();
                                  {
                                    foreach($ClientFidele as $row){
                                      echo $row["nbr"];
                                    }
                                  }?></h2>
                              </div>
                          </div>
                          <div class="progress progress-mini">
                              <div style="width: 100%;" class="progress-bar bg-green"></div>
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" style="margin-bottom:1px;">
                      <div class="admin-content analysis-progrebar-ctn res-mg-t-30" style="background-color:white;color:black;">
                        <div class="stats-icon pull-right">
                              <i class="fa fa-star-o" aria-hidden="true"></i>
                          </div>
                          <h4 class="text-left text-uppercase" style="color:black;"><b>Somme sponsoring</b></h4>
                          <div class="row vertical-center-box vertical-center-box-tablet">
                              <div class="col-xs-9 cus-gh-hd-pro">
                                  <h2 class="text-right no-margin" style="color:#3B6B9A;font-size:20px; "><?php $ClientFidele=$demandeC->NBRSPON();
                                  {
                                    foreach($ClientFidele as $row){
                                      echo $row["nbr"];
                                    }
                                  }?></h2>
                              </div>
                          </div>
                          <div class="progress progress-mini">
                              <div style="width: 100%;" class="progress-bar bg-blue"></div>
                          </div>
                      </div>
                  </div>



              </div>
          </div>
      </div>
  </div>

        <div class="product-status mg-b-30" style="margin-top:10px">
            <div class="container-fluid" style="margin-top:20px">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-status-wrap">
                            

  <form action="demandeBACK.php" method="GET">
    <div style="display: flex;margin-bottom:10px;">

<div class=" mb-2" style="margin-left:6px; margin-top:5px;">
  <div class="input-group mb-3" >
  <input type="text" class="form-control"placeholder="Search..." aria-label="" aria-describedby="basic-addon1" style="color:black;" name="search">
</div>
<div class=" mb-2" style="margin-left:6px; margin-top:5px;">
   <input type="submit" name="recherche" value="OK" style="
background-color:#6090;
border-style: outset;

border-radius: 5px;
border-color: black;

padding: 6px;
background-color: rgb(255, 255, 255); " >

</div>
  

</div>
</div>



</div>
</div>
</form>


                            <table style="width: 100%;">
                                <tr>
                                    <th>Date de la demande </th>
                                    <th>Nom groupe</th>
                                    <th>Numero tel </th>
                                    <th>Objet</th>
                                    <th>Details demande</th>
                                    <th>Etat demande</th>


                                </tr>


                                <?PHP

                                if (isset($_GET["search"]) && $_GET["search"]!=""){

                                //  var_dump($_GET["cin"]);

                                	$listedemande=$demandeC->RechercheDemande($_GET["search"]);

                                }
                                    foreach($listedemande as $row){
                                        if ($dd>= $row['DATE_DEMANDE']){

                                          if($row['ETAT_D'] == 'en attente'){

                                             ?>
                                                                           <tr style="background-color:white; color: black;">

                                           <?PHP } else if($row['ETAT_D'] == "Traitee") {
                                              ?>

                                                                           <tr style="background-color:#008B8B;color: black;">
                                               <?php }      ?>

                                    <td><?PHP echo $row['DATE_DEMANDE']; ?></td>
                                    <td><?PHP echo $row['NOM_D']; ?></td>

                                    <td><?PHP echo $row['NUM_D']; ?></td>
                                    <td><?PHP echo $row['OBJET_D']; ?></td>

                                    <td><?PHP echo $row['DETAILS_D']; ?></td>
                                    <td><?PHP echo $row['ETAT_D']; ?></td>


                                    <td> <form method="post" action="traiterD.php">
                                            <button class="btn btn-sm" style="background-color: #85ffc7;" type="submit"><i class="fa fa-check-circle"></i></button>
                                            <input type="hidden" value="<?PHP echo $row['ID_D']; ?>" name="ID_D">
                                        </form>
                                    </td>
                                       <!-- <button data-toggle="tooltip" title="Trash" ><i class="fa fa-trash-o" aria-hidden="true" ></i></button>-->
                                       <!-- <a href="deletedemande.php?sup=<?php //echo $row['ID_D'];?>" class="fa fa-trash-o"></a>-->
                                    <td> <form method="post" action="deletedemande.php">
                                            <button data-toggle="tooltip" title="Trash" class="btn  btn-sm" style="background-color:#fe5f55;" ><i class="fa fa-trash-o" aria-hidden="true" ></i></button>
                                           <!-- <input type="submit" name="supprimer" class="nalika-delete-button" value="Supprimer">-->
                                            <input type="hidden" value="<?PHP echo $row['ID_D']; ?>" name="ID_D">
                                        </form>

                                    </td>
                                </tr>

                                <?php } }?>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>			



</section>
</div>




		<!-- Back to top -->
		<a href="#top" id="back-to-top" ><i class="fa fa-angle-up"></i></a>

		<!--Jquery.min js-->
		<script src="assets/js/jquery.min.js"></script>

		<!--popper js-->
		<script src="assets/js/popper.js"></script>

		<!--Tooltip js-->
		<script src="assets/js/tooltip.js"></script>

		<!--Bootstrap.min js-->
		<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

		<!-- Jquery star rating-->
		<script src="assets/plugins/rating/jquery.rating-stars.js"></script>

		<!--Jquery.nicescroll.min js-->
		<script src="assets/plugins/nicescroll/jquery.nicescroll.min.js"></script>

		<!--Scroll-up-bar.min js-->
		<script src="assets/plugins/scroll-up-bar/dist/scroll-up-bar.min.js"></script>

		<!--mCustomScrollbar js-->
		<script src="assets/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js"></script>

		<!--Sidemenu js-->
		<script src="assets/plugins/toggle-menu/sidemenu.js"></script>

		<!--Scripts js-->
		<script src="assets/js/scripts.js"></script>
		<script src="assets/js/jquery.showmore.js"></script>

	</body>

<!-- Mirrored from www.spruko.com/demo/splite/emptypage.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 10 Feb 2019 18:35:07 GMT -->
</html>