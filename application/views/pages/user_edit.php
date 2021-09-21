<div class="col-sm-12">
    <div class="panel panel-bd lobidrag">
        <div class="panel-body">  
        <div class="panel-heading">
            <div class="panel-title">
                <h4>Edit User </h4>
            </div>
            <hr>
        </div>
        <?php echo form_open('admin/user_update/'); ?>
        <?php
        $this->session->userdata('isLogin');
        ?>  
        <div class="panel-body "> 

            <div class="form-group row">
                <label for="student_id" class="col-sm-3 col-form-label">Student ID</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="student_id" id="student_id" placeholder="Student ID" autocomplete="off" value="<?php echo set_value('student_id', $informations->student_id); ?>" readonly>

                    
                    <p class="help-block text-danger"><?php echo form_error('student_id'); ?></p>
                </div>
            </div>

            <div class="form-group row">
                <label for="initial" class="col-sm-3 col-form-label">Initial</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="initial" id="initial" placeholder="Initial" value="<?php echo set_value('initial', $informations->initial); ?>">
                    <p class="help-block text-danger"><?php echo form_error('initial'); ?></p>
                </div>
            </div>

            <div class="form-group row">
                <label for="surname" class="col-sm-3 col-form-label">Surname</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="surname" id="surname" placeholder="Surname" value="<?php echo set_value('surname', $informations->surname); ?>">
                    <p class="help-block text-danger"><?php echo form_error('surname'); ?></p>
                </div>
            </div>
            
            <div class="form-group row">
                <label for="Title" class="col-sm-3 col-form-label">Passward</label>
                <div class="col-sm-9">
                    <input type="password" name="password" class="form-control" id="password" placeholder="Passward" autocomplete="off" required>
                    <input type="hidden" name="old_password" id="old_password" value="<?php echo set_value('id', $informations->password); ?>"  />
                    <p class="help-block text-danger"><?php echo form_error('password'); ?></p>
                </div>
            </div>
            <div class="form-group row">
                <label for="Title" class="col-sm-3 col-form-label">Reset Password</label>
                <div class="col-sm-9">
                    <input type="password" name="re_password" class="form-control" id="re_password" placeholder="Reset Password" required>

                    <input type="hidden" name="old_re_password" id="old_re_password" value="<?php echo set_value('id', $informations->password); ?>"  />
                    <p class="help-block text-danger"><?php echo form_error('re_password'); ?></p>
                </div>
            </div> 

            <div class="form-group row">
                <label for="Title" class="col-sm-3 col-form-label">Gender</label>
                <div class="col-sm-9">
                    <select name="gender" class="form-control " id="gender">
                        <option value="male" <?php if($informations->gender=="male" ){?> selected="selected"<?php } ?>>Male</option>
                        <option value="female" <?php if($informations->gender=="female" ){?> selected="selected"<?php } ?>>Female</option>


                         <input type="hidden" name="id" id="id" value="<?php echo set_value('id', $informations->id); ?>"  />
                        
                    </select> 
                </div>
                
            </div> 
  
            <div class="form-group row">
                <div class="col-md-offset-1 col-md-9" style="margin-left: 40%;">
                    <button class="btn btn-danger w-md m-b-5">Cancel</button>
                    <button  type="submit"  class="btn btn-primary w-md m-b-5"><i class="fa fa-plus"></i> Update</button>
                </div>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>

