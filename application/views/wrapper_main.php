<!DOCTYPE html>
<html lang=en>

<head>
    <?php $this->load->view('includes/head'); ?>
</head>

<body>
    <div id=wrapper class="wrapper animsition">
        <nav class="navbar navbar-fixed-top">
            <?php $this->load->view('includes/menu'); ?>
        </nav>
        <div class="sidebar" style="background-color : #dadffd;" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <?php $this->load->view('includes/sidebar'); ?>
            </div>
        </div>
        
        <div class=control-sidebar-bg></div>
        <div id="page-wrapper">
            <div class="content" style="margin-left: -5%;">
                <div class="page-header position-relative">


                </div>
                 <?php
                if (isset($content)) {
                    echo $content;
                }
                else{
                    
                }
                ?>
               
            </div>
        </div>
    </div>

    <?php $this->load->view('includes/js'); ?>
</body>

</html>