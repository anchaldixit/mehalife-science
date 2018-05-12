<h1>Reporting Team Management</h1>
<?php
if(!empty($m['msg'])){?>
<strong style="color:green"><?=$m['msg']?></strong>
<?php }elseif (!empty($m['error'])) {?>
<strong style="color:red"><?=$m['error']?></strong>

<?php }
?>
<form method="POST" action="/wp-admin/admin.php?page=reporting2u">
<select name="manager_id">
	<option value="">Select Manager Agent..</option>
	<?php 
	foreach ($agents_list as $key => $agent) :
		?>
		<option value="<?= $agent->ID?>"><?=$agent->display_name?></option>
		<?php
	endforeach;
	?>
</select>
<select name="reporting_id">
	<option value="">Select Reporting Agent..</option>
	<?php 
	foreach ($agents_list as $key => $agent) :
		?>
		<option value="<?= $agent->ID?>"><?=$agent->display_name?></option>
		<?php
	endforeach;
	?>
</select>
<input type="submit" name="submit" value="Add Agent to Manager">
</form>
<?php
//var_dump( get_user_by('id', 3)->data->display_name );
#show all added reportings
?>
 <table class="table table-dark">
  <thead>
    <tr>
      <th>#</th>
      <th>Manager</th>
      <th>Reporting Agent</th>
      <th>Last Modified</th>
      <th>Action</th>
    </tr>
  </thead>
    </tr>
    <?php
	foreach ($all_reportings as $key => $row) {
		$m =  get_userdata($row['manager_id']);
 	 	$r =  get_userdata($row['reporting_id']);
 		?>
	    <tr class="info">
			<td><?=$key+1?></td>
	      	<td><?=$m->display_name?></td>
	      	<td><?=$r->display_name?></td>
	      	<td><?=$row['status']?></td>
	      	<td><?=$row['last_modified']?></td>
	      	<td><a href="/wp-admin/admin.php?page=reporting2u&action=delete&id=<?=$row['id']?>">Delete</a>
		</tr>
    <?php }?>
  </tbody>
</table> 