<?php 
?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>

<header style="padding-left: 18%;
padding-right: 18%;
margin-top: 1%;
margin-bottom:50px;
border-bottom: 1px solid black;
height: 50px;
width: 100%;">
  <img style="vertical-align: top;
    height:80px;
    margin-top: 5px;" src="http://iclefs.test.adullact.org/assets/logo.jpg">
  <img style="vertical-align: top;
    float: right;
    margin-top: -48px;
    height:160px;" src="http://iclefs.test.adullact.org/assets/logo-complet1.png" class="franceconnect">
</header>
	
	<h1>Réception de données France-Connect/i-clefs</h1>
	
<?php foreach($info as $id_fd => $info_fd) : ?>
<h2><?php echo $info_fd['name']?></h2>	
	
<table>
	<tr>
		<th>Type de données</th>
		<th>Valeur</th>
	</tr>
		<?php foreach($info_fd['data'] as  $info_data): ?>
				<tr>
					<td><?php echo $info_data[0] ?></td>
					<td>
						<?php if(preg_match("#^https?://#",$info_data[1])) :?>
							<a href='<?php echo $info_data[1] ?>'><?php echo $info_data[1] ?></a>
						<?php else:?>
							<?php echo $info_data[1] ?>
						<?php endif;?>
					</td>
				</tr>
		<?php endforeach;?>
	
</table>

<?php endforeach;?>
		

</body>
</html>