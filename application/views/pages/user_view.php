<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-bd ">
            <div class="panel-heading">
                <div class="panel-title">
                    <i class="fa fa-list"></i>
                    <?php echo display('viewuser'); ?> 
                </div>
            </div>
            <?php
            if ($this->session->flashdata('success')) {
                  echo "<div class=\"alert alert-success\" role=\"alert\">" . $this->session->flashdata('success') . "</div>";
             }
                         ?>
            <div class="panel-body">
                <div class="table-responsive ">
                    <table id="dataTableExample1" class="table table-bordered table-striped table-hover">
                        <thead>
                    <tr>
                        <th>No</th>
                        <th>Student ID</th>                        
                        <th> Full Name</th>
                        <th>Gender</th>
                        <th>Log Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!empty($user_view)) {
                        $count = 1;
                        foreach ($user_view as $info) {
                            ?>
                            <tr>
                                <td><?php echo $count; ?></td>
                                <td><?php echo $info->student_id; ?></td>
                                <td><?php echo $info->initial . ' '.$info->surname ; ?></td>
                                <td><?php  if($info->gender=='male'){
                                                echo "Male";
                                            }else{
                                             echo "Female";
                                            }
                                 ?></td>
                                <td><?php echo $info->last_log_date; ?></td>
                                 
                                 <td>
                                     <a class="green" data-toggle="tooltip" title="Edit" href="<?php echo base_url() . "admin/user_edit/" . $info->id; ?>">
                                            <i class="ace-icon fa fa-pencil bigger-130"></i>
                                        </a>&nbsp;&nbsp;

                                     &nbsp;&nbsp;
                                            <a title="Delete" href="<?php echo base_url() . "admin/user_delete/" . $info->id; ?>">
                                                <i class="red fa fa-trash-o bigger-130"></i>
                                            </a>
                                 </td>                                  
                                   
                            
                            </tr>
                            <?php
                            $count++;
                        }
                    }
                    ?>
                </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>