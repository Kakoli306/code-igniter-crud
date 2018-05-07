<?php include_once('header.php')?>
<div class="container">

    <?php echo form_open("welcome/change/{$post->id}",['class'=> 'form-horizontal']);?>
    <fieldset>
        <legend>Legend</legend>

        <div class="form-group">
            <label for="input" class="col-md-2 control-label">Title</label>
            <div class="col-md-10">

                <?php echo form_input (['name'=>'title', 'placeholder'=>'Title','class'=>'form-control',
                    'value'=>set_value('title',$post->title)]);?>
            </div>
            <div class="col-md-5">
                <?php echo form_error('title', '<div class = "text-danger">','</div>')?>
            </div>
        </div>
</div>

<div class="form-group">
    <label for="textarea" class="col-md-2 control-label">Desription</label>
    <div class="col-md-10">

        <?php echo form_textarea(['name'=>'description', 'placeholder'=>'Description','class'=>'form-control',
            'value'=>set_value('description',$post->description)]);?>
    </div>
    <div class="col-md-5">
        <?php echo form_error('description', '<div class = "text-danger">','</div>')?>
    </div>
</div>
<?php echo form_submit(['name'=>'submit', 'value'=>'Update','class'=>'btn btn-default']);?>
<?php echo anchor('crud','Back',['class'=>'btn btn-default']);?>
</fieldset>
<?php echo form_close()?>
</div>
<?php include_once('footer.php')?>
