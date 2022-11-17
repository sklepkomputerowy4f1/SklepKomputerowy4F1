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
    $id = $_POST['dodaj'];
	$DodajCzyUsun = $_POST['DodajCzyUsun'];
	$ilosc_do_zmiany = (int)$_POST['ilosc'];
	$Dodano="Dodano";
	$Usunieto="Usunieto";
	
	$query = Mysqli_Query($con, "SELECT * FROM produkty WHERE ID_Produktu='$id'");
	$Ilosc_Prodoktow_array = mysqli_fetch_assoc($query);
	$Ilosc_Produktu = $Ilosc_Prodoktow_array['Ilosc_Produktu'];
	if ($DodajCzyUsun == 'Dodaj')
	{
	(int)$Nowa_Ilosc = (int)$Ilosc_Produktu + (int)$ilosc_do_zmiany;

	if ($ilosc_do_zmiany != NULL)
	{

		$sql = "INSERT archiwum (ID_Produktu, Nazwa_Produktu, Model_Produktu, Cena_Produktu,Ilosc_Produktu, Data_Zmiany, Godzina_Zmiany, Dodano_Usunieto )  SELECT ID_Produktu, Nazwa_Produktu, Model_Produktu, Cena_Produktu, '$ilosc_do_zmiany', '$Data', '$Godzina', '$Dodano' FROM produkty WHERE ID_Produktu = '".$id."';";  
		$sql2 = "UPDATE produkty SET Ilosc_Produktu='$Nowa_Ilosc' WHERE ID_Produktu='".$id."';";
		$result = $con->query($sql);
		$result2 = $con->query($sql2);
		echo "<h1 class='h1_1'>Pomyślnie dodałeś '".$ilosc_do_zmiany."' sztuk wybranego produktu </h1>";
	
	}
	else {
		echo "<h1 class='h1_1'>BŁĄD - liczba produktów nie została podana</h1>";
	}
	}
	else if ($DodajCzyUsun == 'Usun')
	{
	(int)$Nowa_Ilosc = (int)$Ilosc_Produktu - (int)$ilosc_do_zmiany;
	
	if ($ilosc_do_zmiany != NULL)
	{
		if ($ilosc_do_zmiany > $Ilosc_Produktu)
		{
			echo "<h1 class='h1_1'>BŁĄD - podałeś zbyt dużą liczbę produktów od usunięcia</h1>";
		}
		else{
		$sql = "INSERT archiwum (ID_Produktu, Nazwa_Produktu, Model_Produktu, Cena_Produktu,Ilosc_Produktu, Data_Zmiany, Godzina_Zmiany, Dodano_Usunieto )  SELECT ID_Produktu, Nazwa_Produktu, Model_Produktu, Cena_Produktu, '$ilosc_do_zmiany', '$Data', '$Godzina', '$Usunieto' FROM produkty WHERE ID_Produktu = '".$id."';";  
		$sql2 = "UPDATE produkty SET Ilosc_Produktu='$Nowa_Ilosc' WHERE ID_Produktu='".$id."';";
		$result = $con->query($sql);
		$result2 = $con->query($sql2);
		echo "<h1 class='h1_1'>Pomyślnie usunąłeś '".$ilosc_do_zmiany."' sztuk wybranego produktu</h1>";
		}
	}
	else {
		echo "<h1 class='h1_1'>BŁĄD - liczba produktów nie została podana</h1>";
	}
	
	
	}
	else {
		echo "<h1 class='h1_1'>BŁĄD - Informacja o dodaniu lub usunięciu nie została podana</h1>";
		}
}
?>