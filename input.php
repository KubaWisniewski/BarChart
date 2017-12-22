<html>
<head>
<link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
<form method="GET" action="new.php">
	<h2 class="center">Podaj ilosc danych</h2>
	<div class="center">
		<input type="text" name="ilosc_danych"/>
	</div>
	<p  class="center"><button type="Submit">WPROWADZ DANE</button>
	</br>
</form>

<form method="GET" action="receive.php">
</br>
	<p class="center">Zaznacz dane testowe</p>
	<div class="center">
		<input type="radio" name="dane_testowe" value="1">
	</div>
	<p  class="center"><button type="Submit">WYKRES TESTOWY</button>
</form>
</body>
</html>
