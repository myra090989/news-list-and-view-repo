<?php

//application/views/news/view.php
$this->load->view($this->config->item('theme') . 'header');

echo '<h2>'.$news_item['title'].'</h2>';
echo $news_item['text'];  


echo '<div>' . anchor('news','More News?') . '</div>';


$this->load->view($this->config->item('theme') . 'footer');