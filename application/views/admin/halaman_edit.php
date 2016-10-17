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
        <label>Judul Halaman</label>
        <input placeholder='Judul Halaman' value='<?php echo safe_echo_input($page['title']); ?>' type='text' name='title' required class='form-control' maxlength="150"/>
      </div>
      <div class='form-group'>
        <label>Konten</label>
        <textarea class='tinyMCE form-control' name='description' placeholder='Konten'><?php echo safe_echo_input($page['content']); ?></textarea>
        <?php includeTinyMCE(base_url('assets/admin/vendor/tinymce/tinymce.min.js')); ?>
      </div>
    </div>
    <div class='col-sm-3'>
      <div class='form-group'>
        <label>Judul Singkat</label>
        <input placeholder="Judul Singkat" value='<?php echo safe_echo_input($page['short_title']); ?>' type='text' name='short_title' class='form-control' maxlength="100"/>
      </div>
      <div class='form-group'>
        <label>Published : </label>
        <select name='status' required class='form-control'>
          <option value='1' <?php if($page['status']==1){echo "selected";} ?>>Yes</option>
          <option value='2' <?php if($page['status']!=1){echo "selected";} ?>>No</option>
        </select>
      </div>
      <div class='form-group'>
        <button type='submit' name='tambah' class='btn btn-primary'><i class='fa fa-ok'></i>Simpan</button>
        <a href='<?php echo base_url('admin/list_artikel'); ?>' class='btn btn-danger'>Batal</a>
      </div>
    </div>
  </div>
</form>
