<div id='single-article' itemscope itemtype="http://schema.org/NewsArticle">
  <meta itemscope itemprop="mainEntityOfPage"  itemType="https://schema.org/WebPage" itemid="https://google.com/article"/>
  <h2 itemprop="headline"><?php echo safe_echo_html($artikel['title']); ?></h2>
  <small itemprop="author" itemscope itemtype="https://schema.org/Person">
    By <span itemprop="name"><?php echo safe_echo_html($artikel['author']); ?></span>
  </small>
  <div itemprop="description">
    <?php
      echo $artikel['description'];
    ?>
  </div>
  <!-- <div itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
    <img src="https://google.com/thumbnail1.jpg"/>
    <meta itemprop="url" content="https://google.com/thumbnail1.jpg">
    <meta itemprop="width" content="800">
    <meta itemprop="height" content="800">
  </div>
  <div itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
    <div itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
      <img src="https://google.com/logo.jpg"/>
      <meta itemprop="url" content="https://google.com/logo.jpg">
      <meta itemprop="width" content="600">
      <meta itemprop="height" content="60">
    </div>
    <meta itemprop="name" content="Google">
    <meta itemprop="dateModified" content="2015-02-05T09:20:00+08:00"/>
  </div> -->
  <meta itemprop="datePublished" content="<?php echo safe_echo_html($artikel['TSPost']); ?>"/>
</div>
