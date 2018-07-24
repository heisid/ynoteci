<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 
$by_tag_url = site_url('tags/by_tag');
?>

<div class='container'>
    <h2>Tags</h2>
    <ul>
        <?php
        foreach ($tags as $tag) {
            echo "<li><a href='{$by_tag_url}/{$tag['tag']}/'>{$tag['tag']}</a></li>";
        }
        ?>
    </ul>
</div>