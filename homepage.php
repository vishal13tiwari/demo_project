<?php 
session_start();
if (!isset($_SESSION['email'])) {
  	header('Location:index.php');
}
include 'function.php';
?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<div id="flipkart-navbar">
    <div class="container">
        <div class="row row1">
            <ul class="largenav pull-right">
                <li class="upper-links"><a class="links" href="logout.php">Logout</a></li>
            </ul>
        </div>

        <div class="row row2">
            <div class="col-sm-2">
                <h1 style="margin:0px;"><span class="largenav">Admin</span></h1>
            </div>
            <div class="flipkart-navbar-search smallsearch col-sm-8 col-xs-11">
                <div class="row">
                    <input class="flipkart-navbar-input col-xs-11" type="" placeholder="Search for Products, Brands and more" name="">
                    <button class="flipkart-navbar-button col-xs-1">
                        <svg width="15px" height="15px">
                            <path d="M11.618 9.897l4.224 4.212c.092.09.1.23.02.312l-1.464 1.46c-.08.08-.222.072-.314-.02L9.868 11.66M6.486 10.9c-2.42 0-4.38-1.955-4.38-4.367 0-2.413 1.96-4.37 4.38-4.37s4.38 1.957 4.38 4.37c0 2.412-1.96 4.368-4.38 4.368m0-10.834C2.904.066 0 2.96 0 6.533 0 10.105 2.904 13 6.486 13s6.487-2.895 6.487-6.467c0-3.572-2.905-6.467-6.487-6.467 "></path>
                        </svg>
                    </button>
                </div>
            </div>
            <div class="cart largenav col-sm-2">
                <a class="cart-button">
                    <svg class="cart-svg " width="16 " height="16 " viewBox="0 0 16 16 ">
                        <path d="M15.32 2.405H4.887C3 2.405 2.46.805 2.46.805L2.257.21C2.208.085 2.083 0 1.946 0H.336C.1 0-.064.24.024.46l.644 1.945L3.11 9.767c.047.137.175.23.32.23h8.418l-.493 1.958H3.768l.002.003c-.017 0-.033-.003-.05-.003-1.06 0-1.92.86-1.92 1.92s.86 1.92 1.92 1.92c.99 0 1.805-.75 1.91-1.712l5.55.076c.12.922.91 1.636 1.867 1.636 1.04 0 1.885-.844 1.885-1.885 0-.866-.584-1.593-1.38-1.814l2.423-8.832c.12-.433-.206-.86-.655-.86 " fill="#fff "></path>
                    </svg> Link
                    <span class="item-number ">0</span>
                </a>
            </div>
        </div>

	    <div class="row col-md-12 custyle">
            <a href="homepage_add.php" class="btn-xs pull-right">
                <button type="submit" class="btn btn-danger">
                    <b>+</b> Add New User
                </button>
            </a>
            <a href="admin_article_page.php" class="btn-xs pull-right">
                <button type="submit" class="btn btn-success">
                    <b>+</b> Add New Article
                </button>
            </a>

            <legend class="text-center" style="padding: 15px 0px 15px 0px;">User List</legend>
		    <table class="table table-striped custab">
    		    <thead>
    		        <tr>
    		            <th>ID</th>
    		            <th>Name</th>
    		            <th>Email</th>
    		            <th>Gender</th>
    		            <th>Mobile</th>
    		            <th>Status</th>
    		            <th class="text-center">Action</th>
    		        </tr>
    		    </thead>
                <tbody>
                    <?php
		    	     $obj = new allfunction();
		    	     $result = $obj->getRegisterData();
		    	     while ($row=mysqli_fetch_assoc($result)) { ?>
		              <tr>
		                  <td><?php echo $row['id'] ?></td>
		                  <td><?php echo $row['fullname'] ?></td>
		                  <td><?php echo $row['email'] ?></td>
		                  <td><?php echo $row['gender'] ?></td>
		                  <td><?php echo $row['mobile'] ?></td>
		                  <td><?php
		                	if ($row['status'] == 0) {
		                		echo "Disable";
		                	} else {
		                		echo "Enable";
		                	}
		                  ?>      
                          </td>
		                  <td class="text-center">
		                	<a href="homepage_add.php?id=<?php echo $row['id'] ?>">
		                		<button type="submit" class="btn btn-primary">
		                			<span class="glyphicon glyphicon-edit"></span>Edit
		                		</button>
		                	</a>
		                	<a href="homepage.php?id=<?php echo $row['id'] ?>">
		                		<button type="submit" name="delete" class="btn btn-danger">
		                			<span class="glyphicon glyphicon-remove"></span>Delete
		                		</button>
		                	</a>
		                </td>
		            </tr>
		          <?php } ?>
		        </tbody>
		    </table>

            <legend class="text-center" style="padding: 15px 0px 15px 0px;">Article List</legend>
            <table class="table table-striped custab">
            <thead>
                <tr>
                    <th>Article ID</th>
                    <th>Article Name</th>
                    <th>Article Content</th>
                    <th>Article Status</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $obj = new allfunction();
                $result = $obj->getArticleData();
                while ($row=mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo $row['id_user'] ?></td>
                        <td><?php echo $row['article_name'] ?></td>
                        <td><?php echo $row['article_content'] ?></td>
                        <td>
                            <?php
                            if ($row['verification'] == 0) {
                                echo "<b><p style='color: red;'>In Progress</p></b>";
                            } else {
                                echo "<b><p style='color: green;'>Verified</p></b>";
                            }
                         ?>
                        </td>
                        <td class="text-center">
                            <a href="admin_article_page.php?id_user=<?php echo $row['id_user'] ?>">
                                <button type="submit" class="btn btn-primary">
                                    <span class="glyphicon glyphicon-edit"></span>Edit
                                </button>
                            </a>
                            <a href="homepage.php?id_user=<?php echo $row['id_user'] ?>">
                                <button type="submit" name="delete" class="btn btn-danger">
                                    <span class="glyphicon glyphicon-remove"></span>Delete
                                </button>
                            </a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
	    </div>
    </div>
</div>

<?php
if (isset($_GET['id'])) {
	$obj=new allfunction();
	$obj->deleteRegisterData($_GET['id']);
		header('location:homepage.php');
}
?>

<?php
if (isset($_GET['id_user'])) {
    $obj=new allfunction();
    $obj->deleteArticleData($_GET['id_user']);
        header('location:homepage.php');
}
?>


<style type="text/css">
	#flipkart-navbar {
    background-color: #2874f0;
    color: #FFFFFF;
}
.row1{
    padding-top: 10px;
    padding-right: 50px;
}

