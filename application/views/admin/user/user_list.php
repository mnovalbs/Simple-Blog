<div class='row'>
  <!-- <div class='col-sm-12'>
    <h2 class='header'>List Artikel</h2>
  </div> -->
</div>
<table class="table table-bordered data-table dataTable" id='myTable'>
  <thead>
    <tr>
      <th width='30'>No</th>
      <th>Nama</th>
      <th>Username</th>
      <th>Permission</th>
      <th>Time Created</th>
      <th>Edit</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $no = 1;
      foreach ($user as $us) {
        if($us['permission']==1){
          $permission = 'Admin';
        }else{
          $permission = 'User';
        }
        echo "<tr>
          <td style='text-align:center;'>".$no."</td>
          <td>".safe_echo_html($us['name'])."</td>
          <td>".safe_echo_html($us['username'])."</td>
          <td>".safe_echo_html($permission)."</td>
          <td>".safe_echo_html($us['createdTime'])."</td>
          <td style='text-align:center;'>
            <a class='edit-icon' href='".base_url('admin/edit_user/'.$us['id'])."'><i class='fa fa-pencil'></i></a>
            <a class='delete-icon' onclick='return confirm(\"Yakin ingin menghapus artikel ini?\")' href='".base_url('admin/delete_user/'.$us['id'])."'><i class='fa fa-trash'></i></a>
          </td>
        </tr>";
        $no++;
      }
    ?>
  </tbody>
</table>
