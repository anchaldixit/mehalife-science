<h1>Reporting Team Management</h1>
<?php
//var_dump($agents_list);
?>
<form method="POST" action="/wp-admin/admin.php?page=reporting">
<select name="manager_id">
	<option>Select Manager Agent..</option>
	<?php 
	foreach ($agents_list as $key => $agent) :
		?>
		<option value="<?= $agent->ID?>"><?=$agent->display_name?></option>
		<?php
	endforeach;
	?>
</select>
<select name="reporting_id">
	<option>Select Reporting Agent..</option>
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
//var_dump($all_reportings);
//var_dump( get_user_by('id', 3)->data->display_name );
#show all added reportings