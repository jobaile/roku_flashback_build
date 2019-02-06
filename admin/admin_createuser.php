<?php
    require_once('scripts/config.php');
    confirm_logged_in();

    if(isset($_POST['submit'])){
        //var_dump($_POST);
        //Do some preprocess for the data

        $fname = trim($_POST['fname']);
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        $email = trim($_POST['email']);

        //Validation?
        if(empty($username) || empty($password) || empty($email)){
            $message ='Please fill the required fields';
        }else{
            $result = createUser($fname, $username, $password, $email);
            $message = $result;
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Create User</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
</head>
<body>
    <?php if(!empty($message)):?>
		<p><?php echo $message;?></p>
	<?php endif;?>
    <h2>Create User</h2>
    <form action="admin_createuser.php" method="post">
        <label for="first-name">First Name:</label>
        <input type="text" id="first-name" name="fname" value=""><br>

        <label for="username">User Name:</label>
        <input type="text" id="username" name="username" value=""><br>

        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" value=""><br>

        <label for="password">Password:</label>
        <input type="text" id="password" name="password" value=""><br>

        <button type="submit" name="submit">Create User</button>
    </form>
    
</body>
</html>