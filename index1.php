<?php	
$informathion=require('info.php');	
echo "<H1>"."Список городов:"."</H1>";

foreach ($informathion as $info){	
	echo '<p><img width="200" src="'.htmlspecialchars($info['image']).'"></p>';
	echo "Название: ". htmlspecialchars($info ['name']) .
	"<br>"."Площадь: ". htmlspecialchars(number_format($info ['square'],0, ',', ' '))."  "." кв. км. ".
	"<br>"."Часовой пояс: ".htmlspecialchars($info ['timezone']).
	"<br>"."Население: ". htmlspecialchars(number_format(($info ['population']),0, ',', ' '))."  "."чел. ".
	"<br>"."Имя мэра: ". htmlspecialchars($info ['leader']); 
}	
$countCities=0;
Foreach ($informathion as $info){	
	if (($info['population'])>=1500000){
		$countCities=$countCities+1;
	}
}
echo "<p> Население более 1,5 млн. человек в $countCities городах ";
?>

				
				