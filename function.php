<?php
include 'config.php';
class allfunction {
	public function addRegistrationData($data) {
		global $connect;
		$sql = "INSERT INTO register SET `fullname` = '".$data['fullname']."', `mobile` = '".$data['mobile']."', `gender` = '".$data['gender']."', `email` = '".$data['email']."', `password` = '".md5($data['password'])."',`designation` = '".$data['designation']."' ";
		$result = mysqli_query($connect, $sql);
		return $result;
	}

	public function registerValidation($data) {
		global $connect;
		$error = array();
		if (empty($data['fullname'])) {
			$error['fullname'] = "Name is required";
		}
		if (empty($data['email'])) {
			$error['email'] = "Email is required";
		} else {
			$email = $_POST['email'];
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$error['email'] = "Invalid Email format";
			}
		}
		if (empty($data['mobile'])) {
			$error['mobile'] = "Mobile number is required";
		}
		if (empty($data['gender'])) {
			$error['gender'] = "Gender is required";
		}
		if (empty($data['password'])) {
			$error['password'] = "Password is required";
		}
		if (empty($data['confirm_password'])) {
			$error['confirm_password'] = "Confirm Password is required";
		}
		if (empty($data['designation'])) {
			$error['designation'] = "Designation is required";
		}
		if ($data['password'] != $data['confirm_password']) {
			$error['password_match'] = "Password and Confirm Password do not match.";
		}
		return $error;
	}

	public function matchRegistrationData($data){
      	global $connect;
      	$email=$data['email'];
		$password=$data['password'];
		$designation=$data['designation'];
      	$sql="SELECT * FROM `register` WHERE email='$email' and password='".md5($password)."' and designation='$designation' and `status` = 1";
      	$result = mysqli_query($connect,$sql) or die("match query not run");
		if (mysqli_num_rows($result)>0) {
      		$row=mysqli_fetch_assoc($result);
			session_start();
      		$_SESSION['email']=$row['email'];
      		$_SESSION['name']=$row['name'];
      		if ($designation == 'admin') {
				header("location:homepage.php");
			}
			if ($designation == 'regular') {
				header("location:user_homepage.php");
			}
      		return $result;
      	} else {
      		echo "<script>alert('Your login credentials does not match');</script>";
      	}
    }

    public function getRegisterData() {
    	global $connect;
    	$sql = "SELECT * FROM `register`";
    	$result = mysqli_query($connect,$sql);
    	return $result;
    }

    public function deleteRegisterData($id) {
    	global $connect;
    	$sql = "DELETE FROM `register` WHERE id=$id";
    	$result = mysqli_query($connect, $sql);
    	return $result;
    }

    public function addListData($data) {
		global $connect;
		$sql = "INSERT INTO register SET `fullname` = '".$data['fullname']."', `mobile` = '".$data['mobile']."', `gender` = '".$data['gender']."', `email` = '".$data['email']."', `password` = '".md5($data['password'])."',`designation` = '".$data['designation']."', `status` = '".$data['status']."'";
		$result = mysqli_query($connect, $sql);
		return $result;
	}

	public function listValidation($data) {
		global $connect;
		$error = array();
		if (empty($data['fullname'])) {
			$error['fullname'] = "Name is required";
		}
		if (empty($data['email'])) {
			$error['email'] = "Email is required";
		} else {
			$email = $_POST['email'];
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$error['email'] = "Invalid Email format";
			}
		}
		if (empty($data['mobile'])) {
			$error['mobile'] = "Mobile number is required";
		}
		if (empty($data['gender'])) {
			$error['gender'] = "Gender is required";
		}
		if (empty($data['designation'])) {
			$error['designation'] = "Designation is required";
		}
		if (empty($data['password'])) {
			$error['password'] = "Password is required";
		}
		if (empty($data['confirm_password'])) {
			$error['confirm_password'] = "Confirm Password is required";
		}
		if ($data['password'] != $data['confirm_password']) {
			$error['password_match'] = "Password and Confirm Password do not match.";
		}
		return $error;
	}

	public function selectListData($id){
		global $connect;
		$sql="SELECT * FROM `register` WHERE id=$id";
		$result=mysqli_query($connect,$sql);
		if (mysqli_num_rows($result)>0) {
			$row=mysqli_fetch_assoc($result);
		}
		return $row;
	}

	public function updateListData($data){
		global $connect;
		$fullname=$data['fullname'];
		$mobile=$data['mobile'];
		$gender=$data['gender'];
		$email=$data['email'];
		$designation=$data['designation'];
		$password=$data['password'];
		$status=$data['status'];
		$sql="UPDATE `register` SET `fullname`='$fullname', `mobile`='$mobile', `gender`='$gender',`email`='$email', `password`='".md5($password)."', `designation`='$designation', `status`='$status' WHERE `id`='".$_GET['id']."'";
		$result=mysqli_query($connect,$sql);
		return $result;
	}

	public function addArticleData($data) {
		global $connect;
		$sql = "INSERT INTO article_user_data SET `article_name` = '".$data['article_name']."', `article_content` = '".$data['article_content']."'";
		$result = mysqli_query($connect, $sql);
		return $result;
	}

	public function getArticleData() {
    	global $connect;
    	$sql = "SELECT * FROM `article_user_data`";
    	$result = mysqli_query($connect,$sql);
    	return $result;
    }

    public function articleValidation($data) {
		global $connect;
		$error = array();
		if (empty($data['article_name'])) {
			$error['article_name'] = "Article Name is required";
		}
		if (empty($data['article_content'])) {
			$error['article_content'] = "Article Content is required";
		}
		return $error;
	}

	public function selectArticleData($id_user){
		global $connect;
		$sql="SELECT * FROM `article_user_data` WHERE id_user=$id_user";
		$result=mysqli_query($connect,$sql);
		if (mysqli_num_rows($result)>0) {
			$row=mysqli_fetch_assoc($result);
		}
		return $row;
	}

	public function updateArticleData($data){
		global $connect;
		$article_name=$data['article_name'];
		$article_content=$data['article_content'];
		$sql="UPDATE `article_user_data` SET `article_name`='$article_name', `article_content`='$article_content' WHERE `id_user`='".$_GET['id_user']."'";
		$result=mysqli_query($connect,$sql);
		return $result;
	}

	public function deleteArticleData($id_user) {
    	global $connect;
    	$sql = "DELETE FROM `article_user_data` WHERE id_user=$id_user";
    	$result = mysqli_query($connect, $sql);
    	return $result;
    }

    public function updateAdminArticle($data){
		global $connect;
		$article_name=$data['article_name'];
		$article_content=$data['article_content'];
		$verification=$data['verification'];
		$sql="UPDATE `article_user_data` SET `article_name`='$article_name', `article_content`='$article_content', `verification`='$verification' WHERE `id_user`='".$_GET['id_user']."'";
		$result=mysqli_query($connect,$sql);
		return $result;
	}

	public function addAdminArticleData($data) {
		global $connect;
		$sql = "INSERT INTO article_user_data SET `article_name` = '".$data['article_name']."', `article_content` = '".$data['article_content']."', `verification` = '".$data['verification']."'";
		$result = mysqli_query($connect, $sql);
		return $result;
	}
}
?>
