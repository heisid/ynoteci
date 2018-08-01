<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<h3>Welcome, <strong><?php echo $user_data['fullname']; ?></strong></h3>
<hr>
<h4>Edit Profile</h4>
<form action="<?php echo site_url('profile/edit'); ?>" method="post">
    <div class="form-group">
        <label for="fullname">Full Name</label>
        <input name="fullname" type="text" class="form-control" id="fullname" placeholder="Enter Fullname"
            value="<?php echo $user_data['fullname']; ?>" >
    </div>
    <div class="form-group">
        <label for="password">New Password</label>
        <input name="password" type="password" class="form-control" id="password" placeholder="Enter New Password">
    </div>
    <div class="form-group">
        <label for="confirm-password">Confirm password</label>
        <input name="confirm_password" type="password" class="form-control" id="confirm-password" placeholder="Confirm new password"
        <?php echo "value={$this->session->flashdata('confirm_password')}"; ?> >
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

<hr>

<h4>Your Posts</h4>
<?php
    $read_post_url = site_url('read_post');
    foreach ($user_data['posts_list'] as $post) {
        echo "<li><a href='{$read_post_url}/{$post['id_post']}'>{$post['title_post']}</a></li>";
    }
?>