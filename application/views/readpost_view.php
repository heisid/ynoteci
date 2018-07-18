<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<h1><?php echo $full_post['title_post']; ?></h1>
<p><em><?php echo $full_post['date_post']; ?></em></p>
<p>Tags:
<?php
foreach($tags as $tag) {
    echo "<a href='#'>".$tag['tag']." </a>";
}
?>
</p>

<hr>

<?php echo $full_post['content']; ?>

<a href="<?php echo base_url(); ?>posting/edit/<?php echo $full_post['id_post']; ?>" class="btn btn-primary">Edit</a>
<form class="form-delete" action="<?php echo base_url(); ?>index.php/delete" method="post">
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