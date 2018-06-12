<?php
    include 'header.php';
?>

		<header>
			<div class="navbar">
			<a href="./" class="logo">FIND LANKA</a>
			<div class="rightnav">
				<a href="./admin.php">Home</a>
				<a class="active" href="./users.php">User Administration</a>
				<a href="#contact">Customer Requests</a>
				<a href="#services">Technicians</a>
				<a href="#help">Reports</a>
				<a href="#login">Log out</a>
			</div>
			</div>
		</header>

		<form action="create.php" method="post">
			<div class="center">
				<h1>Registration Details</h1>
				User Name: <input type="text" name="uname" value="" required/><br><br>
				First Name: <input type="text" name="fname" value="" required/><br><br>
				Last Name: <input type="text" name="lname" value="" required/><br><br>
				Contact Number: <input type="text" name="cont" value="" required/><br><br>
				Email: <input type="text" name="email" value="" required/><br><br>
				Password: <input type="password" name="pw" value="" required/><br><br>
				City: 
				<select name="city">
						<option value="">Leave empty for a customer</option>
						<option value="Colombo">Colombo</option>
						<option value="Kalutara">Kalutara</option>
						<option value="Galle">Galle</option>
						<option value="Matara">Matara</option>
						<option value="Kandy">Kandy</option>
						<option value="Kurunegala">Kurunegala</option>	
					</select><br><br>
				Occupation:
				<select name="ocp">
					<option value="">Leave empty for a customer</option>
					<option value="IT Technician">IT Technician</option>
					<option value="Carpenter">Carpenter</option>
					<option value="Electrician">Electrician</option>
					<option value="Mechanic">Mechanic</option>
					<option value="Plumber">Plumber</option>
					<option value="Welder">Welder</option>	
				</select><br><br>
				Skill:
				<select name="skid">
					<option value="">Leave empty for a customer</option>
					<option value="Ittc001">PC Troubleshooting</option>
					<option value="Ittc002">Virus Removing</option>
					<option value="Elec001">Wiring</option>
					<option value="Plum001">Pipelining</option>
					<option value="Mech001">Tinkering</option>
					<option value="Carp001">Wood works</option>	
				</select><br><br>
				<button type="submit" name="submit" class="center">Create Customer Account</button>
				<button type="submit" name="submit2" class="center">Create Technician Account</button>
			</div>
		</form>

		<footer>
		<div class="footer" style="position:fixed">
		<p class="footerleft"> &copy; Find Lanka Incorporated. 2018 | All Rights Reserved.</p>
		<div class="footerright">
			<a href="#home">Link 1</a>
			<a href="#about">Link 2</a>
			<a href="#contact">Link 2</a>
		</div>
		<div style="clear: both;"></div>
		</div>
		</footer>
	</body>
</html>

<?php
	if (null !==(filter_input(INPUT_POST, 'submit'))){
        $uname = filter_input(INPUT_POST,'uname');
        $fname = filter_input(INPUT_POST,'fname');
        $lname = filter_input(INPUT_POST,'lname');
        $cont = filter_input(INPUT_POST,'cont');
        $email = filter_input(INPUT_POST,'email');
        $password = filter_input(INPUT_POST,'pw');
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
        $sql = "INSERT INTO Customer (CustID,FirstName,LastName,Email,ContactNo,Password) VALUES ('$uname','$fname','$lname','$email','$cont','$hashed_password');";

        $mysqli_query = mysqli_query($conn, $sql);
       
        if (!$mysqli_query){
                    echo "<script>alert(\"Error Occured!\");</script>";
                }else {
                    $tvidr = mysqli_insert_id($conn); 
                    echo "<script>alert(\"Successfully registered!\");</script>";
                }
    }
    
    if (null !==(filter_input(INPUT_POST, 'submit2'))){
        $uname = filter_input(INPUT_POST,'uname');
        $fname = filter_input(INPUT_POST,'fname');
        $lname = filter_input(INPUT_POST,'lname');
        $cont = filter_input(INPUT_POST,'cont');
        $email = filter_input(INPUT_POST,'email');
        $password = filter_input(INPUT_POST,'pw');
        $ocp = filter_input(INPUT_POST,'ocp');
        $city = filter_input(INPUT_POST,'city');
        $skill = filter_input(INPUT_POST,'skid');
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
      
		$sql2 = "INSERT INTO Technician (TechID,FirstName,LastName,Email,ContactNo,Password,Occupation,City) VALUES ('$uname','$fname','$lname','$email','$cont','$hashed_password','$ocp','$city');";
		$sql2 .= "INSERT INTO techskill (TechID,SkID) VALUES ('$uname','$skill');";
		$mysqli_query = mysqli_multi_query($conn, $sql2);
     
		if (!$mysqli_query){
					echo "<script>alert(\"Error Occured!\");</script>";
				}else {
					echo "<script>alert(\"Successfully registered!\");</script>";
				}
  	}
    $mysqli_close = mysqli_close($conn);
?>   