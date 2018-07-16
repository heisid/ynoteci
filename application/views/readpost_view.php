<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

echo "<h1>".$full_post['title_post']."</h1>";
echo "<p><em>".$full_post['date_post']."</em></p>";
echo "<hr>";
echo $full_post['content'];