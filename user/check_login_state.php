<?php
function login_logout_button_handler(){
if($_SESSION['user_logged_in_status'] == false){
echo "<a href='./loginhandler/user_login.php' class='account-link'>
                <i class='fa fa-user' aria-hidden='true'  data-bs-toggle='modal' data-bs-target='#myModal'></i>
                <span>Login</span>
              </a>";
}

else{
    echo "<a href='./loginhandler/logout.php' class='account-link'>
    <i class='fa fa-sign-out' aria-hidden='true'></i>
    <span>Sign Out</span>
  </a>";
}
}


?>