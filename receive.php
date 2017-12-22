<?php	
$wys=$_GET['wysokosc'];
$szer=$_GET['szerokosc'];
$tab1=$_GET['tab1'];
$tab2=$_GET['tab2'];
$id_kolor=$_GET['id_kolor'];
$dane_testowe=$_GET['dane_testowe'];
$test=false;

if($dane_testowe==1){
	for($i=0;$i<6;$i++){
		$tab[$i]=rand(1,60);
	} 
	$szer_test=500;
	$wys_test=500;
	$id_kolor_test=10;
	$test=true;
	wykres($tab,$szer_test,$wys_test,$id_kolor_test,$test);
}
else{
	for($i=0;$i<count($tab2);$i++){
		$tab=array_push_assoc($tab,$tab1[$i],$tab2[$i]);
	}
	wykres($tab,$szer,$wys,$id_kolor,$test);
}

function array_push_assoc($array, $key, $value){
    $array[$key] = $value;
    return $array;
}

function wykres($tab,$szerokosc,$wysokosc,$kolor_wykresu,$test){	
	header("Content-type: image/png");
	$im=imagecreate($szerokosc,$wysokosc);
	$color=imagecolorallocate($im,255,255,255);
	//Kolory slupkow
	$kolor[0] = imagecolorallocate($im, 255,0,0);
	$kolor[1] = imagecolorallocate($im, 255, 255, 0);
	$kolor[2] = imagecolorallocate($im, 0, 255, 0);
	$kolor[3] = imagecolorallocate($im, 0, 255, 255);
	$kolor[4] = imagecolorallocate($im, 0, 0, 255);
	$kolor[5] = imagecolorallocate($im, 255, 0, 255);
	$kolor[6] = imagecolorallocate($im, 255, 255, 128);
	$kolor[7] = imagecolorallocate($im, 0, 255, 128);
	$kolor[8] = imagecolorallocate($im, 128, 255, 255);
	$kolor[9] = imagecolorallocate($im, 128, 128, 255);
	$kolor[10] = imagecolorallocate($im, 255, 128, 64);
	$kolor[11] = imagecolorallocate($im, 192, 192, 192);
	$kolor[12] = imagecolorallocate($im, 255, 255, 255);
	$kolor[13] = imagecolorallocate($im, 0, 0, 0);
	//Kolory efektu 3D
	$kolor_c[0] = imagecolorallocate($im, 128,0,0);
	$kolor_c[1] = imagecolorallocate($im, 128, 128, 0);
	$kolor_c[2] = imagecolorallocate($im, 0, 128, 0);
	$kolor_c[3] = imagecolorallocate($im, 0, 128, 128);
	$kolor_c[4] = imagecolorallocate($im, 0, 0, 128);
	$kolor_c[5] = imagecolorallocate($im, 128, 0, 128);
	$kolor_c[6] = imagecolorallocate($im, 128, 128, 64);
	$kolor_c[7] = imagecolorallocate($im, 0, 64, 64);
	$kolor_c[8] = imagecolorallocate($im, 0, 128, 255);
	$kolor_c[9] = imagecolorallocate($im, 0, 64, 128);
	$kolor_c[10] = imagecolorallocate($im, 128, 64, 0);
	$kolor_c[11] = imagecolorallocate($im, 128, 128, 128);
	$kolor_c[12] = imagecolorallocate($im, 255, 255, 255);
	$kolor_c[13] = imagecolorallocate($im, 0, 0, 0);
	
	$ilosc_elementow=count($tab);
	$suma=0;
	foreach($tab as $klucz=>$wart){
		$suma+=$wart;
	}
	
	//Wyliczanie wartosci procentowych podanych danych
	foreach($tab as $klucz=>$wart){
		$procenty[$klucz]=($wart/$suma)*100;
	}
	
	$max=max($tab);	
	$miejsce_na_skale=30;
	$odlegloscOdLewejKrawedzi=40;
	$miejsce_na_legende=30;
	$czcionka_podpisy=5;
	$czcionka_skala=2;
	
	$w=($szerokosc-$odlegloscOdLewejKrawedzi)/$ilosc_elementow;
	
	$szer_slupka=0.75*$w;
	$odstep=0.25*$w;
	
	$wysokosc_robocza=$wysokosc-$miejsce_na_legende;
	//Linie wyznaczajce wykres
	imageline($im, 0, $wysokosc_robocza, $szerokosc, $wysokosc_robocza, $kolor[13]);
	imageline($im,$miejsce_na_skale, 0,$miejsce_na_skale, $wysokosc_robocza, $kolor[13]);
	$skok_x=($wysokosc_robocza)/10;
	$skok=$skok_x;
	$i=1;
	
	//Rysowanie legendy i skali 
	for ($j=0; $j<10; $j++) {
        imageline($im,$miejsce_na_skale, $wysokosc_robocza-$skok, $szerokosc, $wysokosc_robocza-$skok, $kolor[13]);
        imagestring($im,$czcionka_skala, 0, $wysokosc_robocza-$skok,($i*10)."%", $kolor[13]);
		++$i;
		$skok+=$skok_x;
    }
	//Rysowanie slupkow
	if($test==false){
		for ($j=1; $j<=floor($odstep*0.5); $j++) {
		//Ryswoanie efektu 3D
			$x=0;$i=0;
			foreach($tab as $klucz => $wart) {
				$wys_slupka=($wysokosc_robocza*($procenty[$klucz]/100));
				imagefilledrectangle($im, $odlegloscOdLewejKrawedzi+$x+$j, $wysokosc_robocza-$wys_slupka-$j, $odlegloscOdLewejKrawedzi+$szer_slupka+$x+$j, $wysokosc_robocza-$j, $kolor_c[$kolor_wykresu[$i]]);
				$x+=($odstep+$szer_slupka);       
				$i++;
			}
		}
	$x=0;$i=0;
		foreach($tab as $klucz =>$wart){
			$wys_slupka=($wysokosc_robocza*($procenty[$klucz]/100));
			imagefilledrectangle($im,$odlegloscOdLewejKrawedzi+$x,$wysokosc_robocza-$wys_slupka,$odlegloscOdLewejKrawedzi+$szer_slupka+$x,$wysokosc_robocza,$kolor[$kolor_wykresu[$i]]);
			$x+=($odstep+$szer_slupka);
			$i++;
		}
	}
	else{
	for ($j=1; $j<=floor($odstep*0.5); $j++) {
		//Rysowanie efektu 3D
		$x=0;$i=0;
			foreach($tab as $klucz => $wart) {
				$wys_slupka=($wysokosc_robocza*($procenty[$klucz]/100));
				imagefilledrectangle($im, $odlegloscOdLewejKrawedzi+$x+$j, $wysokosc_robocza-$wys_slupka-$j, $odlegloscOdLewejKrawedzi+$szer_slupka+$x+$j, $wysokosc_robocza-$j, $kolor_c[$kolor_wykresu]);
				$x+=($odstep+$szer_slupka);       
				$i++;
			}	
		}
	$x=0;
		foreach($tab as $klucz =>$wart){
			$wys_slupka=($wysokosc_robocza*($procenty[$klucz]/100));
			imagefilledrectangle($im,$odlegloscOdLewejKrawedzi+$x,$wysokosc_robocza-$wys_slupka,$odlegloscOdLewejKrawedzi+$szer_slupka+$x,$wysokosc_robocza,$kolor[$kolor_wykresu]);
			$x+=($odstep+$szer_slupka);
		}
	}
	
	//Rysownaie podpisow do slupkow
	$x=0;
		foreach($tab as $klucz =>$wart){
			imagestring($im,$czcionka_podpisy,$odlegloscOdLewejKrawedzi+$x+($szer_slupka*0.5),$wysokosc_robocza+5,$klucz,$kolor[13]);	  	
			$x+=($odstep+$szer_slupka);
		}
	imagejpeg($im);
	imagedestroy($im);	
}
?>
