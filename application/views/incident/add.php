<html>
<head>
<title>Add <?php echo $record_type; ?> Record</title>
</head>
<body>
	<h1>Adding a new record of type <?php echo $record_type; ?></h1>
	<ul>
	<?php foreach ($form as $key=>$item):?>
		<li><?echo $key;?><?php echo $item; ?></li>
	<?php endforeach;?>
	</ul>
</body>
</html>