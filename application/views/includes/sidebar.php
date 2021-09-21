<ul class="nav" id="side-menu">
    <li class="active"><a href="<?php echo base_url() . "dashboard"; ?>" class="material-ripple"><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard</a></li>


   <?php  $user=$this->session->userdata('student_id'); 
    if($user=='admin'){
        ?>
            <li>
        <a href="#" class="material-ripple"><i class="fa fa-users" aria-hidden="true"></i>Student<span class="fa arrow"></span></a>
        
        <ul class="nav nav-second-level">
            
            <li><a href="<?php echo base_url(); ?>admin/user_add">Add Student</a></li>
            
            <li><a href="<?php echo base_url(); ?>admin/user_view">Student View</a></li>
            
        </ul>
    </li>


    <li>
        <a href="#" class="material-ripple"><i class="fa fa-book" aria-hidden="true"></i>Marks<span class="fa arrow"></span></a>
        
        <ul class="nav nav-second-level">
            
            <li><a href="<?php echo base_url(); ?>mark/add_marks">Add Marks</a></li>
            
            
            
        </ul>
    </li>


        <?php
    }
   ?>

    

    


    

</ul>