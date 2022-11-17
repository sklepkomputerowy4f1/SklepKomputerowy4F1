<html>

<head>
<link rel="stylesheet" type="text/css" href="sklepkomputerowy.css?version=1" />
<link rel="icon" type="image/x-icon" href="ikona.ico">
</head>
<?php
$Nazwa_P=$_GET["Nazwa_P"];
$Model_P=$_GET["Model_P"];
$Cena_P=$_GET["Cena_P"];
$Ilosc_P=$_GET["Ilosc_P"];
$Data=date("Y-m-d");

$con = new mysqli("127.0.0.1","id19873543_root","hAxJ}HDtVI?3x@7V","id19873543_sklepkomputerowy4f");
 
 
$q="INSERT INTO produkty (Nazwa_Produktu, Model_Produktu, Cena_Produktu, Ilosc_Produktu, Data_Dodania) VALUES ('".$Nazwa_P."' , '".$Model_P."', '".$Cena_P."', '".$Ilosc_P."', '".$Data."' ); ";
echo "<div class='topnav'>";
echo" <a class='s' href='index.html'> Sklep Komputerowy - Strona Główna </a>";
echo "</div>";
echo "<body id='wyswietlanie'>";
echo "<br><br><h1 class='h1_1'>Pomyślnie dodano nowy przedmiot do asortymentu sklepu. </h1>";

$wynik=$con->query($q)

?>

</html>