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
    <title>Liste des Rendez-Vous </title>

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

                <!--app-content open-->
        
                    


                  
    <!--main content start-->
<<!doctype html>
<html class="no-js" lang="en">
<?php include_once"../Core/RdvC.php";
$rdvC = new RdvC();
$dd= date_create()->format('Y-m-d');
$listerdv = $rdvC->afficherRDVs();
?>

        <!--aside closed-->

                <!--app-content open-->
        <div class="app-content">
          <section class="section">

                        <!--page-header open-->
            <div class="page-header">
              <h4 class="page-title">Liste des Rendez-Vous</h4>


            </div>
            <div class="breadcome-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="breadcome-list">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <div class="breadcomb-wp">
                                    <div class="breadcomb-icon">
                                        <i class="icon nalika-eye"></i>
                                    </div>
                                    <div class="breadcomb-ctn">
                                        <div class="breadcome-heading" style="margin-left: 40%;">
                                        
                                    </div>
                                    
                                      
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <div class="breadcomb-report">
                                    <!--<form role="search" class="" method="POST" action="rechercher_produit.php">
                                        <input name="search" type="text" placeholder="Rechercher Produits.." class="form-control" style="width: 40%;margin-left: 40%;color: white;">
                                        <button type="submit" class="btn btn-custon-four btn-default" style="position: absolute; top: 7%; left: 40%;margin-left: 30%;border: none;background-color:;" ><i class="fa fa-search"></i></button>
                                    </form>-->
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  
<br>
<br>      <!--page-header closed-->

            <!--page-header closed-->

  <br>
  <br><br>                     

                            <form action="RDVBACK.php" method="GET">
                              <div style="display: flex;margin-bottom:10px;">
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
                          </form>
                            <table style="width: 100%">
                               <tr>
                                    <th>Date depot rdv</th>
                                    <th>Date rdv</th>
                                    <th>Sujet rdv</th>
                                    <th>Etat rdv </th>
                                 

                                </tr>


                                <?PHP

                                if (isset($_GET["search"]) && $_GET["search"]!=""){

                                //  var_dump($_GET["cin"]);

                                  $listerdv=$rdvC->RechercheRDV($_GET["search"]);

                                }
                                foreach($listerdv as $row){
                                if ($dd >= $row['NOW_RDV']) {
                                  if($row['ETAT_RDV'] == 'en attente'){

                                     ?>
                                                                   <tr style="background-color:#3B6B9A;">

                                   <?PHP } else if($row['ETAT_RDV'] == "Acceptee") {
                                      ?>

                                                                   <tr style="background-color:#365D84;">
                                       <?php }      ?>
                                    <td><?PHP echo $row['NOW_RDV']; ?></td>
                                    <td><?PHP echo $row['DATE_RDV']; ?></td>
                                    <td><?PHP echo $row['OBJET_RDV']; ?></td>
                                    <td><?PHP echo $row['ETAT_RDV']; ?></td>
                                    

                                    <td> <form method="post" action="accepterRDV.php">
                                            <input type="hidden" value="<?PHP echo $row['ID_RDV']; ?>" name="ID_RDV">
                                        <button class="btn btn-sm" style="background-color: #85ffc7;"><i class="fa fa-check-circle"></i></button>
                                        </form>
                                    </td>

                                    <td> <form method="post" action="refuserRDV.php">
                                            <input type="hidden" value="<?PHP echo $row['ID_RDV']; ?>" name="ID_RDV">
                                            <button class="btn btn-sm" style="background-color: #e8ddb5;" ><i class="
fa fa-times-circle"></i></button>
                                        </form>
                                    </td>

                                    <!-- <button data-toggle="tooltip" title="Trash" ><i class="fa fa-trash-o" aria-hidden="true" ></i></button>-->
                                    <!-- <a href="deletedemande.php?sup=<?php //echo $row['ID_D'];?>" class="fa fa-trash-o"></a>-->
                                    <td> <form method="post" action="deleteRDV.php">
                                            <button data-toggle="tooltip" title="Trash" class="btn btn-sm" style="background-color: #fe5f55;"><i class="fa fa-trash-o" aria-hidden="true" ></i></button>
                                            <!-- <input type="submit" name="supprimer" class="nalika-delete-button" value="Supprimer">-->
                                            <input type="hidden" value="<?PHP echo $row['ID_RDV']; ?>" name="ID_RDV">
                                        </form>

                                    </td>
                                    </tr>

                                <?php }}?>
                            </table>
  




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