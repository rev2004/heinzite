<html>
<head>
    <title>Edit staff</title>
</head>
<body>
<h1>Edit staff</h1>

<?php echo validation_errors(); ?>

<form method="post" action="<?php echo site_url('staff/edit/'.$query->staff_id)?>" >
    <label>First Name</label><br/>
    <input type="text" name="first_name" value="<?php echo $query->first_name; echo set_value('first_name'); ?>" /><br/>
    <label>Last Name</label><br/>
    <input type="text" name="last_name" value="<?php echo $query->last_name; echo set_value('last_name'); ?>" /><br/>
    <label>Middle Name</label><br/>
    <input type="text" name="middle_name" value="<?php echo $query->middle_name; echo set_value('middle_name'); ?>" /><br/>
    <label>Username</label><br/>
    <input type="text" name="username" value="<?php echo $query->username; echo set_value('username'); ?>" /><br/>
    <label>Password</label><br/>
    <input type="text" name="password" value="" /><br/>
    <label>Role</label><br/>
    <input type="text" name="role_id" value="<?php echo $query->role_id; echo set_value('role_id'); ?>" /><br/>
    <label>User is Active</label>
<?php if ($query->active == 1) :?>
    <input type="checkbox" name="active" value="1" checked /><br/>
<?php else: ?>
    <input type="checkbox" name="active" value="1" /><br/>
<?php endif;?>
    <input type="submit" value="Save Staff"/><br/>
</form>

</body>
</html>