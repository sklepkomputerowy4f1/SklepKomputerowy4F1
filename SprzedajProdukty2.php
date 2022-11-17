<html>

<head>
<link rel="stylesheet" type="text/css" href="sklepkomputerowy.css?version=1" />
<link rel="icon" type="image/x-icon" href="ikona.ico">
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
    $id = $_POST['sprzedaj'];
	$ilosc_do_sprzedazy = (int)$_POST['ilosc'];
	$query = Mysqli_Query($con, "SELECT * FROM produkty WHERE ID_Produktu='$id'");
	$calkowita_ilosc_array = mysqli_fetch_assoc($query);
	$calkowita_ilosc = $calkowita_ilosc_array['Ilosc_Produktu'];
	if ($ilosc_do_sprzedazy != NULL)
	{
	(int)$pozostala_ilosc=(int)$calkowita_ilosc-(int)$ilosc_do_sprzedazy;
	
	if ((int)$ilosc_do_sprzedazy > (int)$calkowita_ilosc )
	{
	echo "<h1 class='h1_1'>Brak takiej ilości towaru na magazynie</h1>"	;
	}
	else{
	
		if ($pozostala_ilosc > 0){
		$sql = "INSERT sprzedaze (ID_Produktu, Nazwa_Produktu, Model_Produktu, Cena_Produktu,Ilosc_S_Produktu, Data_Sprzedazy, Godzina_Sprzedazy )  SELECT ID_Produktu, Nazwa_Produktu, Model_Produktu, Cena_Produktu, '$ilosc_do_sprzedazy', '$Data', '$Godzina' FROM produkty WHERE ID_Produktu = '".$id."';";  
		$sql2 = "UPDATE produkty SET Ilosc_Produktu='$pozostala_ilosc' WHERE ID_Produktu='".$id."';";
		$result = $con->query($sql);
		$result2 = $con->query($sql2);
		echo "<h1 class='h1_1'>Pomyslnie sprzedales przedmiot</h1>";
		}

		else{
		echo "<h1 class='h1_1'>Wszystkie sztuki produktu o ID: ".$id." zostały właśnie wyprzedane</h1>";
		$sql3 = "INSERT sprzedaze (ID_Produktu, Nazwa_Produktu, Model_Produktu, Cena_Produktu,Ilosc_S_Produktu, Data_Sprzedazy, Godzina_Sprzedazy)  SELECT ID_Produktu, Nazwa_Produktu, Model_Produktu, Cena_Produktu, '$ilosc_do_sprzedazy', '$Data', '$Godzina' FROM produkty WHERE ID_Produktu = '".$id."';";  
		$result3 = $con->query($sql3);
		$query = "DELETE FROM produkty WHERE ID_Produktu='$id' ";
		$query_run = mysqli_query($con, $query);
		}
	}

}
	else {
		echo "<h1 class='h1_1'>BŁĄD - liczba produktów nie została podana </h1>";
}

}

?>