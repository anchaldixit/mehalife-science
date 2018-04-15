<?php
?>
<form id="task-form">
  <div class="col-md-6">
      <div class="form-group" >
        <div class="form-group">
            <label for="text">purpose</label>
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
 </div>
  </form>

<table class="table table-striped table-hover ">
  <thead>
    <tr>
      <th>#</th>
      <th>purpose</th>
      <th>Description</th>
      <th>Address</th>
      <th>user_id</th>
      <th>status</th>
      <th>last_modified</th>
    </tr>
  </thead>
    </tr>
    <?php
    foreach ($rows as $key => $row) {
     $user =  get_userdata($row['user_id']);
 ?>
    <tr class="info">
      <td><?=$row['id']?></td>
      <td><?=$row['purpose']?></td>
      <td><?=$row['description']?></td>
      <td><?=$row['address']?></td>
      <td><?=$user->display_name?></td>
      <td><?=$row['status']?></td>
      <td><?=$row['last_modified']?></td>
    </tr>
    <?php    	# code...
    }?>
  </tbody>
</table> 