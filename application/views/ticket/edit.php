<?php $this->load->view('header') ?>
<h1><?php echo get_title() ?></h1>
<?php alerts() ?>
<form method="post">
    <div class="mb-1">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" value="<?php echo set_value('title', $ticket->title) ?>" class="form-control <?php echo is_valid('title') ?>">
        <?php echo form_error('title') ?>
    </div>
    <div class="mb-1">
        <label for="description">Description</label>
        <textarea name="description" id="description" class="form-control <?php echo is_valid('description') ?>"><?php echo set_value('description', $ticket->description) ?></textarea>
        <?php echo form_error('description') ?>
    </div>
    <div class="mb-1">
        <label for="status">Status</label>
        <select class="form-select <?php echo is_valid('status') ?>" name="status" id="status">
            <option value="open" <?php echo set_select('status', 'open', $ticket->status == 'open') ?>>Open</option>
            <option value="working" <?php echo set_select('status', 'working', $ticket->status == 'working') ?>>Working</option>
            <option value="closed" <?php echo set_select('status', 'closed', $ticket->status == 'closed') ?>>Closed</option>
            <option value="canceled" <?php echo set_select('status', 'canceled', $ticket->status == 'canceled') ?>>Canceled</option>
        </select>
        <?php echo form_error('status') ?>
    </div>
    <div class="mb-1">
        <label for="project_id">Project</label>
        <select class="form-select <?php echo is_valid('project_id') ?>" name="project_id" id="project_id">
            <option value="">None</option>
            <?php foreach ($projects as $project) : ?>
                <option value="<?php echo $project->id ?>" <?php echo set_select('project_id', $project->id, $ticket->project_id == $project->id) ?>><?php echo $project->label ?></option>
            <?php endforeach ?>
        </select>
        <?php echo form_error('project_id') ?>
    </div>
    <div class="mb-1">
        <input type="submit" value="Edit" class="btn btn-primary">
        <a href="<?php echo base_url("ticket/remove/{$ticket->id}") ?>" class="btn btn-outline-primary" onclick="return confirm('Are you sure you cant to delete this ticket?')">Delete</a>
    </div>
</form>
<?php $this->load->view('footer') ?>
