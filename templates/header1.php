<?php

 ?>
<head>
	<title>Today's recipe</title>
	<!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <style type="text/css">
	  .brand{
	  	background: blue !important;
	  }
	  .brand-text{
  		color: red !important;
  	}
  	form{
  		max-width: 460px;
  		margin: 20px auto;
  		padding: 20px;
  	}
    .pizza{
      width: 100px;
      margin: 40px auto -30px;
      display: block;
      position: relative;
      top: -30px;
    }
		#user{
			font-size: 2em;
			color:grey;

		}
  </style>
</head>
<body class="grey lighten-4">
	<nav class="white z-depth-0">
    <div class="container">
      <a href="index.php" class="brand-logo brand-text">Today's recipe</a>
      <ul id="nav-mobile" class="right hide-on-small-and-down">
				<li id="user">Welcome <?php echo htmlspecialchars($_SESSION['userName']) ?></li>
        <li><a href="add.php" class="btn brand z-depth-0">Add a recipe</a></li>
				<li><a href="logout.php" class="btn brand z-depth-0">disconnect</a></li>
      </ul>
    </div>
  </nav>
