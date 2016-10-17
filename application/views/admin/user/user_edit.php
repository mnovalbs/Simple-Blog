<div class='row'>
  <div class='col-sm-12'>
    <?php echo validation_errors('<div class="alert alert-danger" role="alert">', '</div>');
      if(!empty($this->config->item('errors'))){echo "<div class='alert alert-danger'>".$this->config->item('errors')."</div>";}
    ?>
  </div>
</div>
<form method='POST' id='unsave-form'>
  <?php
  $csrf = array(
    'name' => $this->security->get_csrf_token_name(),
    'hash' => $this->security->get_csrf_hash()
  );
  ?>
  <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
  <div class='row'>
    <div class='col-sm-6'>
      <div class='form-group'>
        <label>Nama</label>
        <input name='nama' type='text' required class='form-control' maxlength='100' value='<?php echo safe_echo_input($user['name']); ?>'/>
      </div>
    </div>
    <div class='col-sm-6'>
      <div class='form-group'>
        <label>Email</label>
        <input name='email' type='email' required class='form-control' maxlength="150" value='<?php echo safe_echo_html($user['email']); ?>'/>
      </div>
    </div>
  </div>
</form>
