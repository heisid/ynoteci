<?php defined('BASEPATH') OR exit('No direct script access allowed');

echo "<div class='container'>";
echo "<h2>Tags</h2>";
echo "<ul>";

foreach ($tags as $tag) {
    echo "<li><a href='tags/by_tag/".$tag['tag']."'>".$tag['tag']."</a></li>";
}

echo "</ul>";
echo "</div>";