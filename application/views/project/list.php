<?php $this->load->view('header') ?>
<div class="container"> 
    <div class="row">
        <div class="col">
            <h1>Projects</h1>
            <?php alerts() ?>
            <a href="<?php echo base_url('project/create') ?>" class="btn btn-primary">New Project</a>
            <table class="table">
                <tr>
                    <th>ID</th>
                    <th>Label</th>
                    <th>Created</th>
                </tr>
                <?php foreach ($projects as $project) : ?>
                    <tr>
                        <td><?php echo $project->id ?></td>
                        <td><a href="<?php echo base_url("project/edit/{$project->id}") ?>"><?php echo $project->label ?></a></td>
                        <td><?php echo $project->created ?></td>
                    </tr>
                <?php endforeach ?>
                <?php if (empty($projects)) : ?>
                <?php endif ?>
            </table>
        </div>
    </div>
</div>
<?php $this->load->view('footer') ?>
