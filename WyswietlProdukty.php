<html>

<head>
<link rel="stylesheet" type="text/css" href="sklepkomputerowy.css?version=1" />
<link rel="icon" type="image/x-icon" href="ikona.ico">
</head>
<?php


$con = new mysqli("127.0.0.1","id19873543_root","hAxJ}HDtVI?3x@7V","id19873543_sklepkomputerowy4f");
 
$qq="SELECT * FROM produkty";
if($wynik2=$con->query($qq)){
	
echo "<div class='topnav'>";
echo" <a class='s' href='index.html'> Sklep Komputerowy - Strona Główna </a>";
echo "</div>";
echo "<body id='wyswietlanie'>";
echo "<div class='center'>";
echo "<table>";
echo "<tr> <th> ID </th> <th> Nazwa </th> <th>Model </th> <th> Cena (zł)</th> <th> Ilość </th> <th> Data Dodania </th> </tr> ";
while($row=$wynik2->fetch_array()){
echo "<tr>";
echo "<td>" .$row[0].  " </td></td>";
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