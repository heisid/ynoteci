<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>YNOTE</title>
<head>

<body>
    <?php
        foreach($recent_post as $post) {
            echo "<h3>".$post['title_post']."</h3>";
        }
    ?>
</body>
</html>