.row2 {
    padding-bottom: 20px;
}

.flipkart-navbar-input {
    padding: 11px 16px;
    border-radius: 2px 0 0 2px;
    border: 0 none;
    outline: 0 none;
    font-size: 15px;
}

.flipkart-navbar-button {
    background-color: #ffe11b;
    border: 1px solid #ffe11b;
    border-radius: 0 2px 2px 0;
    color: #565656;
    padding: 10px 0;
    height: 43px;
    cursor: pointer;
}

.cart-button {
    background-color: #2469d9;
    box-shadow: 0 2px 4px 0 rgba(0, 0, 0, .23), inset 1px 1px 0 0 hsla(0, 0%, 100%, .2);
    padding: 10px 0;
    text-align: center;
    height: 41px;
    border-radius: 2px;
    font-weight: 500;
    width: 120px;
    display: inline-block;
    color: #FFFFFF;
    text-decoration: none;
    color: inherit;
    border: none;
    outline: none;
}

.cart-button:hover{
    text-decoration: none;
    color: #fff;
    cursor: pointer;
}

.cart-svg {
    display: inline-block;
    width: 16px;
    height: 16px;
    vertical-align: middle;
    margin-right: 8px;
}

.item-number {
    border-radius: 3px;
    background-color: rgba(0, 0, 0, .1);
    height: 20px;
    padding: 3px 6px;
    font-weight: 500;
    display: inline-block;
    color: #fff;
    line-height: 12px;
    margin-left: 10px;
}

.upper-links {
    display: inline-block;
    padding: 0 11px;
    line-height: 23px;
    font-family: 'Roboto', sans-serif;
    letter-spacing: 0;
    color: inherit;
    border: none;
    outline: none;
    font-size: 12px;
}

.dropdown {
    position: relative;
    display: inline-block;
    margin-bottom: 0px;
}

.dropdown:hover {
    background-color: #fff;
}

.dropdown:hover .links {
    color: #000;
}

.dropdown:hover .dropdown-menu {
    display: block;
}

.dropdown .dropdown-menu {
    position: absolute;
    top: 100%;
    display: none;
    background-color: #fff;
    color: #333;
    left: 0px;
    border: 0;
    border-radius: 0;
    box-shadow: 0 4px 8px -3px #555454;
    margin: 0;
    padding: 0px;
}

.links {
    color: #fff;
    text-decoration: none;
}

.links:hover {
    color: #fff;
    text-decoration: none;
}

.profile-links {
    font-size: 12px;
    font-family: 'Roboto', sans-serif;
    border-bottom: 1px solid #e9e9e9;
    box-sizing: border-box;
    display: block;
    padding: 0 11px;
    line-height: 23px;
}

.profile-li{
    padding-top: 2px;
}

.largenav {
    display: none;
}

.smallnav{
    display: block;
}

.smallsearch{
    margin-left: 15px;
    margin-top: 15px;
}

.menu{
    cursor: pointer;
}

@media screen and (min-width: 768px) {
    .largenav {
        display: block;
    }
    .smallnav{
        display: none;
    }
    .smallsearch{
        margin: 0px;
    }
}

/*Sidenav*/
.sidenav {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #fff;
    overflow-x: hidden;
    transition: 0.5s;
    box-shadow: 0 4px 8px -3px #555454;
    padding-top: 0px;
}

.sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 25px;
    color: #818181;
    display: block;
    transition: 0.3s
}

.sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
    color: #fff;        
}

@media screen and (max-height: 450px) {
  .sidenav a {font-size: 18px;}
}

.sidenav-heading{
    font-size: 36px;
    color: #fff;
}
</style>
