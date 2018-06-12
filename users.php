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

	<h1>User authentication</h1>
	<a href="create.php"><button type="button">Create profile</button></a><br><br>
	<a href="delete.php"><button type="button">Delete profile</button></a><br><br>
	<a href="edit.php"><button type="button">Edit profile</button></a>

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
