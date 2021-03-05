<?php $this->load->view('header') ?>
<div class="container"> 
    <div class="row">
        <div class="col-lg-6">
            <h1><?php echo get_title() ?></h1>
            <?php alerts() ?>
            <form method="post">
                <div class="mb-1">
                    <label for="label">Label</label>
                    <input type="text" name="label" id="label" value="<?php echo set_value('label', $project->label) ?>" class="form-control <?php echo is_valid('label') ?>">
                    <?php echo form_error('label') ?>
                </div>
                <div class="mb-1">
                    <input type="submit" value="Edit" class="btn btn-primary">
                    <a href="<?php echo base_url("project/remove/{$project->id}") ?>" class="btn btn-outline-primary" onclick="return confirm('Are you sure you cant to delete this project?')">Delete</a>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $this->load->view('footer') ?>
