<div class='posts-list row'>
  <?php foreach ($artikel as $post) {?>
    <div class="list-post col-sm-4">
      <div class='dalam'>
        <div class="gambar">
          <a href="<?php echo base_url('view/'.$post['url']); ?>"><img src="<?php echo base_url('assets/images/'.$post['thumbnailWidth'].'x'.$post['thumbnailHeight'].'/'.$post['thumbnail']); ?>"/></a>
        </div>
        <div class="meta-post">
          <a class="kategori" href="#!">Kategori</a>
          <div class="stuff_article_inner">
            <?php
              $tgl = explode('-',substr($post['TSPost'],0,10));
            ?>
            <span class="tanggal"><strong><?php echo $tgl[2]; ?></strong> <?php echo bulan($tgl[1])." ".$tgl[0]; ?></span>
            <h2><a href="<?php echo base_url('view/'.$post['url']); ?>"><?php echo strip_quotes(strip_tags($post['title'])); ?></a></h2>
            <!--<p><?php echo substr(strip_tags($post['description']),0,150) ?>...</p>-->
          </div>
        </div>
      </div>
    </div>
  <?php } ?>
</div>
