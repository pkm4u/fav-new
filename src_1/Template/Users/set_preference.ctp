<div id="page-wrapper" style="min-height: 282px;">
    <div class="container-fluid">
        <div class="row">
                <div class="col-lg-12 ">
                <h1 class="page-header">Set Your Property Preferences</h1>
					<?php echo $this->Form->create('UserPreference', ['context' => ['validator' => 'default']]);?>
                 <div class="form-group">
                    <?php echo $this->Form->input('template_name',['div'=>false,'label'=>false,'class'=>'form-control','placeholder'=>'Template Name']);?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('from_name',['div'=>false,'label'=>false,'class'=>'form-control','placeholder'=>'From Name']);?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('phone',['div'=>false,'label'=>false,'class'=>'form-control','placeholder'=>'Phone']);?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('from_email',['div'=>false,'label'=>false,'class'=>'form-control','placeholder'=>'From Email']);?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('email_subject',['div'=>false,'label'=>false,'class'=>'form-control','placeholder'=>'Email Subject']);?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('category',['div'=>false,'label'=>false,'class'=>'form-control','placeholder'=>'Email Category']);?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('email_body',['div'=>false,'type'=>'textarea','label'=>false,'class'=>'form-control','placeholder'=>'Email Body']);?>
                </div>
                   <div class="form-group pull-right">
                    <button type="submit" class="btn btn-success">Add Template</button>    
                    </div>    
                <?php echo $this->Form->end(); ?>
                  
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
  
</div>