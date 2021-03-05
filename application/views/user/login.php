<?php $this->load->view('header') ?>
<div class="container"> 
    <div class="row">
        <div class="col-lg-3">
            <h1>Log In</h1>
            <?php alerts() ?>
            <form method="post">
                <div class="mb-1">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" name="email" id="email" value="<?php echo set_value('email') ?>" class="form-control <?php echo is_valid('email') ?>">
                    <?php echo form_error('email') ?>
                </div>
                <div class="mb-1">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" value="<?php echo set_value('password') ?>" class="form-control <?php echo is_valid('email') ?>">
                    <?php echo form_error('password') ?>
                </div>
                <div class="mb-1">
                    <a href="<?php echo base_url('user/forgot_password') ?>" class="small text-right d-block">Forgot Password</a>
                </div>
                <div class="mb-1">
                    <input type="submit" value="Log In" class="btn btn-primary">
                </div>
                <div class="mb-1">
                    Don't have an account? <a href="<?php echo base_url('user/signup') ?>">Register here!</a>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $this->load->view('footer') ?>
