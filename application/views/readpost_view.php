<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
echo "<span style='color:red;'>".$permission_msg."</span>";
?>

<h1><?php echo $full_post['title_post']; ?></h1>
<p><em><?php echo $full_post['date_post']; ?></em></p>
<p><em>By <?php echo $full_post['author']; ?></em></p>

<?php
if (!empty($full_post['date_modified'])) {
    echo "<p><em>(Last Modified ". $full_post['date_modified'] .")</em></p>";
}
?>

<p>Tags:
    <?php
    foreach($tags as $tag) {
        echo "<a href='".site_url("tags/by_tag/{$tag['tag']}")."'>".$tag['tag']." </a>";
    }
    ?>
</p>

<hr>

<?php 
    echo $full_post['content'];

    $edit_post_link = site_url('posting/edit_post');
    $delete_post_link = site_url('delete');
    // print_r($modify_permission);
    if ($modify_permission) {
        echo <<<EOD
        <a href="{$edit_post_link}/{$full_post['id_post']}" class="btn btn-primary">Edit</a>
        <form class="form-delete" action="{$delete_post_link}" method="post">
            <button id="delete" class="btn btn-danger" type="submit" name="id_post" value="{$full_post['id_post']}">Delete</button>
        </form>

        <script>
            $(document).ready(function () {
                $("#delete").click(function (event) {
                    if (!confirm('Are you sure want to delete this post?')) {
                        event.preventDefault();
                    }
                });
            });
        </script>
EOD;
    }