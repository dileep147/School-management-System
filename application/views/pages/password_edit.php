<div class="col-sm-12">
    <div class="panel panel-bd lobidrag">
        <div class="panel-body">  
        <div class="panel-heading">
            <div class="panel-title">
                <h4>Reset Password </h4>
            </div>
            <hr>
        </div>
        <?php echo form_open('dashboard/update_password/'); ?>
        <?php
        $this->session->userdata('isLogin');
        ?>  
        <div class="panel-body "> 

            <div class="form-group row">
                <label for="Title" class="col-sm-3 col-form-label">Passward</label>
                <div class="col-sm-9">
                    <input type="password" name="password" class="form-control" id="password" placeholder="Passward" autocomplete="off" required>
                    
                    <p class="help-block text-danger"><?php echo form_error('password'); ?></p>
                </div>
            </div>
            <div class="form-group row">
                <label for="Title" class="col-sm-3 col-form-label">Reset Password</label>
                <div class="col-sm-9">
                    <input type="password" name="re_password" class="form-control" id="re_password" placeholder="Reset Password" required>

                    <input type="hidden" name="id" id="id" value="<?php echo set_value('id', $informations->id); ?>"  />
                    <p class="help-block text-danger"><?php echo form_error('re_password'); ?></p>
                </div>
            </div> 

             
  
            <div class="form-group row">
                <div class="col-md-offset-1 col-md-9" style="margin-left: 40%;">
                    
                    <button  type="submit"  class="btn btn-primary w-md m-b-5"><i class="fa fa-plus"></i> Update</button>
                </div>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>

