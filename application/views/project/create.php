<?php $this->load->view('header') ?>
<div class="container"> 
    <div class="row">
        <div class="col-lg-6">
            <h1><?php echo get_title() ?></h1>
            <?php alerts() ?>
            <form method="post">
                <div class="mb-1">
                    <label for="label">Label</label>
                    <input type="text" name="label" id="label" value="<?php echo set_value('label') ?>" class="form-control <?php echo is_valid('label') ?>">
                    <?php echo form_error('label') ?>
                </div>
                <div class="mb-1">
                    <input type="submit" value="Create" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>
<?php $this->load->view('footer') ?>
