<div class='row'>
  <div class='col-sm-12'>
    <?php echo validation_errors('<div class="alert alert-danger" role="alert">', '</div>');
      if(!empty($this->config->item('errors'))){echo "<div class='alert alert-danger'>".$this->config->item('errors')."</div>";}
    ?>
  </div>
</div>
<form method='POST'>
  <div class='row'>
    <div class='col-sm-6'>
      <div class='form-group'>
        <label>Nama Situs</label>
        <input name='title' type='text' value='<?php echo safe_echo_input($title); ?>' class='form-control' placeholder='Nama situs' required maxlength="100"/>
      </div>
    </div>
    <div class='col-sm-6'>
      <div class='form-group'>
        <label>Tagline</label>
        <input name='tagline' type='text' value='<?php echo safe_echo_input($tagline); ?>' class='form-control' placeholder='Tagline' maxlength="100"/>
      </div>
    </div>
  </div>
  <div class='form-group'>
    <label>Dekripsi Situs</label>
    <textarea placeholder='Deskripsi situs' maxlength='300' name='description' class='form-control'><?php echo safe_echo_input($description); ?></textarea>
  </div>
  <div class='row'>
    <div class='col-sm-5'>
      <div class='form-group'>
        <label>Keywords</label>
        <input name='keyword' type='text' value='<?php echo safe_echo_input($keywords); ?>' placeholder='Keywords situs' class='form-control' maxlength="300"/>
      </div>
    </div>
    <div class='col-sm-2'>
      <div class='form-group'>
        <label>Post/page</label>
        <input name='post_sum' class='form-control' required value='<?php echo safe_echo_input($post_sum); ?>' min='1' max='99' type='number'/>
      </div>
    </div>
    <div class='col-sm-5'>
      <div class='form-group'>
        <label>Email Situs</label>
        <input name='email' required type='email' value='<?php echo safe_echo_input($email); ?>' class='form-control' placeholder='Email situs'/>
      </div>
    </div>
  </div>
  <button type='submit' name='submit' class='btn btn-primary'>Simpan</button>
</form>
