<div class="col-sm-12">
    <div class="panel panel-bd lobidrag">
        <div class="panel-body">  
        <div class="panel-heading">
            <div class="panel-title">
                <h4><i class="fa fa-user-plus" aria-hidden="true"></i>Add User </h4>
            </div>
            <hr>
        </div>
        <?php echo form_open('admin/user_add/'); ?>
        <?php
        $this->session->userdata('isLogin');
        ?>  
        <div class="panel-body "> 

            <div class="form-group row">
                <label for="student_id" class="col-sm-3 col-form-label">Student ID</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="student_id" id="student_id" placeholder="Student ID" autocomplete="off">
                    
                    <p class="help-block text-danger"><?php echo form_error('student_id'); ?></p>
                </div>
            </div>

            <div class="form-group row">
                <label for="initial" class="col-sm-3 col-form-label">Initial</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="initial" id="initial" placeholder="Initial">
                    <p class="help-block text-danger"><?php echo form_error('initial'); ?></p>
                </div>
            </div>

            <div class="form-group row">
                <label for="surname" class="col-sm-3 col-form-label">Surname</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="surname" id="surname" placeholder="Surname">
                    <p class="help-block text-danger"><?php echo form_error('surname'); ?></p>
                </div>
            </div>
            
            <div class="form-group row">
                <label for="Title" class="col-sm-3 col-form-label">Passward</label>
                <div class="col-sm-9">
                    <input type="password" name="password" class="form-control" id="password" placeholder="Passward" autocomplete="off">
                    <p class="help-block text-danger"><?php echo form_error('password'); ?></p>
                </div>
            </div>
            <div class="form-group row">
                <label for="Title" class="col-sm-3 col-form-label">Reset Password</label>
                <div class="col-sm-9">
                    <input type="password" name="re_password" class="form-control" id="re_password" placeholder="Reset Password">
                    <p class="help-block text-danger"><?php echo form_error('re_password'); ?></p>
                </div>
            </div> 

            <div class="form-group row">
                <label for="Title" class="col-sm-3 col-form-label">Gender</label>
                <div class="col-sm-9">
                    <select name="gender" class="form-control " id="gender">
                        <option value="">------Select Gender-----</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select> 
                </div>
                
            </div>            

            
            <div class="form-group row">
                <div class="col-md-offset-1 col-md-9" style="margin-left: 40%;">
                    <button class="btn btn-danger w-md m-b-5">Cancel</button>
                    <button  type="submit"  class="btn btn-primary w-md m-b-5"><i class="fa fa-plus"></i> Save</button>
                </div>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>

