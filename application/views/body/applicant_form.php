<?php $ci =& get_instance(); $msg = $ci->session->flashdata('add_success'); if(isset($msg)):  ?>
    <div class="alert alert-success alert-styled-left alert-arrow-left alert-bordered">
        <button type="button" class="close" data-dismiss="alert"><span>x</span><span class="sr-only">Close</span></button>
        <span class="text-semibold">Well done!</span> Quote data has been saved successfully. </span>.
    </div>
<?php endif; ?>
<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title">Register</h5>
    </div>
    <div class="panel-body">
        <div class="col-lg-10">
        <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
            <fieldset class="content-group">
                <div class="form-group no-margin-bottom">
                    <label class="control-label col-lg-2">First Name:*</label>
                    <div class="col-lg-8">
                        <input type="text" value="<?php echo set_value('first_name') ?>" class="form-control" name="first_name" placeholder="enter first name" />
                        <span class="text-danger help-block"><?php echo form_error('first_name'); ?></span>
                    </div>
                </div>

                <div class="form-group no-margin-bottom">
                    <label class="control-label col-lg-2">Surname:*</label>
                    <div class="col-lg-8">
                        <input type="text" value="<?php echo set_value('surname') ?>" class="form-control" name="surname" placeholder="enter surname">
                        <span class="text-danger help-block"><?php echo form_error('surname'); ?></span>
                    </div>
                </div>

                <div class="form-group no-margin-bottom">
                    <label class="control-label col-lg-2">Phone Number:*</label>
                    <div class="col-lg-8">
                        <input type="text"  class="form-control" value="<?php echo set_value('phone_number') ?>" name="phone_number" placeholder="enter primary phone">
                        <span class="text-danger help-block"><?php echo form_error('phone_number'); ?></span>
                    </div>
                </div>

                <div class="form-group no-margin-bottom">
                    <label class="control-label col-lg-2">Email Address:*</label>
                    <div class="col-lg-8">
                        <input type="email"  class="form-control" value="<?php echo set_value('email') ?>" name="email" placeholder="enter email address">
                        <span class="text-danger help-block"><?php echo form_error('email'); ?></span>
                    </div>
                </div>
                <div class="form-group no-margin-bottom">
                    <label class="control-label col-lg-2">passport:*</label>
                    <div class="col-lg-8">
                        <input type="file" name="passport" placeholder="enter address">
                        <span class="text-danger help-block"><?php echo @$passport_error; ?></span>
                    </div>
                </div>
            <fieldset class="content-group">
                <div class="form-group">
                    <label class="control-label col-lg-2"></label>
                    <div class="col-lg-8">
                        <button type="submit" class="btn btn-primary" name="application_form" value="1">Submit Application <i class="icon-arrow-right14 position-right"></i></button>
                    </div>
                </div>
            </fieldset>
        </form>
        </div>
    </div>
</div>