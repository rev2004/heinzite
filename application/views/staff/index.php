<html>
<head>
<title>Staff</title>
</head>
<body>
<h1>Showing Staff [Total = <?php echo $number_rows; ?>]</h1>

<?php echo anchor('staff/add/', 'Add new staff', array('title' => 'Add a new staff member.')); ?>
 
<p><?php echo $flash_message ?></p>

<table border=1 cellspacing=0>
<thead>
<tr>
<th>ACTIONS</th>
<th>ROLE</th>
<th>First</th>
<th>Last</th>
<th>Middle</th>
<th>Username</th>
<th>Hash</th>
<th>Active</th>
</tr>
</thead>
<tbody>
<?php foreach ($query as $row):?>
<tr>

<td>
<?php echo anchor('staff/edit/'. ltrim($row->staff_id,'0'), 'EDIT', 'title="Edit Record"');?>
&nbsp;
<?php echo anchor('staff/delete/'. ltrim($row->staff_id,'0'), 'DELETE', 'title="Delete Record"');?>
</td>
<td><?php echo $row->role_name;?></td>
<td><?php echo $row->first_name;?></td>
<td><?php echo $row->last_name;?></td>
<td><?php echo $row->middle_name;?></td>
<td><?php echo $row->username;?></td>
<td><?php echo $row->password_hash;?></td>
<td><?php echo $row->active;?></td>
</tr>
<?php endforeach;?>
</tbody>
</table>
</body>
<?php echo $pagination;?>
</html>