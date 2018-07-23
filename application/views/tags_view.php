<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class='container'>
    <h2>Tags</h2>
    <ul>
        <?php
        foreach ($tags as $tag) {
            echo "<li><a href='tags/by_tag/".$tag['tag']."'>".$tag['tag']."</a></li>";
        }
        ?>
    </ul>
</div>