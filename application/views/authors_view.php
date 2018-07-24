<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 
$by_author_url = site_url('authors/by_author');
?>

<div class='container'>
    <h2>Authors:</h2>
    <ul>
        <?php
        foreach ($authors as $author) {
            echo "<li><a href='{$by_author_url}/{$author['username']}/'>{$author['username']}</a></li>";
        }
        ?>
    </ul>
</div>