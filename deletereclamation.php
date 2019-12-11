<?PHP
include "../Core/ReclamationC.php";
$reclamationC=new ReclamationC();
if (isset($_POST["ID_R"])){
    $reclamationC->supprimerReclamation($_POST["ID_R"]);
    header('Location: reclamation.php');
}

?>
