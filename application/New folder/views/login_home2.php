<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <style type="text/css">
      .form-signin {
	   
	  max-height: 500px;
        max-width: 400px;
        padding: 20px 30px 30px;
        margin: 20px auto 20px;
        background-color: #E8EBAD;
        border: 2px solid black;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 15px;
        height: auto;
        margin-bottom: 15px;
        padding: 10px 10px;
      }

    </style>
</head>

<body>
<?php echo validation_errors(); ?>


 <div class="container" >

      <form class="form-signin" action="<?php echo $loginaction;?>" method="post">
	          <h2 class="form-signin-heading">Sign in</h2>
		<div>Email&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text"  name="email_id" class="input-large"  value="<?php echo set_value('email_id'); ?>" placeholder="Email address">
		<?php echo form_error('email_id', '<div class="error">', '</div>')?>
		</div>
		<div>Password&nbsp;&nbsp;&nbsp;<input type="password" name="password" class="input-large"  value="<?php echo set_value('password'); ?>" placeholder="Password">
		<?php echo form_error('password', '<div class="error">', '</div>')?>
		</div>
		<label class="checkbox">
		<input type="checkbox">Remember me<br> 
        </label><br>
			  <button class="btn btn-success" type="submit">Sign In</button>&nbsp;
			  <button class="btn btn-link" type="submit">Forget Password</button>
     
	  </form>
	  
</div>

		
              
			 
      </form>
	  
</div>
</body>
</html>