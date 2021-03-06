<?php $this->load->view('header') ?>
<h1>All Tickets</h1>
<?php alerts() ?>
<table class="table">
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Status</th>
        <th>Project</th>
        <th>Created</th>
    </tr>
    <?php foreach ($tickets as $ticket) : ?>
        <tr>
            <td><?php echo $ticket->id ?></td>
            <td><a href="<?php echo base_url("ticket/view/{$ticket->id}") ?>"><?php echo $ticket->title ?></a></td>
            <td><?php echo status_label($ticket->status) ?></td>
            <td><?php echo $ticket->project_label ?></td>
            <td><?php echo $ticket->created ?></td>
        </tr>
    <?php endforeach ?>
    <?php if (empty($tickets)) : ?>
    <?php endif ?>
</table>
<?php $this->load->view('footer') ?>
