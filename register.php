<?php
include 'function.php';
if ($_SERVER['REQUEST_METHOD']=="POST") {
    $obj = new allfunction();
    $error=$obj->registerValidation($_POST);;
    if (empty($error)) {
        $obj->addRegistrationData($_POST);
        header('location: index.php');
    }
}
?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<form method="post" enctype="multipart/form-data">
    <div class="container register">
        <div class="row">
            <div class="col-md-3 register-left">
                <h3>Welcome</h3>
                <a href="index.php" class="btn btn-primary col-md-6">
                    Login
                </a>
            </div>
            <div class="col-md-9 register-right">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <h3 class="register-heading">Register</h3>
                        <div class="row register-form">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" name="fullname" class="form-control" placeholder="Full Name *" value="" />
                                    <div class="text-danger">
                                        <?php
                                            if (isset($error['fullname'])) {
                                                echo $error['fullname'];
                                            }
                                        ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" placeholder="Email *" value="" />
                                    <div class="text-danger">
                                        <?php
                                            if (isset($error['email'])) {
                                                echo $error['email'];
                                            }
                                        ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="number" name="mobile" class="form-control"  placeholder="Mobile *" value="" />
                                    <div class="text-danger">
                                        <?php
                                            if (isset($error['mobile'])) {
                                                echo $error['mobile'];
                                            }
                                        ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="gender">
                                        <label class="radio inline"> 
                                            <input type="radio" name="gender" value="male">
                                            <span> Male </span> 
                                        </label>
                                        <label class="radio inline"> 
                                            <input type="radio" name="gender" value="female">
                                            <span>Female </span> 
                                        </label>
                                    </div>
                                    <div class="text-danger">
                                        <?php
                                            if (isset($error['gender'])) {
                                                echo $error['gender'];
                                            }
                                        ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control" placeholder="Password *" value="" />
                                    <div class="text-danger">
                                        <?php
                                            if (isset($error['password'])) {
                                                echo $error['password'];
                                            }
                                        ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password *" value="" />
                                    <div class="text-danger">
                                        <?php
                                            if (isset($error['confirm_password'])) {
                                                echo $error['confirm_password'];
                                            }

                                            if (isset($error['password_match'])) {
                                                echo $error['password_match'];
                                            }
                                        ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <select name="designation" class="form-control chosen">
                                        <option value="">---- Select Designation ----</option>
                                        <option value="admin">Admin</option>
                                        <option value="regular">Regular</option>
                                    </select>
                                    <div class="text-danger">
                                        <?php
                                            if (isset($error['designation'])) {
                                                echo $error['designation'];
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <input name="register" type="submit" class="btnRegister"  value="Register"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<style type="text/css">
    .register{
    background: -webkit-linear-gradient(left, #3931af, #00c6ff);
    margin-top: 3%;
    padding: 3%;
}
.register-left{
    text-align: center;
    color: #fff;
    margin-top: 4%;
}
.register-left input{
    border: none;
    border-radius: 1.5rem;
    padding: 2%;
    width: 60%;
    background: #f8f9fa;
    font-weight: bold;
    color: #383d41;
    margin-top: 30%;
    margin-bottom: 3%;
    cursor: pointer;
}
.register-right{
    background: #f8f9fa;
    border-top-left-radius: 10% 50%;
    border-bottom-left-radius: 10% 50%;
}
.register-left img{
    margin-top: 15%;
    margin-bottom: 5%;
    width: 25%;
    -webkit-animation: mover 2s infinite  alternate;
    animation: mover 1s infinite  alternate;
}
@-webkit-keyframes mover {
    0% { transform: translateY(0); }
    100% { transform: translateY(-20px); }
}
@keyframes mover {
    0% { transform: translateY(0); }
    100% { transform: translateY(-20px); }
}
.register-left p{
    font-weight: lighter;
    padding: 12%;
    margin-top: -9%;
}
.register .register-form{
    padding: 10%;
    margin-top: 10%;
}
.btnRegister{
    float: right;
    margin-top: 10%;
    border: none;
    border-radius: 1.5rem;
    padding: 2%;
    background: #0062cc;
    color: #fff;
    font-weight: 600;
    width: 50%;
    cursor: pointer;
}
.register .nav-tabs{
    margin-top: 3%;
    border: none;
    background: #0062cc;
    border-radius: 1.5rem;
    width: 28%;
    float: right;
}
.register .nav-tabs .nav-link{
    padding: 2%;
    height: 34px;
    font-weight: 600;
    color: #fff;
    border-top-right-radius: 1.5rem;
    border-bottom-right-radius: 1.5rem;
}
.register .nav-tabs .nav-link:hover{
    border: none;
}
.register .nav-tabs .nav-link.active{
    width: 100px;
    color: #0062cc;
    border: 2px solid #0062cc;
    border-top-left-radius: 1.5rem;
    border-bottom-left-radius: 1.5rem;
}
.register-heading{
    text-align: center;
    margin-top: 8%;
    margin-bottom: -15%;
    color: #495057;
}
</style>