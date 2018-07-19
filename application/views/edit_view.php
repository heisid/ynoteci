<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<script src="<?php echo assets_url(); ?>js/ckeditor/ckeditor.js"></script>

<h3>Edit Post</h3>
<form action="<?php echo base_url(); ?>index.php/posting/save_post" method="post">
    <input type="hidden" name="id_post" value="<?php echo $post_data['id_post']; ?>">
    <div class="form-group">
        <label for="post-title">Title</label>
        <input name="title_post" class="form-control form-control-lg" id="post-title" type="text"
            value="<?php echo $post_data['title_post']; ?>">
    </div>
    <div class="form-group">
        <label for="post-content">Content</label>
        <textarea name="content" id="post-content">
            <?php echo $post_data['content']; ?>
        </textarea>
        <script>
            $(document).ready(function() {
                CKEDITOR.replace("post-content");
            });
        </script>
    </div>
    <div class="form-group">
        <label for="tags">Tags (separate with comma)</label>
        <input name="tags" class="form-control form-control-sm" id="tags" type="text"
            value="<?php echo $tags_string; ?>">
    </div>
    <div class="form-group button-group">
        <button type="submit" name="post-submit" value="1" class="btn btn-primary">Post</button>
    </div>
</form>

