<?php $this->load->view('header') ?>
<div class="container"> 
    <div class="row">
        <div class="col-lg-6">
            <h1><?php echo $ticket->title ?></h1>
            <?php alerts() ?>
            <form method="post">
                <div class="mb-1">
                    <label for="title" class="fw-bold">Title</label>
                    <div><?php echo $ticket->title ?></div>
                </div>
                <div class="mb-1">
                    <label for="status" class="fw-bold">Status</label>
                    <div><?php echo status_label($ticket->status) ?></div>
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
        </div>
        <div class="mb-1">
            <a href="<?php echo base_url("ticket/edit/{$ticket->id}") ?>" class="btn btn-outline-primary">Edit</a>
        </div>
    </div>
</div>
<?php $this->load->view('footer') ?>
