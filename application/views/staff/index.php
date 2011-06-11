<html>
<head>
<title>Staff</title>
</head>
<body>
<h1>Showing Staff [Total = <?php echo $number_rows; ?>]</h1>

<?= anchor('staff/add/', 'Add new staff', array('title' => 'Add a new staff member.')); ?>
 
<p><?= $flash_message ?></p>

<table border=1 cellspacing=0>
<thead>
<tr>
<th>ACTIONS</th>
<th>ROLE</th>
<th>First</th>
<th>Last</th>
<th>Middle</th>
<th>Hash</th>
<th>Active</th>
</tr>
</thead>
<tbody>
<?php foreach ($query as $row):?>
<tr>
<td><? echo $row->staff_id;?></td>
<td><? echo $row->role_name;?></td>
<td><? echo $row->first_name;?></td>
<td><? echo $row->last_name;?></td>
<td><? echo $row->middle_name;?></td>
<td><? echo $row->password_hash;?></td>
<td><? echo $row->active;?></td>
</tr>
<?php endforeach;?>
</tbody>
</table>
</body>
<?php echo $pagination;?>
</html>