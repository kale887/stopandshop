  <?php

if (isset($_SESSION["user"])) {
    header("location: index.php");
    exit();
}
?>

<?php
if (isset($_POST["username"]) && isset($_POST["password"])) {

	$user = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["username"]);
    $password = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["password"]);

    include "storescripts/connect_to_mysql.php";
    $sql = mysql_query("SELECT id FROM customer WHERE login='$user' AND password='$password' LIMIT 1");

    $existCount = mysql_num_rows($sql);
    if ($existCount == 1) {
	     while($row = mysql_fetch_array($sql)){
             $id = $row["id"];
		 }
		 $_SESSION["id"] = $id;
		 $_SESSION["user"] = $user;
		 $_SESSION["password"] = $password;
		 header("location: index.php?userloginsuccess");
         exit();
    } else {
		echo  '<br> <center> That information is incorrect, try again <a href="login.php">Click Here</a> </center';
		exit();
	}
}
?>
 
 
 <div class="card card-container">
            <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
            <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
            <p id="profile-name" class="profile-name-card"></p>
            <form class="form-signin" id="form2" name="form2" method="post" action="login.php">
                <span id="reauth-email" class="reauth-email"></span>
                <input type="text" id="inputEmail" class="form-control"  name="username"  placeholder="User Name" required autofocus>
                <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required>
                <div id="remember" class="checkbox">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Sign in</button>
            </form><!-- /form -->
            <a href="#" class="forgot-password">
                Forgot the password?
            </a>
        </div><!-- /card-container -->