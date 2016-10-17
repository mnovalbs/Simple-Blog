<div class='row'>
  <div class='col-sm-12'>
    <?php echo validation_errors('<div class="alert alert-danger" role="alert">', '</div>');
      if(!empty($this->config->item('errors'))){echo "<div class='alert alert-danger'>".$this->config->item('errors')."</div>";}
    ?>
  </div>
</div>
<form method='POST' id='unsave-form'>
  <div class='row'>
    <div class='col-sm-9'>
      <?php
      $csrf = array(
        'name' => $this->security->get_csrf_token_name(),
        'hash' => $this->security->get_csrf_hash()
      );
      ?>
      <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
      <div class='form-group'>
        <label>Judul Artikel</label>
        <input placeholder='Judul artikel' value='<?php echo set_value('title'); ?>' type='text' name='title' required class='form-control' maxlength="150"/>
      </div>
      <div class='form-group'>
        <label>Konten</label>
        <textarea class='tinyMCE form-control' name='description' placeholder='Deskripsi artikel'><?php echo set_value('description'); ?></textarea>
        <?php includeTinyMCE(base_url('assets/admin/vendor/tinymce/tinymce.min.js')); ?>
      </div>
    </div>
    <div class='col-sm-3'>
      <div class='form-group'>
        <label>Custom Link</label>
        <input placeholder='Custom link' value='<?php echo set_value('custom_link'); ?>' type='text' name='custom_link' class='form-control' maxlength="180" aria-describedby="basic-addon2"/>
      </div>
      <div class='form-group'>
        <label>Published : </label>
        <select name='status' required class='form-control'>
          <option value='1'>Yes</option>
          <option value='2'>No</option>
        </select>
      </div>
      <div class='form-group'>
        <label>Kategori : </label>
        <select name='category' required class='form-control'>
          <?php
            foreach ($kategori as $cat) {
              echo "<option value='".$cat['id']."'>".safe_echo_html($cat['title'])."</option>";
            }
          ?>
        </select>
      </div>
      <div class='form-group'>
        <label>Custom Description : </label>
        <textarea rows='5' name='custom_description' class='form-control' maxlength="300" placeholder="Custom Description"><?php echo set_value('custom_description'); ?></textarea>
      </div>
      <div class='form-group'>
        <button type='submit' name='tambah' class='btn btn-primary'><i class='fa fa-ok'></i>Simpan</button>
        <a href='<?php echo base_url('admin/list_artikel'); ?>' class='btn btn-danger'>Batal</a>
      </div>
    </div>
  </div>
</form>
