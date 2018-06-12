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

		<h1>Search & Delete</h1>
		<form method="post" action="delete.php" class="center">
			<p style="font-size:18px;display: inline">Enter username:</p> 
			<input type="text" name="uname"><br><br>
			<button type="submit" name="sub">Search Customer</button>
			<button type="submit" name="sub2">Search Technician</button><br><br>
		</form>

		<?php 
			if (null !==(filter_input(INPUT_POST, 'sub'))){
				$uname=mysqli_real_escape_string($conn,filter_input(INPUT_POST, 'uname'));
				$sql = "SELECT CustID, ContactNo, Email FROM Customer WHERE CustID='$uname';";
				$result=mysqli_query($conn,$sql);
				$queryResult=mysqli_num_rows($result);
				if ($queryResult > 0){
					echo "<br/><p style=\"font-size:18px;display: inline\">User is available</p><br/><br/>";
					echo "<table style=\"width:100%\">";
					echo "<tr><th>Username</th><th>Contact No</th><th>Email</th></tr>";
					while ($row=mysqli_fetch_assoc($result)){
						$uname = $row['CustID'];
						$cont = $row['ContactNo'];
						$email = $row['Email'];
						echo "<tr><td>".$uname."</td><td>".$cont."</td><td>".$email."</td></tr>";    
						}
					echo "</table>";
				}else {
					echo "User not available";
				}
			}
		
			if (null !==(filter_input(INPUT_POST, 'sub2'))){
				$uname=mysqli_real_escape_string($conn,filter_input(INPUT_POST, 'uname'));
				$sql = "SELECT TechID, FirstName, LastName, ContactNo, Email, Occupation, City FROM Technician WHERE TechID='$uname';";
				$result=mysqli_query($conn,$sql);
				$queryResult=mysqli_num_rows($result);
				if ($queryResult > 0){
					echo "<br/><p style=\"font-size:18px;display: inline\">User is available</p><br/><br/>";
					echo "<table style=\"width:100%\">";
					echo "<tr><th>Username</th><th>First Name</th><th>Last Name</th><th>Contact No</th><th>Email</th><th>Occupation</th><th>City</th></tr>";
					while ($row=mysqli_fetch_assoc($result)){
						$uname = $row['TechID'];
						$fname = $row['FirstName'];
						$lname = $row['LastName'];
						$cont = $row['ContactNo'];
						$email = $row['Email'];
						$ocp = $row['Occupation'];
						$city = $row['City'];
						echo "<tr><td>".$uname."</td><td>".$fname."</td><td>".$lname."</td><td>".$cont."</td><td>".$email."</td><td>".$ocp."</td><td>".$city."</td></tr>";    
					}
					echo "</table>";
					
				}else {
					echo "User not available";
				}
			}
		?>

		<hr><br>

		<form action="delete.php" method="post" class="center">
			<p style="font-size:18px;display: inline">Enter username to delete: </p>
			<input type="text" name="dname"><br><br>
			<button type="submit" name="del">Delete Customer</button>
			<button type="submit" name="del2" onclick=myfunction()>Delete Technician</button>
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
	if (null !==(filter_input(INPUT_POST, 'del'))){
        $dname=mysqli_real_escape_string($conn,filter_input(INPUT_POST, 'dname'));
        $sql1 = "DELETE FROM Customer WHERE CustID='$dname';";
        $result2 = mysqli_query($conn,$sql1);
        if (!$result2){
            echo "<script>alert(\"Error Occured!\");</script>";
        }else {
            echo "<script>alert(\"Successfully deleted!\");</script>";
        }
    }

    if (null !==(filter_input(INPUT_POST, 'del2'))){
        $dname=mysqli_real_escape_string($conn,filter_input(INPUT_POST, 'dname'));
        $sql1 = "DELETE FROM Technician WHERE TechID='$dname';";
        $result2 = mysqli_query($conn,$sql1);
        if (!$result2){
            echo "<script>alert(\"Error Occured!\");</script>";
        }else {
            echo "<script>alert(\"Successfully deleted!\");</script>";
        }
    }
	$mysqli_close = mysqli_close($conn);
?>

		
