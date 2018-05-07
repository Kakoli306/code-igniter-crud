<?php include_once ('header.php');?>
<div class="container">
    <h3></h3>
    <h4><?php echo $post->title;?></h4>
    <h4><?php echo $post->description;?></h4>
    <h4><?php echo $post->data_created;?></h4>

    <?php echo anchor('welcome/crud','Back',['class'=>'btn btn-default']);?>
    <?php include_once ('footer.php');?>
</div>
