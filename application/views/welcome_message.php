<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
</head>
<body>

<h1>Welcome to Heinzite!</h1>

<ul>
<li>
<?php echo anchor('incident', 'Incidents', 'title="View Incidents"');?>
&nbsp;
<?php echo anchor('incident/add/lnp', 'New LNP', 'title="New Incident"');?>
&nbsp;
<?php echo anchor('incident/add/lidb', 'New LIDB', 'title="New Incident"');?>
&nbsp;
<?php echo anchor('incident/add/other', 'New Other', 'title="New Incident"');?>
</li>
<li><?php echo anchor('department', 'Departments', 'title="View Departments"');?>
&nbsp;
<?php echo anchor('department/add', 'New', 'title="New Incident"');?>
</li>
<li><?php echo anchor('client', 'Clients', 'title="View Clients"');?>
&nbsp;
<?php echo anchor('client/add', 'New', 'title="New Incident"');?>
</li>
<li><?php echo anchor('staff', 'Staff', 'title="View Staff"');?>
&nbsp;
<?php echo anchor('staff/add', 'New', 'title="New Incident"');?>
</li>
<li><?php echo anchor('issue', 'Issues', 'title="View Issues"');?>
&nbsp;
<?php echo anchor('issue/add', 'New', 'title="New Incident"');?>
</li>
<li><?php echo anchor('role', 'Roles', 'title="View Roles"');?>
&nbsp;
<?php echo anchor('role/add', 'New', 'title="New Incident"');?>
</li>
<li><?php echo anchor('tag', 'Tags', 'title="View Tags"');?>
&nbsp;
<?php echo anchor('tag/add', 'New', 'title="New Incident"');?>
</li>
<li><?php echo anchor('remark', 'Remarks', 'title="View Remarks"');?>
&nbsp;
<?php echo anchor('remark/add', 'New', 'title="New Incident"');?>
</li>
<li><?php echo anchor('welcome', 'Welcome', 'title="Welcome Page"');?></li>
</ul>

</body>
</html>