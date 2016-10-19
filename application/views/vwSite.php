
<?php $this->load->view('includes/vwiAppheader'); ?>
<?php $this->load->view('includes/vwiNavbar'); ?>
<?php $this->load->view('includes/vwiSidebar'); ?> 

       
        
        <h1 class="page-header">Site: <?php print $site->si_site;?></h1>
        <h2>Uncategorized domains</h2>
        <table class="table table-striped">
	        <thead>
		        <th>Domain</th><th>Latest url</th><th>First seen</th>
	        </thead>
	        <tr>
		        <td>eb.dk</td>
		        <td>http:eb.dk/side9.dk</td>
		        <td>Today</td>
		        <td>
			        <select>
			        	<option>Good</option>
			        	<option>Neutral</option>
			        	<option>Bad</option>
			        </select>
				</td>
	        </tr>
        </table>
        
        <h2>Referring domains</h2>
        <table class="table table-striped">
	        <thead>
		       <th>Domain</th><th>Rating</th><th># Links</th><th>First seen</th>
	        </thead>
	        <tr>
		       <td>eb.dk</td><td>Good</td><td>1</td><td>Today</td>
	        </tr>
        </table>        

<?php $this->load->view('includes/vwiAppfooter'); ?>