
<?php $this->load->view('includes/vwiAppheader'); ?>
<?php $this->load->view('includes/vwiNavbar'); ?>
<?php $this->load->view('includes/vwiSidebar'); ?> 

       
        
<h1 class="page-header">Add site</h1>

<div class="col-md-6">          
	<form method="post">
	    <div class="form-group">
		<label for="site">Site:</label><?php echo form_error('site'); ?>
	   		<input type="text" id="site" name="site" placeholder="eg: facebook.com" value="<?php  echo set_value("site");?>" class="form-control input-lg"/>
	   		<span id="helpBlock" class="help-block">Enter the domain name you wish to find new links to. Enter without http(s)://www.</span>
		</div>
		<div class="form-group">
	   	 <button name="add_site" type="submit" value="Add site" class="btn btn-success btn-lg"/>Add site</button>
		</div>
	</form>
</div>

          


<?php $this->load->view('includes/vwiAppfooter'); ?>