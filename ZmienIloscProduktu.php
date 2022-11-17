<html>

<head>
<link rel="stylesheet" type="text/css" href="sklepkomputerowy.css?version=1" />
</head>
<?php


$con = new mysqli("127.0.0.1","id19873543_root","hAxJ}HDtVI?3x@7V","id19873543_sklepkomputerowy4f");
 
$q="SELECT * FROM produkty";

if($wynik=$con->query($q)){
echo "<form action='ZmienIloscProduktu2.php' method='POST'>";	
echo "<div class='topnav'>";
echo" <a class='s' href='index.html'> Sklep Komputerowy - Strona Główna </a>";
echo "</div>";
echo "<body id='wyswietlanie'>";
echo "<div class='center' >";	
echo "<br><br> Wybierz co chcesz zrobic:<br>";
echo "<input type='radio' name='DodajCzyUsun' value='Dodaj'>Dodaj ilosc produktu<br>";
echo "<input type='radio' name='DodajCzyUsun' value='Usun'>Usun ilosc produktu<br><br>";
echo "Podaj ilosc: <input type='number' id='number' class='numer2' name='ilosc' min='1'><br><br>";
echo "<input type='submit' name='przycisk' class='submit' value='Dodaj produkt'>";
echo "<table>";
	
echo "<table>";
echo "<tr> <th> </th> <th> ID </th> <th> Nazwa </th> <th>Model</th> <th>  Ilość</th> <th>Cena (zł) </th> <th> Data Dodania </th> </tr> ";
while($row=$wynik->fetch_array()){
echo "<tr>";
echo "<td><input type='radio' name='dodaj' value='" .$row["ID_Produktu"]."' >   </td>";
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





?>

</html>