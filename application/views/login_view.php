<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <h2>Login</h2>
        <hr>
        <?php
            echo "<p><span style='color:red'>". $this->session->flashdata('login_failed') . "</span></p>";
        ?>
        <form action="<?php echo site_url('login/verify'); ?>" method="post">
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
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
        <hr>
        <p>Or <a href="<?php echo site_url('signup'); ?>">Sign Up</a></p>
    </div>
    <div class="col-md-3"></div>
</div>