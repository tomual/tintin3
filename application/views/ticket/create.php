<?php $this->load->view('header') ?>
<div class="container"> 
    <div class="row">
        <div class="col-lg-6">
            <h1><?php echo get_title() ?></h1>
            <?php alerts() ?>
            <form method="post">
                <div class="mb-1">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" value="<?php echo set_value('title') ?>" class="form-control <?php echo is_valid('title') ?>">
                    <?php echo form_error('title') ?>
                </div>
                <div class="mb-1">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" class="form-control <?php echo is_valid('description') ?>"><?php echo set_value('description') ?></textarea>
                    <?php echo form_error('description') ?>
                </div>
                <div class="mb-1">
                    <label for="status">Status</label>
                    <select class="form-select" name="status" id="status">
                        <option value="open" <?php echo set_select('status', 'open') ?>>Open</option>
                        <option value="working" <?php echo set_select('status', 'working') ?>>Working</option>
                        <option value="closed" <?php echo set_select('status', 'closed') ?>>Closed</option>
                        <option value="canceled" <?php echo set_select('status', 'canceled') ?>>Canceled</option>
                    </select>
                    <?php echo form_error('status') ?>
                </div>
                <div class="mb-1">
                    <input type="submit" value="Create" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>
<?php $this->load->view('footer') ?>