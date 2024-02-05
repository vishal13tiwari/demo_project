<?php
include 'function.php';
if ($_SERVER['REQUEST_METHOD']=="POST") {
    $obj = new allfunction();
    $error=$obj->articleValidation($_POST);;
    if (empty($error)) {
    	if (isset($_GET['id_user'])) {
    		$obj->updateAdminArticle($_POST);
    		header("location:homepage.php");
    	} else {
        	$obj->addAdminArticleData($_POST);
        	header("location:homepage.php");
        }
    }
}
$article_name=$article_content=$verification="";
if (isset($_GET['id_user'])) {
	$obj = new allfunction();
	$result=$obj->selectArticleData($_GET['id_user']);
	$article_name = $result['article_name'];
	$article_content = $result['article_content'];
    $verification = $result['verification'];
}
?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<form method="post" enctype="multipart/form-data">
    <div class="container register">
        	<a href="homepage.php" style="text-align: center;">
        		<button type="button" class="btn btn-success col-md-4">Article List</button>
        	</a>
        	<br><br>
        <div class="row">
            <div class="col-md-12 register-right">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <h3 class="register-heading">Article</h3>
                        <div class="row register-form">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" name="article_name" class="form-control" placeholder="Article Name *" value="<?php echo $article_name; ?>" />
                                    <div class="text-danger">
                                        <?php
                                            if (isset($error['article_name'])) {
                                                echo $error['article_name'];
                                            }
                                        ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                	<textarea name="article_content" rows="5" class="form-control" placeholder="Article Content *"><?php echo $article_content; ?></textarea>
                                    <div class="text-danger">
                                        <?php
                                            if (isset($error['article_content'])) {
                                                echo $error['article_content'];
                                            }
                                        ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <select name="verification" class="form-control chosen">
                                        <option value="">---- Select Verification ----</option>
                                        <?php 
                                        if ($verification == 1) {
                                            echo '<option value="1" selected>Verified</option>';
                                        }
                                        else {
                                            echo '<option value="1">Verified</option>';   
                                        }
                                        if ($verification == 0) {
                                            echo '<option value="0" selected>In Progress</option>';
                                        } else {
                                            echo '<option value="0">In Progress</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <input name="register" type="submit" class="btnRegister"  value="Post Article"/>
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