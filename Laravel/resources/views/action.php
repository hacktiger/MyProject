<?php
		if(isset($_POST["dangky"])){
			$Username = $_POST["Username"];
			$pass1 = $_POST["pass1"];
			$pass2 = $_POST["pass2"];
			$name = $_POST["Email"];
			
			if($pass1!=$pass2){
				header("location:main.php?page=dangky");
				setcookie("error", "Đăng ký không thành công!", time()+1, "/","", 0);
			}
			else{
				$pass = md5($pass1);
				mysqli_query($connect,"
					insert into users (Username,password,Email)
					values ('$Username','$pass','$name')
				");
				header("location:main.php?page=dangky");
				setcookie("success", "Đăng ký thành công!", time()+1, "/","", 0);
			}
		}

	?>