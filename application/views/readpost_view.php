<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<h1><?php echo $full_post['title_post']; ?></h1>
<p><em><?php echo $full_post['date_post']; ?></em></p>
<?php
    if (!empty($full_post['date_modified'])) {
        echo "<p><em>(Last Modified ". $full_post['date_modified'] .")</em></p>";
    }
?>

<p>Tags:
<?php
foreach($tags as $tag) {
    echo "<a href='".site_url()."/tags/by_tag/".$tag['tag']."'>".$tag['tag']." </a>";
}
?>
</p>

<hr>

<?php echo $full_post['content']; ?>

<a href="<?php echo site_url(); ?>/posting/edit_post/<?php echo $full_post['id_post']; ?>" class="btn btn-primary">Edit</a>
<form class="form-delete" action="<?php echo site_url(); ?>/delete" method="post">
    <button id="delete" class="btn btn-danger" type="submit" name="id_post" value="<?php echo $full_post['id_post']; ?>">Delete</button>
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