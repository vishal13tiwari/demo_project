<?php
session_start();
include 'function.php';
$obj = new allfunction();
if (isset($_SESSION['email'])) {
    header('location:homepage.php');
    exit();
}
if ($_SERVER['REQUEST_METHOD']=="POST") {
    $obj->matchRegistrationData($_POST);
}
?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<form method="post" action="">
<div class="sidenav">
   <div class="login-main-text">
      <h2>Application<br> Login Page</h2>
      <p>Login or register from here to access.</p>
   </div>
</div>
<div class="main">
   <div class="col-md-6 col-sm-12">
      <div class="login-form">
         <form>
            <div class="form-group">
               <label>User Name</label>
               <input type="email" name="email" class="form-control" required placeholder="User Name">
            </div>
            <div class="form-group">
               <label>Password</label>
               <input type="password" name="password" class="form-control" required placeholder="Password">
            </div>
            <div class="form-group">
               <label>Designation</label>
               <select name="designation" class="form-control chosen" required>
                    <option value="">---- Please Select an Option ----</option>
                    <option value="admin">Admin</option>
                    <option value="regular">Regular</option>
                </select>
            </div>
            <button type="submit" class="btn btn-black">Login</button>
            <a href="register.php" class="btn btn-success">
               Register
            </a>
         </form>
      </div>
   </div>
</div>
</form>

<style type="text/css">
   body {
    font-family: "Lato", sans-serif;
}
.main-head{
    height: 150px;
    background: #FFF;
   
}
.sidenav {
    height: 100%;
    background-color: #000;
    overflow-x: hidden;
    padding-top: 20px;
}
.main {
    padding: 0px 10px;
}
@media screen and (max-height: 450px) {
    .sidenav {padding-top: 15px;}
}
@media screen and (max-width: 450px) {
    .login-form{
        margin-top: 10%;
    }

    .register-form{
        margin-top: 10%;
    }
}
@media screen and (min-width: 768px){
    .main{
        margin-left: 40%; 
    }

    .sidenav{
        width: 40%;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
    }

    .login-form{
        margin-top: 80%;
    }

    .register-form{
        margin-top: 20%;
    }
}
.login-main-text{
    margin-top: 20%;
    padding: 60px;
    color: #fff;
}
.login-main-text h2{
    font-weight: 300;
}
.btn-black{
    background-color: #000 !important;
    color: #fff;
}
</style>