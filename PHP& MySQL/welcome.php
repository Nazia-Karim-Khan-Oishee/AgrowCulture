<?php 

session_start();

if (!isset($_SESSION['user_name'])) {
    header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>
    <?php echo "<h1>Welcome " . $_SESSION['user_name'] . "</h1>"; ?>
    <form class="form" action="" method="POST" id="createAccount">
            <h1 class="form__title">Change Password</h1>
            <div class="form__message form__message--error"></div>
            <div class="form__input-group">
                <input type="text" class="form__input" name="user_name" autofocus placeholder="Username" value="<?php echo $user_name; ?>" required>
                <div class="form__input-error-message"></div>
            </div>
            <div class="form__input-group">
                <input type="password" class="form__input" name="currentpass" autofocus placeholder="Current Password" value="<?php echo $currentpass; ?>" required>
                <div class="form__input-error-message"></div>
            </div>
            <div class="form__input-group">
                <input type="password" class="form__input" name="new_password" autofocus placeholder="NewPassword" value="<?php echo $_POST['newpassword']; ?>" required>
                <div class="form__input-error-message"></div>
            </div>
            <div class="form__input-group">
                <input type="password" class="form__input" name="cpassword" autofocus placeholder="Confirm Password" value="<?php echo $_POST['cpassword']; ?>" required>
                <div class="form__input-error-message"></div>
            </div>
			<input type="submit" name="submit" class="form__button" value="Continue"/><a href="ChangePassword.php"></a>
            
            
        </form> 
    <a href="logout.php">Logout</a>
</body>
</html>