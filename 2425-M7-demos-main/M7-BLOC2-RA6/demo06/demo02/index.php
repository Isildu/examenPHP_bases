<?php
include("includes/header.php");

if(isset($_SESSION['error'])){
    echo "ERROR: " . $_SESSION['error'] . "<br/><br/>";
    session_unset();
}
?>

<a href="login.php">Log In</a><br/><br/>
<a href="signin.php">Register</a><br/><br/>

<?php
include("includes/footer.php");
?>