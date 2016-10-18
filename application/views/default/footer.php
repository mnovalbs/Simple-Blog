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
        <?php
          foreach ($this->config->item('sidebar') as $sidebar) {
            echo "<div class='widget'>";
            if(!empty($sidebar['title'])){
              echo "<h3>".safe_echo_html($sidebar['title'])."</h3>";
            }
            echo "<div class='widget-content'>".$sidebar['content']."</div>";
            echo "</div>";
          }
        ?>
      </div>
    </div>
  </div>
<script src="<?php echo base_url('assets/default/js/jquery-3.1.1.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/default/js/bootstrap.min.js'); ?>"></script>
</body>
</html>
