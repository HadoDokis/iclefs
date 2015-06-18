<?php 
?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	</head>
<body>

	<!-- 
	<img src ='https://iclefs.test.adullact.org/assets/logo.jpg' />
	<img src='https://iclefs.test.adullact.org/assets/logo-complet1.png'/>
	-->

	<h1>Réception de données France-Connect/i-clefs</h1>
	
<h2>Données issues de la connexion France Connect</h2>
<table>
	<?php foreach($_SESSION['user_info'] as $key=>$value): ?>
		<tr>
			<th><?php echo $key ?></th>
			<td><?php echo $value ?></td>
		</tr>
	<?php endforeach;?>
</table>
<h2>Données issues des fournisseurs de données </h2>

<table>
	<tr>
		<th>Fournisseur de données</th>
		<th>Type de données</th>
		<th>Valeur</th>
	</tr>
		<?php foreach($_SESSION['fd_user_info'] as $fd => $info): ?>
			<?php foreach($info as $key => $value): ?>
				<tr>
					<td><?php echo $fd ?></td>
					<td><?php echo $key ?></td>
					<td><?php echo $value ?></td>
				</tr>
			<?php endforeach;?>
		<?php endforeach;?>
	
</table>
		

</body>
</html>