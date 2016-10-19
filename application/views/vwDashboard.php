
<?php $this->load->view('includes/vwiAppheader'); ?>
<?php $this->load->view('includes/vwiNavbar'); ?>
<?php $this->load->view('includes/vwiSidebar'); ?> 

       
        
        <h1 class="page-header">Dashboard</h1>
        
        <table class="table table-striped">
	        <thead>
		        <th>Site</th><th>Links</th><th>Referring domains</th><th></th>
	        </thead>
	        <?php foreach($sites AS $site): ?>
	        <tr>
		        <td><a href="site/<?php print $site->si_siteid;?>"><?php print $site->si_site;?></a></td>
		        <td><?php print $this->dashboard_model->count_links($site->si_siteid);?></td>
		        <td><?php print $this->dashboard_model->count_domains($site->si_siteid);?></td>
		        <td style="text-align: right;"><i class="fa fa-upload" aria-hidden="true"></i> <i class="fa fa-trash" aria-hidden="true"></i></td>
	        </tr>
	        <?php endforeach; ?>
        </table>

<?php $this->load->view('includes/vwiAppfooter'); ?>