<html>

<head>
<link rel="stylesheet" type="text/css" href="sklepkomputerowy.css?version=1" />
</head>
<?php
session_start();
$con = mysqli_connect("localhost","id19873543_root","hAxJ}HDtVI?3x@7V","id19873543_sklepkomputerowy4f");

if(isset($_POST['przycisk']))
{
		echo "<div class='topnav'>";
echo" <a class='s' href='index.html'> Sklep Komputerowy - Strona Główna </a>";
echo "</div>";
echo "<body id='wyswietlanie'>";
	date_default_timezone_set('Europe/Warsaw');
	$Godzina=date('H:i');
	$Data=date("Y-m-d");
    $id = $_POST['usun'];
	$Usunieto="Usunieto";
	$sql = "INSERT archiwum (ID_Produktu, Nazwa_Produktu, Model_Produktu, Cena_Produktu,Ilosc_Produktu, Data_Zmiany, Godzina_Zmiany, Dodano_Usunieto ) SELECT ID_Produktu, Nazwa_Produktu, Model_Produktu, Cena_Produktu, Ilosc_Produktu, '$Data', '$Godzina', '$Usunieto' FROM produkty WHERE ID_Produktu = '".$_POST['usun']."';";  
	$result = $con->query($sql);
	


	echo "<h1 class='h1_1'> Poprawnie usunięto produkt o ID: ".$id."</h1>";
	
    $query = "DELETE FROM produkty WHERE ID_Produktu='$id' ";
    $query_run = mysqli_query($con, $query);

}

?>