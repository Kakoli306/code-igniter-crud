<?php include_once('header.php') ?>
    <div class="container">
        <h3>View All Posts</h3>



        <?php echo anchor('welcome/create', 'Add Details', ['class' => 'btn btn-primary']); ?>
        <?php echo anchor('welcome/trash_show', 'Recycle Bin', ['class' => 'btn btn-danger']); ?>
        <?php echo "<br><br><br>" ?>

        <?php if ($msg = $this->session->flashdata('msg')): ?>
            <?php echo $msg ?>
        <?php endif; ?>

        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">SL</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Creation Date</th>
                <th scope="col">Image</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>

            <?php if (count($posts)): ?>

                <?php

                $count = 1;

                foreach ($posts as $post): ?>
                    <tr class="table-active">

                        <td><?php echo $count++ ?></td>
                        <td><?php echo $post->title; ?></td>
                        <td><?php echo $post->description; ?></td>
                        <td><?php echo $post->data_created; ?></td>

                        <td>

                            <?php echo anchor("welcome/view/{$post->id}", 'View', ['class' => ' badge badge-primary']); ?>
                            <?php echo anchor("welcome/update/{$post->id}", 'Update', ['class' => 'badge badge-info']); ?>
                            <?php echo anchor("welcome/trash/{$post->id}", 'trash', ['class' => 'badge badge-danger']); ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td>No record Found!</td>
                </tr>
            <?php endif; ?>

            </tbody>
        </table>
    </div>

<?php include_once('footer.php'); ?>