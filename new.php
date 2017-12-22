<html>
<head>
<link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
<form method="GET" action="receive.php">
<h1 class="center">Wprowadz dane do wykresu:</h1>
<h3 class="center">Wprowadz dane:</h3>

<?php

$idx=$_GET['ilosc_danych'];

echo "<table border=1px >";
for ($i = 0; $i < $idx; $i++){
	echo "<tr>";
		echo"<td>";
			echo '<b>Argument '.$i.':</b>';
			echo '<input type="text" name="tab1[]" name="'. $tab1[$i]. '">';
			echo '<b>Wartosc '.$i.':</b>'	;
			echo '<input type="text" name="tab2[]" name="'. $tab2[$i]. '">';
		echo"</td>";
	echo "</tr>";
}
echo '</table>';

for ($i = 0; $i < $idx; $i++){
kolory($i);
}
?>

<h3 class="center">Podaj rozmiary wykresu:</h3>

<table border=1px >
		<tr>
			<td>
				<b>Wysokosc:</b> <input type="text" name="wysokosc"/>
			</td>
		</tr>
		<tr>
			<td>
				<b>Szerokosc:</b> <input type="text" name="szerokosc"/>
			</td>
		</tr>
</table>
<?php
function kolory($i){
echo '<h3 class="center">Wybierz kolor slupka nr '.$i.':</h3>
<table border=1px  >
		<tr>
			<td width=50px style="background:#ff0000"></td>
			<td><input type="radio" name="id_kolor['.$i.']" value="0"></td>
			<td width=50px style="background:#ffff00"></td>
			<td><input type="radio" name="id_kolor['.$i.']" value="1"></td>
			<td width=50px style="background:#00ff00"></td>
			<td><input type="radio" name="id_kolor['.$i.']" value="2"></td>
		</tr>
		<tr>
			<td width=50px style="background:#00ffff"></td>
			<td><input type="radio" name="id_kolor['.$i.']" value="3"></td>
			<td width=50px style="background:#0000ff"></td>
			<td><input type="radio" name="id_kolor['.$i.']" value="4"></td>
			<td width=50px style="background:#ff00ff"></td>
			<td><input type="radio" name="id_kolor['.$i.']" value="5"></td>
		</tr>
		<tr>
			<td width=50px style="background:#ffff80"></td>
			<td><input type="radio" name="id_kolor['.$i.']" value="6"></td>
			<td width=50px style="background:#00ff80"></td>
			<td><input type="radio" name="id_kolor['.$i.']" value="7"></td>
			<td width=50px style="background:#ff80ff"></td>
			<td><input type="radio" name="id_kolor['.$i.']" value="8"></td>
		</tr>
		<tr>
			<td width=50px style="background:#80ff00"></td>
			<td><input type="radio" name="id_kolor['.$i.']" value="9"></td>
			<td width=50px style="background:#ff8040"></td>
			<td><input type="radio" name="id_kolor['.$i.']" value="10"></td>
			<td width=50px style="background:#c0c0c0"></td>
			<td><input type="radio" name="id_kolor['.$i.']" value="11"></td>
		</tr>
		<tr>
			<td width=50px style="background:#ffffff"></td>
			<td><input type="radio" name="id_kolor['.$i.']" value="12"></td>
			<td width=50px style="background:#000000"></td>
			<td><input type="radio" name="id_kolor['.$i.']" value="13"></td>
		</tr>
			
</table>';
}
?>
<p class="center"><button type="Submit">RYSUJ</button>
</body>
</form>
</html>
