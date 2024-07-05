<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include('./db_connect.php');
?>
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Login | School Event Evaluation Gatherer and Summarization System
</title>


<?php include('./header.php'); ?>
<?php
if(isset($_SESSION['login_id']))
header("location:index.php?page=home");

?>

</head>
<style>
	body{
		width: 100%;
background-color:#8B0000;
	    height: calc(100%);
	    position: fixed;
	    top:0;
	    left: 0;

	}
	main#main{
		width:100%;

		height: calc(100%);
		display: flex;
	}
  #logo{
	position:fixed;
	top:0;
	left:100;

}
.button{
  background-color: #8B0000;
   border: none;
   color: white;
}


</style>



  <main id="main" >
  		<div class="align-self-center w-100">
        <div id="logo">
<div style="text-align: left;"><img src="perpetual-logo.png" width="200" alt="My Image" /></div>

  <div style="text-align: left;"><img src="perpetual-bg.png" width="1600" alt="My Image" /></div>

  </div>
		<h3 class="text-yellow text-center "><b>School Event Evaluation Gatherer and Summarization System</b></h3>

  		<div id="login-center" class="bg-white row justify-content-center">


  			<div class="card col-md-4">
  				<div class="card-body">
  					<form id="login-form" >
  						<div class="form-group">
  							<label for="email" class="control-label text-yellow">Email</label>
  							<input type="text" id="email" name="email" class="form-control form-control-sm">
  						</div>
  						<div class="form-group">
  							<label for="password" class="control-label text-yellow">Password</label>
  							<input type="password" id="password" name="password" class="form-control form-control-sm">
  						</div>
  						<center><button class="button text-yellow btn-sm btn-block btn-wave col-md-4 btn-primary">Login</button></center>
						<div class="form-group">
  							<a href="new_user2.php" class="control-label text-yellow">Register</a>
  						</div>
  					</form>
  				</div>
  			</div>
  		</div>
  		</div>

  </main>

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>


</body>
<script>
	$('#login-form').submit(function(e){
		e.preventDefault()
		$('#login-form button[type="button"]').attr('disabled',true).html('Logging in...');
		if($(this).find('.alert-danger').length > 0 )
			$(this).find('.alert-danger').remove();
		$.ajax({
			url:'ajax.php?action=login',
			method:'POST',
			data:$(this).serialize(),
			error:err=>{
				console.log(err)
		$('#login-form button[type="button"]').removeAttr('disabled').html('Login');

			},
			success:function(resp){
				if(resp == 1){
					location.href ='index.php?page=home';
				}else{
					$('#login-form').prepend('<div class="alert alert-danger">Username or password is incorrect.</div>')
					$('#login-form button[type="button"]').removeAttr('disabled').html('Login');
				}
			}
		})
	})
	$('.number').on('input',function(){
        var val = $(this).val()
        val = val.replace(/[^0-9 \,]/, '');
        $(this).val(val)
    })
</script>
</html>
