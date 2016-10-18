<?php echo validation_errors('<div class="alert alert-danger" role="alert">', '</div>');
  if(!empty($this->config->item('errors'))){echo "<div class='alert alert-danger'>".$this->config->item('errors')."</div>";}
?>
<div class='row'>
  <div class='col-sm-4'>
    <?php echo form_open('admin/add_sidebar'); ?>
      <div class='form-group'>
        <input type='text' placeholder='Widget title' class='form-control' name='new_sidebar_title' value='<?php echo $this->form_validation->set_value('new_sidebar_title'); ?>'/>
      </div>
      <div class='form-group'>
        <textarea name='new_sidebar_content' placeholder='Widget content' required rows='10' class='form-control' style='margin-bottom:10px;'><?php echo $this->form_validation->set_value('new_sidebar_content'); ?></textarea>
        <div style='text-align:right;'><button type='submit' name='submit' class='btn btn-primary'>Tambah</button></div>
      </div>
    </form>
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
    <?php echo form_open('admin/set_widget_header'); ?>
      <div class='form-group'>
        <textarea class='form-control' placeholder='Header widget' name='header_widget'><?php echo safe_echo_input($widget_header['content']); ?></textarea>
      </div>
      <button type='submit' name='submit' class='btn btn-primary'>Simpan</button>
    </form>
  </div>
</div>
