<html>
<head>
	<title>Add new staff</title>
</head>
<body>
<h1>Add new staff</h1>
 
<?php echo validation_errors(); ?>
 
<form method="post" action="<?php echo site_url('staff/add')?>" >
    <label>First Name</label><br/>
    <input type="text" name="first_name" value="<?php echo set_value('first_name'); ?>" /><br/>
    <label>Last Name</label><br/>
    <input type="text" name="last_name" value="<?php echo set_value('last_name'); ?>" /><br/>
    <label>Middle Name</label><br/>
    <input type="text" name="middle_name" value="<?php echo set_value('middle_name'); ?>" /><br/>
    <label>Password</label><br/>
    <input type="text" name="password" value="<?php echo set_value('password'); ?>" /><br/>
	<label>User is Active</label>
	<input type="checkbox" name="active" value="1" selected="selected" /><br/>
    <input type="submit" value="Add Staff"/><br/>
</form>
 
</body>
</html>