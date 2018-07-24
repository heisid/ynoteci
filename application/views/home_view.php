<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

if (!empty($logged_in_msg)) {
    echo "<span style='color:red;'>".$logged_in_msg."</span>";
}
?>

<div class="container">
    <h1>LATEST POSTS</h1>
    <?php
    $read_url = site_url('read_post');
    foreach ($recent_post as $post) {
        echo <<<EOD
        <div class="row post-showcase">
            <div class="col-md-12">
                <h3>{$post['title_post']}</h3>
                <p><em>{$post['date_post']}</em><p>
                <p>{$post['content']}</p>
                <a href="{$read_url}/{$post['id_post']}" class="btn btn-primary">Read More</a>
            </div>
        </div>
EOD;
    }
    ?>

</div>
