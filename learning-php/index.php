<?php 
	error_reporting(E_ALL);
	session_start();
?>
<!Doctype html>
	<head>
		<title>Learning Bootstrap</title>
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/bootstrap-theme.min.css">
		<script src="js/jquery-1.11.3.js"></script>
		<script src="js/bootstrap.min.js"></script>
		
	</head>

	<body>
		<nav class="navbar navbar-default">
		  <div class="container-fluid">
		    <div class="navbar-header">
		      <a class="navbar-brand" href="#">WebSiteName</a>
		    </div>
		    <ul class="nav navbar-nav">
		      <li class="active"><a href="#">Home</a></li>
		      <li><a href="#">Page 1</a></li>
		      <li><a href="#">Page 2</a></li>
		      <li><a href="#">Page 3</a></li>
		    </ul>
		    <ul class="nav navbar-nav navbar-right">
		    
	          
	          	<?php 
					if(!isset($_SESSION['user'])){
				?>
				<li class="dropdown" id="menuLogin">
	            <a class="dropdown-toggle" href="#" data-toggle="dropdown" id="navLogin">Login</a>
	            <div class="dropdown-menu" style="padding:17px;">
	              <form class="form-horizontal" role="form" onsubmit="return false;">
						    <div class="form-group">
						      <label class="control-label col-sm-2" for="email">Email:</label>
						      <div class="col-sm-10">
						        <input type="email" class="form-control" id="email_collapse" placeholder="Enter email">
						      </div>
						    </div>
						    <div class="form-group">
						      <label class="control-label col-sm-2" for="password">Password:</label>
						      <div class="col-sm-10">          
						        <input type="password" class="form-control" id="password_collapse" placeholder="Enter password">
						      </div>
						    </div>
						    <div class="form-group">        
						      <div class="col-sm-offset-2 col-sm-10">
						      	<div id="msg_collapse">&nbsp;</div>

						        <button type="submit" name="submit" id="loginBtn_collapse" class="btn btn-default">Login</button>
						      </div>
						    </div>
  						</form>
	            </div>
	            <?php
	       			 }else{
	       		?>
	       	  <li class="dropdown" id="menuLogin">
	       			<a class="dropdown-toggle" href="#" data-toggle="dropdown" id="navLogin"><?=$_SESSION['user']?></a>	
	          </li>
	          <li class="dropdown" id="menuLogin">
	          		<li><a href="logout.php">Logout</a></li
	          </li>
	          <?php
	       			 }
	       		?>
       		 </ul>
		  </div>
		</nav>
		<div class="container">
				<div class="jumbotron">
					<h1>Hello, world!</h1>
				</div>
				<div class="row">
					<div class="col-sm-4">
						Hello World 1
					</div>
					<div class="col-sm-4">
						Hello World 2
					</div>
					<div class="col-sm-4">
						Hello World 3</br>
						<h3><span class="glyphicon glyphicon-search"></span></h3>						
					</div>
				</div>
				<button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo">Simple collapsible</button>
						<div id="demo" class="collapse">
						    Lorem ipsum dolor sit amet, consectetur adipisicing elit,
						    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
						</div>
						<div></div>

				<!-- Modal Begin-->
				<!-- Trigger the modal with a button -->
				<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Login</button>

				<!-- Modal -->
				<div id="myModal" class="modal fade" role="dialog">
				  <div class="modal-dialog">

				    <!-- Modal content-->
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal">&times;</button>
				        <h4 class="modal-title">Login</h4>
				      </div>
				      <div class="modal-body">
				        <form class="form-horizontal" role="form">
						    <div class="form-group">
						      <label class="control-label col-sm-2" for="email">Email:</label>
						      <div class="col-sm-10">
						        <input type="email" class="form-control" id="email_modal" placeholder="Enter email">
						      </div>
						    </div>
						    <div class="form-group">
						      <label class="control-label col-sm-2" for="password_modal">Password:</label>
						      <div class="col-sm-10">          
						        <input type="password" class="form-control" id="password_modal" placeholder="Enter password">
						      </div>
						    </div>
						    <div class="form-group">        
						      <div class="col-sm-offset-2 col-sm-10">
						      	<div id="msg_modal">&nbsp;</div>
						        <button type="submit" name="submit" id="loginBtn_modal" class="btn btn-default">Login</button>
						      </div>
						    </div>
  						</form>
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				      </div>
				    </div>

				  </div>
				</div>
				<!--Modal End-->
			</div>
	</body>
	<script type="text/javascript">
		$(document).ready(function(){
		 	$("#loginBtn_collapse").click(function(){	
			  	var email=$("#email_collapse").val();
			  	var password=$("#password_collapse").val();
			  	$.ajax({
			  		dataType: "json",
				   	type: "POST",
					url: "login.php",
					data: "email="+email+"&password="+password,
				   	success: function(data){  
				   	console.log(data);  
						if(data.status=='true'){
							$("#msg_collapse").html("Welcome"+data.name);
					 		window.location="index.php";
						}else{
							$("#msg_collapse").html("Wrong username or password");
						}
			   },
			   beforeSend:function()
			   {
					$("#msg_collapse").html("Loading...")
			   }
			});
			return false;
		});
		 	$("#loginBtn_modal").click(function(){	
			  	var email=$("#email_modal").val();
			  	var password=$("#password_modal").val();
			  	$.ajax({
			  		dataType: "json",
				   	type: "POST",
					url: "login.php",
					data: "email="+email+"&password="+password,
				   	success: function(data){  
				   	console.log(data);  
						if(data.status=='true'){
							$("#msg_modal").html("Welcome"+data.name);
					 		window.location="index.php";
						}else{
							$("#msg_modal").html("Wrong username or password");
						}
			   },
			   beforeSend:function()
			   {
					$("#msg_collapse").html("Loading...")
			   }
			});
			return false;
		});
	});
</script>
</html>