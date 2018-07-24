<?php
get_header();
?>
<div class="background-about">

<div class="task-main">
    <button type="button" name="save" id="add-new"><span>New Visit</span></button>
    <form class="task-section" style="display: none;">
       <div class="task-form">
            <div class="task-form-area">
                   <label>Visit Agenda</label>
            </div>
           <div class="task-form-test">
                <input type="text" id="exampleTextarea" placeholder="purpose" name="purpose">
           </div>
      </div>
       <div class="task-form">
            <div class="task-form-area">
                   <label>Select Purpose</label>
            </div>
           <div class="task-form-test">
             <select>
                  <option value="select purpose">Select Purpose</option>
                  <option value="doctor">Doctor</option>
                  <option value="medical store">Medical Store</option>
                  <option value="other">Other</option>
          </select>
           </div>
      </div>
      <div class="task-form">
         <div class="task-form-area">
              <label for="exampleTextarea">Description</label>
         </div>
         <div class="task-form-test">
              <textarea id="exampleTextarea" placeholder="Description"  name="description"></textarea>
          </div>
      </div>
      <div class="task-form">
           <div class="task-form-area">
                <label for="exampleTextarea">Address</label>
           </div>
           <div class="task-form-test">
                 <textarea id="exampleTextarea" placeholder="Address"  name="address"></textarea>
           </div>
      </div>
      <div class="task-form">
        <button type="button" class="btn btn-primary" name="save" id="submit-button">Submit</button>
        <input type="hidden" name="id">
        <input type="hidden" name="call" value="save">
      </div>
  </form>
</div>

 <div class="task-table-outer">
  <table class="task-table">
    <tr>
      <th>#Id</th>
      <th>Purpose</th>
      <th>Visit details</th>
      <th>Address</th>
      <th>Agent</th>
      <th>Manager</th>
      <th>Status</th>
      <th>Action</th>
    </tr>
    <?php
    foreach ($rows as $key => $row) {
     $user =  get_userdata($row['user_id']);
     $manager =  get_userdata($row['manager_id']);
    ?>
    <tr class="info">
      <td><?=$row['id']?></td>
      <td><?=$row['selectpurpose']?></td>
      <td><strong><?=$row['purpose']?></strong>
        <br>
        <?= nl2br($row['description'])?>
      </td>
      <td><?= nl2br($row['address'])?></td>
      <td><?=$user->display_name?></td>
      <td><?=$manager->display_name?></td>
      <td><strong><?=$row['status']?></strong>
          <br>
          <?=$row['last_modified']?>
      </td>
      <td>
        <button type="button" class="btn btn-primary add_comment_link" data-visit-id="<?=$row['id']?>">Comment+</button><br>
        <?php if($row['status'] == 'open') : ?>
        <button type="button" class="btn btn-primary" name="save" id="submit-button">Submit</button>
        <button type="button" class="btn btn-primary close_visit" data-visit-id="<?=$row['id']?>">CloseIt</button>
      <?php endif;?>
    </tr>
    <?php    	# code...
    } ?>
  </table> 
</div>
</div>
</div>
<?php get_footer(); ?>