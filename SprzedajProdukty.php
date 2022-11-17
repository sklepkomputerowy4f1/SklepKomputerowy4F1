<html>

<head>
<link rel="stylesheet" type="text/css" href="sklepkomputerowy.css?version=1" />
<link rel="icon" type="image/x-icon" href="ikona.ico">
</head>
<?php


$con = new mysqli("127.0.0.1","id19873543_root","hAxJ}HDtVI?3x@7V","id19873543_sklepkomputerowy4f");
 
$q="SELECT * FROM produkty";

if($wynik=$con->query($q)){
	
echo "<form action='SprzedajProdukty2.php' method='POST'>";	
echo "<div class='topnav'>";
echo" <a class='s' href='index.html'> Sklep Komputerowy - Strona Główna </a>";
echo "</div>";
echo "<body id='wyswietlanie'>";
echo "<div class='center' >";	
echo "<p>Podaj ilosc produktów do sprzedaży:  &nbsp&nbsp    <input type='number' class='numer2 'id='number' name='ilosc' min='1'> ";
echo "&nbsp&nbsp&nbsp&nbsp<input type='submit' name='przycisk' id='sp' class='submit' value='Sprzedaj produkt'>";
echo "<table>";
echo "<tr> <th> </th> <th> ID </th> <th> Nazwa </th> <th>Model</th> <th>  Ilość</th> <th> Cena (zł)</th> <th> Data Dodania </th> </tr> ";
while($row=$wynik->fetch_array()){
echo "<tr>";
echo "<td> <input type='radio' name='sprzedaj' value='" .$row["ID_Produktu"]."' >  </td>";
echo "<td>" .$row[0].  " </td>";
echo "<td>" .$row[1].  "</td>";
echo "<td>" .$row[2].  "</td>";
echo "<td>" .$row[3].  "</td>";
echo "<td>" .$row[4]. "</td>";
echo "<td>" .$row[5]. "</td>";
echo "</tr>";
}
echo "</table>";
}
else{
echo $con->errno . " " . $con->error;}
echo "<br><br>";






?>

</html>