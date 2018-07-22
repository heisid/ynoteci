<?php defined('BASEPATH') OR exit('No direct script access allowed');

echo "<div class='container'>";
echo "<h2>Search result for: <em>$search_string</em></h2>";
echo "<ul>";

foreach ($list_posts as $post) {
    echo "<li><a href='". site_url() ."read_post/".$post['id_post']."'>".$post['title_post']."</a></li>";
}

echo "</ul>";
echo "</div>";