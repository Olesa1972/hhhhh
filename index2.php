<?php	
$dbParams=require(
	'db.php'
);
$db=new PDO ( 
	"mysql:host=localhost;dbname=".$dbParams['database'].";charset=utf8", 
	$dbParams['username'],
	$dbParams['password']
);
$patientsSQL=('
	SELECT `patient`.`lastName`,`patient`.`firstName`,`patient`.`patronymicName` FROM `patient`
	');
	
$values=[];	
if(isset($_GET['Search'])){
	$patientsSQL .= '
	WHERE `lastName` LIKE :value or `firstName` LIKE :value or `patronymicName` LIKE :value
	ORDER BY `lastName`
	';
	$values['value']='%'.$_GET['Search'].'%';
}
$patientsQuery=$db
	->prepare($patientsSQL);
$patientsQuery
	->execute($values);
$patients=$patientsQuery
	->fetchAll(PDO::FETCH_ASSOC);
?>
<html>
	<body>
		<form action="index2.php" method="GET">
			<label>ФИО пациента: 
				<input type="text" name="Search" value="<?php
					if(isset($_GET['Search'])) {
						echo htmlspecialchars($_GET['Search']);
					}
				?>">
			</label>	
			<input type="submit" value="Найти">			
		</form>
		<ul>
			<?php foreach ($patients as $patient) { ?>			
				<li><?= htmlspecialchars($patient['lastName'].' '.$patient['firstName'].' '.$patient['patronymicName']).'<br>'?></li>			
			<?php } ?>	
		</ul>		
	</body>
</html>