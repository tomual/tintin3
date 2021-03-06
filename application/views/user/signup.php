<?php $this->load->view('header') ?>
<h1>Sign Up</h1>
<?php alerts() ?>
<form method="post">
    <div class="mb-1">
        <label for="username">Username</label>
        <input type="text" name="username" id="username" value="<?php echo set_value('username') ?>" class="form-control <?php echo is_valid('username') ?>">
        <?php echo form_error('username') ?>
    </div>
    <div class="mb-1">
        <label for="email">Email</label>
        <input type="text" name="email" id="email" value="<?php echo set_value('email') ?>" class="form-control <?php echo is_valid('email') ?>">
        <?php echo form_error('email') ?>
    </div>
    <div class="mb-1">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" value="<?php echo set_value('password') ?>" class="form-control <?php echo is_valid('password') ?>">
        <?php echo form_error('password') ?>
    </div>
    <div class="mb-1">
        <label for="password2">Password (again)</label>
        <input type="password" name="password2" id="password2" value="<?php echo set_value('password2') ?>" class="form-control <?php echo is_valid('password2') ?>">
        <?php echo form_error('password2') ?>
    </div>
    <div class="mb-1">
        <input type="submit" value="Sign Up" class="btn btn-primary">
    </div>
    <div class="mb-1">
        Already have an account? <a href="<?php echo base_url('user/login') ?>">Log in</a>.
    </div>
</form>
<?php $this->load->view('footer') ?>
