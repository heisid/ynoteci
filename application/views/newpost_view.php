<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<script src="<?php echo assets_url(); ?>js/ckeditor/ckeditor.js"></script>

<h3>New Post</h3>
<form action="save_post" method="post">
    <input type="hidden" name="author" value="<?php echo $this->session->userdata('username'); ?>">
    <div class="form-group">
        <label for="post-title">Title</label>
        <input name="title_post" class="form-control form-control-lg" id="post-title" type="text">
    </div>
    <div class="form-group">
        <label for="post-content">Content</label>
        <textarea name="content" id="post-content"></textarea>
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

