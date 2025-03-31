

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome Message</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>


  
<section id="" class="d-flex align-items-center">
    <div class="container">
    <center>
      <br>
    <h1 class="highlight">Online Bus Reservation System</h1></center>
     <?php if(isset($_SESSION['login_id'])): ?>
      	<center><button class="btn btn-danger btn-lg" type="button" id="book_now">Reserve Your Tickets Now</button></center>
      <?php else: ?>
        
		<center><br><br><br><h2 class="highlight2">Welcome, <?php echo $_SESSION['user_name'] ?></h2></center>
	
      <?php endif; ?>
    </div>
  </section>
  <script>
</body>
</html>
