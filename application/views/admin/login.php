<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title><?php echo "Administrator Login - ".safe_echo_html($this->config->item('site_title')); ?></title>
    <link href="<?php echo base_url('assets/default/css/bootstrap.min.css'); ?>" rel="stylesheet"/>
    <style>
    body {
      background: #f5f5f5;
    }
    .login {
      max-width: 300px;
      margin: 0 auto;
      position: relative;
    }
    .login .dalam{
      padding: 20px;
      background: #fff;
      border-radius: 3px;
      box-shadow: 1px 1px 3px #b9b9b9;
    }
    .login h1 {
        margin: 0 0 10px 0;
        text-align: center;
        font-size: 23px;
        text-transform: uppercase;
        font-weight: bold;
    }
    </style>
  </head>

  <body>
    <div class="login">
      <?php echo validation_errors('<div class="alert alert-danger" role="alert">', '</div>');
        if(!empty($this->config->item('errors'))){echo "<div class='alert alert-danger'>".$this->config->item('errors')."</div>";}
      ?>
      <div class='dalam'>
      	<h1>Login</h1>
        <?php echo form_open('admin/login'); ?>
          <div class='form-group'>
            <input type="text" class='form-control' value="<?php echo $this->form_validation->set_value('username'); ?>" name="username" placeholder="Username"/>
          </div>
          <div class='form-group'>
            <input type="password" class='form-control' value='<?php echo $this->form_validation->set_value('password'); ?>' name="password" placeholder="Password"/>
          </div>
          <div class='form-group'>
            <button type="submit" name='submit' class="btn btn-primary btn-block btn-small">Login</button>
          </div>
        </form>
      </div>
    </div>
    <script src="<?php echo base_url('assets/default/js/jquery-3.1.1.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/default/js/bootstrap.min.js'); ?>"></script>
    <script>
      $(window).bind("load resize",function(){
        var tinggiLayar = $(window).height();
        var tinggiKotak = $(".login").height();
        if(tinggiLayar > tinggiKotak){
          $(".login").css('top', (tinggiLayar - tinggiKotak) / 2);
        }
      });
    </script>
  </body>
</html>
