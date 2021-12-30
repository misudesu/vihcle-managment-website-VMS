<?php 
session_start(); 
include "config.php";

if (isset($_POST['uname']) && isset($_POST['password'])===true) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);

	if (empty($uname)) {
		header("Location: index.php?error=User Name is required");
	    exit();
	}else if(empty($pass)){
        header("Location: index.php?error=Password is required");
	    exit();
	}else{
		// hashing the password
        $pass = md5($pass);

        
		$sql = "SELECT * FROM users WHERE user_name='$uname' AND password='$pass'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['user_name'] === $uname && $row['password'] === $pass) {
				if($row['accounttype']=="driver"){
					if($row['stutes']=='Active'){
						$_SESSION['driveruser_name'] = $row['user_name'];
						$_SESSION['drivername'] = $row['name'];
						$_SESSION['id'] = $row['id'];
						$_SESSION['Dacct'] = $row['accounttype'];
						
						setcookie("adminid",$row['password'],time()+(60*60*24*7));
						setcookie("adminemail",$row['user_name'],time()+(60*60*24*7));
						
						header("Location: driveraccount/driverhome.php");
						exit();
					}else{
						header("Location: index.php?error=your account is panding contact Admin pleas!");
						exit();
					}
					
				}else if($row['accounttype']=="org"){
					if($row['stutes']=='Active'){
					$_SESSION['orguser_name'] = $row['user_name'];
					$_SESSION['orgname'] = $row['name'];
					$_SESSION['orgid'] = $row['id'];
	
					
					setcookie("orgid",$row['password'],time()+(60*60*24*7));
					setcookie("orgemail",$row['user_name'],time()+(60*60*24*7));
						
					header("Location: orgAccount/orghome.php ");
					exit();
					}else{
						header("Location: index.php?error=your account is panding contact Admin!");
						exit();
					}
				}else if($row['accounttype']=="Admin"){
					if($row['stutes']=='Active'){
					$_SESSION['user_name'] = $row['user_name'];
					$_SESSION['adminname'] = $row['name'];
					$_SESSION['id'] = $row['id'];
					$_SESSION['Aacct'] = $row['accounttype'];
					
					setcookie("adminid",$row['password'],time()+(60*60*24*7));
					setcookie("adminemail",$row['user_name'],time()+(60*60*24*7));
					
					header("Location: home/home.php");
					exit();
				}else{
					header("Location: index.php?error=your account is panding contact Admin!");
					exit();
				}
				}else if($row['accounttype']=="distrpution"){
					if($row['stutes']=='Active'){
						$_SESSION['user_name'] = $row['user_name'];
						$_SESSION['adminname'] = $row['name'];
						$_SESSION['id'] = $row['id'];
						$_SESSION['Aacct'] = $row['accounttype'];
						
						setcookie("adminid",$row['password'],time()+(60*60*24*7));
						setcookie("adminemail",$row['user_name'],time()+(60*60*24*7));
						
					header("Location: home/home.php");
					exit();
				}else{
					header("Location: index.php?error=your account is panding contact Admin!");
					exit();
				}
				}
				
				else if($row['accounttype']=="user"){
					if($row['stutes']=='Active'){
					$_SESSION['user_name'] = $row['user_name'];
					$_SESSION['username'] = $row['name'];
					$_SESSION['id'] = $row['id'];
				
					
					setcookie("userid",$row['password'],time()+(60*60*24*7));
					setcookie("useremail",$row['user_name'],time()+(60*60*24*7));
				
					header("Location: ");
					exit();
				}else{
					header("Location: index.php?error=your account is panding contact Admin!");
					exit();
				}
				}
            
            }else{
				header("Location: index.php?error=Incorect User name or password");
		        exit();
			}
		}else{
			header("Location: index.php?error=Incorect User name or password");
	        exit();
		}
	}
	
}else{
	header("Location: index.php");
	exit();
}