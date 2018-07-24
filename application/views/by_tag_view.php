<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class='container'>
    <h2>Posts Under Tag: <em>$tag</em></h2>
    <ul>

    <?php
    foreach ($posts_list as $post) {
        echo "<li><a href='". site_url("readpost/{$post['id_post']}") ."'>".$post['title_post']."</a></li>";
    }
    ?>

    </ul>
</div>