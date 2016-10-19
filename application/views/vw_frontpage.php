
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
   

    <title>Newlylinks.com coming up...</title>

    <!-- Bootstrap core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/cover.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <script type="text/javascript">
    $(window).load(function(){
        $('#signupModal').modal('show');
    });
</script>

  <body>

    <div class="site-wrapper">

      <div class="site-wrapper-inner">

        <div class="cover-container">

          <div class="masthead clearfix">
            <div class="inner">
              <h3 class="masthead-brand">Newlylinks.com</h3>
              <nav>
                <ul class="nav masthead-nav">
                  <li class="active"><a href="#">Home</a></li>
                  <li><a href="#">Features</a></li>
                  <li><a href="mailto:hello@newlylinks.com">Contact</a></li>

                  
                  <?php if(isset($this->session->username)) { ?>
				  	<li>Hi <?php print $this->session->username;?></li>
                  <li>
                  	<a href="dashboard" class="btn btn-primary btn-lg">
				  		Dashboard
				  	</a>
				  </li>
				  <?php } else { ?>				  	
                  <li>
                  	<button type="button" class="btn btn-default btn-lg" data-toggle="modal" data-target="#signinModal">
				  		Log in
				  	</button>
				  </li>    
				  <li>
                  	<button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#signupModal">
				  		Sign up
				  	</button>
				  </li>            
				  <?php } ?>      
                </ul>
              </nav>
            </div>
          </div>

          <div class="inner cover">
            <h1 class="cover-heading">Your next link tool.</h1>
            <p class="lead">We're building Newlylinks.com. Your next link tool.</p>
            <p class="lead">
              <!--<a href="#" class="btn btn-lg btn-default">Learn more</a>-->
            </p>
          </div>

          <div class="mastfoot">
            <div class="inner">
              <p></p>
            </div>
          </div>

        </div>

      </div>

    </div>
    
    <!-- Button trigger modal -->
<!-- signinModal -->
<div class="modal fade" id="signinModal" tabindex="-1" role="dialog" aria-labelledby="Sign in">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Sign in</h4>
      </div>
      <div class="modal-body">
	      
	      <?php if(isset($signin_error_text)){ ?>
	      <div class="alert alert-danger">
	      <?php print $signin_error_text; ?>
	      </div> 
	      <?php } ?>
	      
	        <form method="post">
		        <div class="form-group">
				<label for="email">Email:</label><?php echo form_error('email'); ?>
			   		<input type="email" name="email" value="<?php echo set_value("email");?>" class="form-control input-lg"/>
		    	</div>
		    	<div class="form-group">
				<label for="email">Password:</label><?php echo form_error('password'); ?>
			   		<input type="password" name="password" value="<?php echo set_value("password");?>" class="form-control input-lg"/>
		    	</div>
		    	<div class="checkbox">
					<label>
					<input type="checkbox" name="remember"> Remember me
					</label>
  				</div>
		    	<div class="form-group">
			   	 <button name="signin" type="submit" value="Log in" class="btn btn-success btn-lg"/>Log in</button>
		    	</div>
	        </form>
        Dont have an account? <a href="#" data-toggle="modal" data-target="#signupModal">Sign up</a>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>
<!-- signupModal -->
<div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="Sign up">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Sign up</h4>
      </div>
      <div class="modal-body">
	      <form method="post">
		    	<div class="form-group">
			    	<label for="name">Username:</label><?php echo form_error('username'); ?>
			    	<input type="text" name="username" value="<?php echo set_value("username");?>" class="form-control input-lg"/>
		    	</div>
		    	<div class="form-group">
				<label for="email">Email:</label><?php echo form_error('email'); ?>
			   		<input type="email" name="email" value="<?php echo set_value("email");?>" class="form-control input-lg"/>
		    	</div>
		    	<div class="form-group">
				<label for="email">Password:</label><?php echo form_error('password'); ?>
			   		<input type="password" name="password" value="<?php echo set_value("password");?>" class="form-control input-lg"/>
		    	</div>
		    	<div class="form-group">
				<label for="email">Confirm password:</label><?php echo form_error('passconf'); ?>
			   		<input type="password" name="passconf" value="<?php echo set_value("passconf");?>" class="form-control input-lg"/>
		    	</div>
		    	<div class="form-group">
			   	 <button name="signup" type="submit" value="Sign up" class="btn btn-success btn-lg"/>Proceed to payment</button><img src="https://www.paypalobjects.com/webstatic/mktg/logo/pp_cc_mark_37x23.jpg"  style="margin-left: 10px;" border="0" alt="PayPal Logo">
		    	</div>
		      
	      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    
    <?php if(isset($signup_error)){ ?>
      <script type="text/javascript">
    $(window).load(function(){
        $('#signupModal').modal('show');
    });
</script>
	<?php } ?>
    <?php if(isset($signin_error)){ ?>
      <script type="text/javascript">
    $(window).load(function(){
        $('#signinModal').modal('show');
    });
</script>
	<?php } ?>

  </body>
</html>
