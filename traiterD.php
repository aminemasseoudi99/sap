<?PHP
include "../Core/DemandeC.php";
$demandeC=new DemandeC();
if (isset($_POST["ID_D"])){
    $demandeC->traiterD($_POST["ID_D"]);
    header('Location: demande.php');
}

?>
