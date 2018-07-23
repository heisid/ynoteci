<?php defined('BASEPATH') OR exit('No direct script access allowed');

if (!empty($logged_in_msg)) {
    echo "<span style='color:red;'>".$logged_in_msg."</span>";
}

echo <<<EOD
<div class="container">
    <h1>LATEST POSTS</h1>
EOD;

foreach ($recent_post as $post) {
    echo <<<EOD
    <div class="row post-showcase">
        <div class="col-md-12">
            <h3>{$post['title_post']}</h3>
            <p><em>{$post['date_post']}</em><p>
            <p>{$post['content']}</p>
            <a href="index.php/read_post/{$post['id_post']}" class="btn btn-primary">Read More</a>
        </div>
    </div>
EOD;
}
echo "</div>";
