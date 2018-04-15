<?php 
?>
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
 ?>
    <tr class="info">
      <td><?=$row['id']?></td>
      <td><?=$row['purpose']?></td>
      <td><?=$row['description']?></td>
      <td><?=$row['address']?></td>
      <td><?=$row['user_id']?></td>
      <td><?=$row['status']?></td>
      <td><?=$row['last_modified']?></td>

    </tr>
    <?php     # code...
    }?>
  </tbody>
</table> 
