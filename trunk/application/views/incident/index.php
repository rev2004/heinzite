<html>
<head>
<title>Records for <?php echo $user; ?></title>
</head>
<body>
	<h1>Showing <?php echo $user; ?>'s records for <?php echo $current_date; ?></h1>
	<table>
	<?php foreach ($query as $row):?>
		<?php foreach ($row as $cell):?>
			<td><?php echo $cell; ?></td>
		<?php endforeach;?>
	<?php endforeach;?>
</table>
</body>
</html>