<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

foreach($recent_post as $post) {
    echo "<h3>".$post['title_post']."</h3>";
}
