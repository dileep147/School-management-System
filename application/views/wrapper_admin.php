
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>School Management System</title>
        <link rel="shortcut icon" href="assets/logo/sms.png" type="image/x-icon">
        <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js"></script>
        <script>
            WebFont.load({
                google: {
                    families: ['Alegreya+Sans:100,100i,300,300i,400,400i,500,500i,700,700i,800,800i,900,900i', 'Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i', 'Open Sans']
                }
            });
        </script>
        <link href="<?php echo base_url(); ?>assets/assets/dist/css/base.css" rel="stylesheet" type="text/css"/>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        
        <link href="<?php echo base_url(); ?>assets/assets/plugins/jquery.sumoselect/sumoselect.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>assets/assets/plugins/select2/select2.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>assets/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>  
        <link href="<?php echo base_url(); ?>assets/assets/pe-icon-7-stroke/css/pe-icon-7-stroke.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>assets/assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>assets/assets/dist/css/component_ui.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>assets/assets/dist/css/custom.css" rel="stylesheet" type="text/css"/>

        <style type="text/css">
             .form-control {
                        border-radius: 25px;
                        border: 2px solid #73AD21;
                        padding: 20px;
                        width: 300px;
                        height: 50px;
                }



        </style>

    </head>
    <body>
        <div class="login-wrapper">
            <div class="container-center">
                <div class="panel panel-bd">
                    <div class="panel-heading">
                        <div class="row-fluid">
                            <div class="center">
                                <h2 style="margin-left: 14%;" class="green">LOGIN</h2><br>
                                <h4 style="margin-left: 39%;" class="blue"></h4> 
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                            <?php
                            $exception = $this->session->userdata('exception');
                              if ($exception) {
                                echo '<div class="alert alert-danger">' . $exception . '</div><br/>';
                                $this->session->unset_userdata('exception');
                            }
                            ?>
                        <?php
                            
                          
                        ?>
                       <form action="<?php echo base_url(); ?>admin/ck_login" method="post">
                            <div class="form-group">
                                <label class="control-label">Student ID</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input id="student_id" type="text" class="form-control" name="student_id" placeholder="Student ID">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Password</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                    <input id="pass" type="password" class="form-control" name="password" placeholder="******">
                                </div>
                            </div>
                            
                          
                            <div>
                                <button class="btn btn-info pull-right">Login</button>  
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script src="<?php echo base_url(); ?>assets/assets/plugins/jQuery/jquery-1.12.4.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/assets/plugins/jquery.sumoselect/jquery.sumoselect.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/assets/plugins/select2/select2.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script>
        $(document).ready(function () {
            //jquery.sumoselect
            $('.testselect1').SumoSelect();

            $('.testselect2').SumoSelect();

            $('.optgroup_test').SumoSelect();

            $('.search_test').SumoSelect({
                search: true,
                searchText: 'Enter here.'
            });

            $('.select1').SumoSelect({okCancelInMulti: true, selectAll: true});
            $('.select2').SumoSelect({selectAll: true});

            //select2
            $(".basic-single").select2();
            $(".basic-multiple").select2();
            $(".placeholder-single").select2({
                placeholder: "Select a state",
                allowClear: true
            });

            $(".placeholder-multiple").select2({
                placeholder: "Select a state"
            });

            $(".theme-single").select2();

            $(".language").select2({
                language: "es"
            });

            $(".js-programmatic-enable").on("click", function () {
                $(".js-example-disabled").prop("disabled", false);
                $(".js-example-disabled-multi").prop("disabled", false);
            });

            $(".js-programmatic-disable").on("click", function () {
                $(".js-example-disabled").prop("disabled", true);
                $(".js-example-disabled-multi").prop("disabled", true);
            });
        });
        </script>
    </body>
</html>