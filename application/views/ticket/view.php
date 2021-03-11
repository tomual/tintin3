<?php $this->load->view('header') ?>
<h1 class="d-inline-block"><?php echo $ticket->title ?></h1>
<a href="<?php echo base_url("ticket/edit/{$ticket->id}") ?>" class="float-end btn btn-outline-primary">Edit</a>
<?php alerts() ?>
<form method="post">
    <div class="mb-1">
        <label for="status" class="fw-bold">Status</label>
        <div><?php echo status_label($ticket->status) ?></div>
    </div>
    <div class="mb-1">
        <label for="created" class="fw-bold">Created</label>
        <div><?php echo $ticket->created ?? "-" ?></div>
    </div>
    <div class="mb-1">
        <label for="modified" class="fw-bold">Last Modified</label>
        <div><?php echo $ticket->modified ?? "-" ?></div>
    </div>
    <div class="mb-1">
        <label for="project_label" class="fw-bold">Project</label>
        <div><?php echo $ticket->project_label ?? "-" ?></div>
    </div>
    <div class="mb-1">
        <label for="description" class="fw-bold">Description</label>
        <div><?php echo $ticket->description ?></div>
    </div>
</form>
<?php $this->load->view('footer') ?>
