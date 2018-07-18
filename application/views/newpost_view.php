<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<script src="<?php echo assets_url(); ?>js/ckeditor/ckeditor.js"></script>

<h3>New Post</h3>
<form action="posting/newpost" method="post">
    <div class="form-group">
        <label for="post-title">Title</label>
        <input name="post-title" class="form-control form-control-lg" id="post-title" type="text">
    </div>
    <div class="form-group">
        <label for="post-content">Content</label>
        <textarea name="post-content" id="post-content"></textarea>
        <script>
            $(document).ready(function() {
                CKEDITOR.replace("post-content");
            });
        </script>
    </div>
    <div class="form-group">
        <label for="tags">Tags (separate with comma)</label>
        <input name="tags" class="form-control form-control-sm" id="tags" type="text">
    </div>
    <div class="form-group button-group">
        <button type="submit" name="post-submit" value="1" class="btn btn-primary">Post</button>
    </div>
</form>

