<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class='container'>
    <h2>Search result for: <em><?php echo $search_string; ?></em></h2>
    <ul>
    <?php
    foreach ($list_posts as $post) {
        echo "<li><a href='" . site_url("read_post/{$post['id_post']}"). "'>" . $post['title_post'] . "</a></li>";
    }
    ?>
    </ul>
</div>
