<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 
$read_post_url = site_url('read_post');
?>

<div class='container'>
    <h2>Posts Under Tag: <em><?php echo $tag; ?></em></h2>
    <ul>

    <?php
    foreach ($posts_list as $post) {
        echo "<li><a href='{$read_post_url}/{$post['id_post']}'>{$post['title_post']}</a></li>";
    }
    ?>

    </ul>
</div>