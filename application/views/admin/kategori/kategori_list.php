<div class='row'>
  <!-- <div class='col-sm-12'>
    <h2 class='header'>List Artikel</h2>
  </div> -->
  <?php echo validation_errors('<div class="alert alert-danger" role="alert">', '</div>');
    if(!empty($this->config->item('errors'))){echo "<div class='alert alert-danger'>".$this->config->item('errors')."</div>";}
  ?>
</div>
<form class='form-inline' style='margin-bottom:20px;' method='POST'>
  <div class='form-group'>
    <input class='form-control' required name='title' value='<?php echo $this->form_validation->set_value('title'); ?>' placeholder='Kategori baru'/>
  </div>
  <button type='submit' name='submit' class='btn btn-primary'>Tambah</button>
</form>
<table class="table table-bordered data-table dataTable" id='myTable'>
  <thead>
    <tr>
      <th width='30'>No</th>
      <th>Nama</th>
      <th>URL</th>
      <th>Edit</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $no = 1;
      foreach ($kategori as $kat) {
        echo "<tr>
          <td style='text-align:center;'>".$no."</td>
          <td>".safe_echo_html($kat['title'])."</td>
          <td>".safe_echo_html($kat['url'])."</td>
          <td style='text-align:center;'>
            <!--<a class='edit-icon' href='".base_url('admin/edit_kategori/'.$kat['id'])."'><i class='fa fa-pencil'></i></a>-->
            <a class='delete-icon' onclick='return confirm(\"Yakin ingin menghapus kategori ini?\")' href='".base_url('admin/delete_kategori/'.$kat['id'])."'><i class='fa fa-trash'></i></a>
          </td>
        </tr>";
        $no++;
      }
    ?>
  </tbody>
</table>
