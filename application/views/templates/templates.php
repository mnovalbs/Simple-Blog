<?php
  if(!isset($template)){$template = 'default';}
  if(!isset($template_content)){$template_content = 'home/index';}

  $this->load->view("templates/".$template."/header");
  $this->load->view("templates/".$template."/".$template_content);
  $this->load->view("templates/".$template."/footer");

?>
