<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <h2>Sign Up</h2>
        <hr>
        <?php
            if ($this->session->flashdata()) {
                foreach ($this->session->flashdata('error_msg') as $error_msg) {
                    echo "<p><span style='color:red'>" . $error_msg . "</span></p>";
                }
            }
        ?>
        <form action="<?php echo site_url('signup/add_user'); ?>" method="post">
            <div class="form-group">
                <label for="fullname">Full Name</label>
                <input name="fullname" type="text" class="form-control" id="fullname" placeholder="Enter Fullname"
                    <?php echo "value={$this->session->flashdata('fullname')}"; ?> >
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input name="username" type="text" class="form-control" id="username" placeholder="Enter username"
                    <?php echo "value={$this->session->flashdata('username')}"; ?> >
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input name="password" type="password" class="form-control" id="password" placeholder="Enter Password"
                    <?php echo "value={$this->session->flashdata('password')}"; ?> >
            </div>
            <div class="form-group">
                <label for="confirm-password">Confirm password</label>
                <input name="confirm_password" type="password" class="form-control" id="confirm-password" placeholder="Confirm password"
                <?php echo "value={$this->session->flashdata('confirm_password')}"; ?> >
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <hr>
        <p>Or <a href="<?php echo site_url('login'); ?>">Login</a></p>
    </div>
    <div class="col-md-3"></div>
</div>