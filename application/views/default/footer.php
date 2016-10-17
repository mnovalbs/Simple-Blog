      </div>
      <div class='col-sm-3'>
        <div class='widget'>
          <h3>Popular Posts</h3>
          <div class='widget-content'>
            <ul>
            <?php
              foreach ($this->config->item('popular_post') as $pPost) {
                echo "<li><a href='".base_url('post/index/'.$pPost['tahun'].'/'.intToStr($pPost['bulan']).'/'.$pPost['url'])."'>".safe_echo_html($pPost['title'])."</a></li>";
              }
            ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
<script src="<?php echo base_url('assets/default/js/jquery-3.1.1.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/default/js/bootstrap.min.js'); ?>"></script>
</body>
</html>
