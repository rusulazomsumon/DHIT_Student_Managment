
<?php 

session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//read from database
			$query = "select * from users where user_name = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: dashboard.php");
						die;
					}
				}
			}
			
			echo "wrong username or password!";
		}else
		{
			echo "wrong username or password!";
		}
	}

?>


<style type="text/css">
	
	#text{

		height: 25px;
		border-radius: 5px;
		padding: 4px;
		border: solid thin #aaa;
		width: 100%;
	}

	#button{

		padding: 10px;
		width: 100px;
		color: white;
		background-color: lightblue;
		border: none;
	}

	#box{
    background-image: url('ny.jpg');
    background-repeat: no-repeat;
    background-position: center;
    background-attachment: fixed;
		margin: auto;
		width: 100%;
		padding: ;
	}
  #Lform {
    margin: auto;
		width: 300px;
		padding: 20px;
  }

	</style>

	<div id="box">
    <div id="Lform">
    <form method="post">
			<div style="font-size: 20px;margin: 10px;color: white;">Login For Full Feture</div><br>
      <label for="fname">Username</label>
			<input id="text" type="text" name="user_name"><br><br>
      <label for="fname">Password</label>
			<input id="text" type="password" name="password"><br><br>
			<input id="button" type="submit" value="Login"><br><br>
			<a href="signup.php"><br>Click to Signup</a><br><br>
		</form>
    </div>
		
		
	</div>
