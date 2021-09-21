

<div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <i class="material-icons">apps</i>
    </button>
    
    <a class="navbar-brand" href="<?php echo base_url() . "dashboard"; ?>"> 
        

        <img class="main-logo" src="<?php echo base_url().'assets/logo/sms.png'; ?>" id="bg" alt="logo">
    </a>
</div>
<div class="nav-container">
    
    
    <ul class="nav navbar-top-links navbar-right">   

        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="material-icons">person_add</i>
            </a>
            <ul class="dropdown-menu dropdown-user">   
                <li>
                    <?php
                    echo "&nbsp;&nbsp;&nbsp;";
                    echo "<i class='ti-user'></i>&nbsp;";
                    echo $this->session->userdata('student_id');
                    
                    ?>
                </li>
            
                  

                <li><a href="<?php echo base_url(); ?>admin/logout"> <i class="glyphicon glyphicon-off"></i>&nbsp; Log Out</a></li>
            </ul>
        </li>
       
    </ul>
</div>
