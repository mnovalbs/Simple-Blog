<?php echo validation_errors('<div class="alert alert-danger" role="alert">', '</div>');
  if(!empty($this->config->item('errors'))){echo "<div class='alert alert-danger'>".$this->config->item('errors')."</div>";}
?>
<div class='row'>
  <div class='col-sm-4'>
    <?php
      foreach ($sidebar as $swid) {
        $title = "Widget";
        if(!empty($swid['title'])){$title=$swid['title'];}
        echo "<form method='POST'><div class='widget'>
          <div class='widget-title'>
            ".safe_echo_html($title)."
          </div>
          <div class='widget-content'>
            <div class='hilang'>
              <input type='hidden' name='id' value='".safe_echo_input($swid['id'])."'/>
              <div class='form-group'>
                <input type='text' class='form-control' name='title' value='".safe_echo_html($swid['title'])."'/>
              </div>
              <div class='form-group'>
                <textarea name='content' required rows='10' class='form-control' style='margin-bottom:10px;'>".safe_echo_input($swid['content'])."</textarea>
                <div style='text-align:right;'><button type='submit' name='submit' class='btn btn-primary'>Simpan</button></div>
              </div>
            </div>
          </div>
          <div class='widget-edit'>
            <a href='#!' class='do_edit'>Edit</a>
            <a href='".base_url('admin/delete_widget/'.$swid['id'])."' onclick='return confirm(\"Hapus widget ini?\")'>Hapus</a>
          </div>
        </div></form>";
      }
    ?>
  </div>
  <div class='col-sm-8'>

  </div>
</div>
