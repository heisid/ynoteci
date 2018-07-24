<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
echo "<span style='color:red;'>".$permission_msg."</span>";
?>

<h1><?php echo $full_post['title_post']; ?></h1>
<p><em><?php echo $full_post['date_post']; ?></em></p>
<p><em>By <a href="<?php echo site_url('authors/by_author/').$full_post['author']; ?>"><?php echo $full_post['author']; ?></a></em></p>

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

    $edit_post_url = site_url('posting/edit_post/').$full_post['id_post'];
    $delete_post_url = site_url('delete');
    
    if ($permission['edit_perm']) {
        echo "<a href='$edit_post_url' class='btn btn-primary'>Edit</a>";
    }

    if ($permission['delete_perm']) {
        echo <<<EOD
        <form class="form-delete" action="{$delete_post_url}" method="post">
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