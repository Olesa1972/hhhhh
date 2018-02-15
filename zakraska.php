
<link rel="stylesheet" href="style.css">
<?php	
$informathion=require('info.php');	
echo "<H1>"."Список городов:"."</H1>";
Foreach ($informathion as $info){	
	if (($info['population'])>2000000){
			echo '<div class="data">';
	echo '<p><img width="200" src="'.htmlspecialchars($info['image']).'"></p>';

	echo "Название: ". htmlspecialchars($info ['name']) .
	"<br>"."Часовой пояс: ".htmlspecialchars($info ['timezone']).
	"<br>"."Население: ". htmlspecialchars(number_format(($info ['population']),0, ',', ' '))."  "."чел. ".
	"<br>"."Имя мэра: ". htmlspecialchars($info ['leader']); 
	echo '</div>';
	} else {
			
	echo '<p><img width="200" src="'.htmlspecialchars($info['image']).'"></p>';
	echo "Название: ". htmlspecialchars($info ['name']) .
	"<br>"."Часовой пояс: ".htmlspecialchars($info ['timezone']).
	"<br>"."Население: ". htmlspecialchars(number_format(($info ['population']),0, ',', ' '))."  "."чел. ".
	"<br>"."Имя мэра: ". htmlspecialchars($info ['leader']); 
			
	}
}


?>

				
				