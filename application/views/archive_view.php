<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container">
<h2>Archive</h2>

<?php
foreach ($list_all_posts as $post) {
    echo <<<EOD
    <div class="row">
        <div class="col-md-2">
            <em>{$post['date_post']}</em>
        </div>
        <div class="col-md-10">
            <a href="read_post/{$post['id_post']}">{$post['title_post']}</a>
        </div>
    </div>
EOD;
}
?>
</div>