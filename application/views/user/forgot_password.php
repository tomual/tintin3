<?php $this->load->view('header') ?>
<div class="container"> 
    <div class="row">
        <div class="col-lg-3">
            <h1>Forgot Password</h1>
            <?php alerts() ?>
            <form method="post">
                <div class="mb-1">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" name="email" id="email" value="<?php echo set_value('email') ?>" class="form-control <?php echo is_valid('email') ?>">
                    <?php echo form_error('email') ?>
                </div>
                <div class="mb-1">
                    <input type="submit" value="Send" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>
<?php $this->load->view('footer') ?>
