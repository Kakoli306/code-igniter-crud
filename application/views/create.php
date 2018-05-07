<?php include_once('header.php')?>
<div class="container">

        <?php echo form_open('welcome/save',['class'=> 'form-horizontal']);?>
        <fieldset>
            <legend>Add Post</legend>

            <div class="form-group">
                <label for="input" class="col-md-2 control-label">Title</label>
                <div class="col-md-10">

                    <?php echo form_input(['name'=>'title', 'placeholder'=>'Title','class'=>'form-control']);?>
                </div>
                <div class="col-md-5">
                  <?php echo form_error('title', '<div class = "text-danger">','</div>')?>
                </div>
                </div>
            </div>

            <div class="form-group">
                <label for="textarea" class="col-md-2 control-label">Desription</label>
                    <div class="col-md-10">

                        <?php echo form_textarea(['name'=>'description', 'placeholder'=>'Description','class'=>'form-control']);?>
                    </div>
                <div class="col-md-5">
                    <?php echo form_error('description', '<div class = "text-danger">','</div>')?>
                </div>
            </div>
          <?php echo form_submit(['name'=>'submit', 'value'=>'Submit','class'=>'btn btn-default']);?>
           <?php echo anchor('welcome/crud','Back', array('class'=>'btn btn-default'));?>
        </fieldset>
   <?php echo form_close()?>
</div>
<?php include_once('footer.php')?>
