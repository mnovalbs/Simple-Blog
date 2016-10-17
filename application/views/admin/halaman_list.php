<div class='row'>
  <!-- <div class='col-sm-12'>
    <h2 class='header'>List Artikel</h2>
  </div> -->
</div>
<table class="table table-bordered data-table dataTable" id='myTable'>
  <thead>
    <tr>
      <th width='40'>No</th>
      <th>Judul</th>
      <th>Status</th>
      <th>Url</th>
      <th>Time Post</th>
      <th>Edit</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $no = 1;
      foreach ($page as $post) {
        echo "<tr>
          <td style='text-align:center;'>".$no."</td>
          <td>".safe_echo_html($post['title'])."</td>
          <td>".safe_echo_html($post['status'])."</td>
          <td>".safe_echo_html($post['url'])."</td>
          <td>".safe_echo_html($post['TSPost'])."</td>
          <td style='text-align:center;'>
            <a class='edit-icon' href='".base_url('admin/edit_halaman/'.$post['id'])."'><i class='fa fa-pencil'></i></a>
            <a class='delete-icon' onclick='return confirm(\"Yakin ingin menghapus halaman ini?\")' href='".base_url('admin/delete_halaman/'.$post['id'])."'><i class='fa fa-trash'></i></a>
          </td>
        </tr>";
        $no++;
      }
    ?>
  </tbody>
</table>
