<?php defined('BASEPATH') OR exit('No direct script access allowed');

echo "<div class='container'>";
echo "<h2>Posts Under Tag: <em>$tag</em></h2>";
echo "<ul>";

foreach ($posts_list as $post) {
    echo "<li><a href='". base_url() ."index.php/read_post/".$post['id_post']."'>".$post['title_post']."</a></li>";
}

echo "</ul>";
echo "</div>";