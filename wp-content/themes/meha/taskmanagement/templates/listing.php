<?php
?>
<div class="col-md-10">
 <button type="button" class="btn btn-primary" name="save" id="add-new">Add New</button>
 <br>


  <form id="task-form">
    
      <div class="form-group">
          <label for="text">Visit Agenda</label>
          <input type="text" class="form-control" id="text" placeholder="purpose" name="purpose">
      </div>
      <div class="form-group">
        <label for="exampleTextarea">Description</label>
        <textarea class="form-control" id="exampleTextarea" rows="3" name="description"></textarea>
      </div>
      <div class="form-group">
        <label for="exampleTextarea">Address</label>
        <textarea class="form-control" id="exampleTextarea" rows="3" name="address"></textarea>
      </div>
      <div class="form-group">
        <button type="button" class="btn btn-primary" name="save" id="submit-button">Submit</button>
        <input type="hidden" name="id">
        <input type="hidden" name="call" value="save">
      </div>
  </form>
  <table class="table table-striped table-hover ">
    <tr>
      <th>#Visit Id</th>
      <th>Visit Agenda</th>
      <th width="40%">Description</th>
      <th>Address</th>
      <th>Agent</th>
      <th>Manager</th>
      <th>Status</th>
      <th>last_modified</th>
      <th>Action</th>
    </tr>
    <?php
    foreach ($rows as $key => $row) {
     $user =  get_userdata($row['user_id']);
     $manager =  get_userdata($row['manager_id']);
    ?>
    <tr class="info">
      <td><?=$row['id']?></td>
      <td><?=$row['purpose']?></td>
      <td><?= nl2br($row['description'])?></td>
      <td><?= nl2br($row['address'])?></td>
      <td><?=$user->display_name?></td>
      <td><?=$manager->display_name?></td>
      <td><?=$row['status']?></td>
      <td><?=$row['last_modified']?></td>
      <td>
        <button type="button" class="btn btn-primary add_comment_link" data-visit-id="<?=$row['id']?>">Comment+</button>
        <?php if($row['status'] == 'open') : ?>
        <button type="button" class="btn btn-primary close_visit" data-visit-id="<?=$row['id']?>">CloseIt</button>
      <?php endif;?>
    </tr>
    <?php    	# code...
    } ?>
  </table> 
</div>