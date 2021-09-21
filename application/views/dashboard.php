<script src="<?= base_url() ?>assets/assets/js/chosen.jquery.js"></script>
<script src="<?= base_url() ?>assets/assets/public/chosen.jquery.js"></script>
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/assets/css/chosen.css">

<script src="<?= base_url() ?>media/js/jquery.confirm.js"></script>




<script type="text/javascript">
    $(document).ready(function() {
      
        $("#student_id").chosen({
          allow_single_deselect : true,
          search_contains: true,
          no_results_text: "Oops, nothing found!",
          placeholder_text_single: "Select an Option"
          
      });   
        
        
        $.ajaxSetup ({
    // Disable caching of AJAX responses
    cache: false
},500);


    });
</script>



<div class="table">

    <h3 class="title1">Student Mark View    
</h3>
</div>

<div class="col-sm-12">

    <div class="panel-heading">
        <div class="panel-title">
            <i class="fa fa-list"></i>
        </div>
    </div>
    <form data-toggle="validator" method="post" action="<?= base_url() ?>dashboard/load_marks" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-12 validation-grids widget-shadow" data-example-id="basic-forms" style="width: 100%; margin-top:-40px; background-color: #eaeaea;">
                <div class="form-body">
                    <div class="form-inline">

                      <div class="form-group" >
                            <select name="student_id" id="student_id" class="form-control"  required >
                                <option value="">Select Student ID</option>
                                 
                                <? if($student_list){
                                    foreach($student_list as $dataraw)
                                    {
                                        ?>
                                        <option value="<?=$dataraw->id?>" ><?=$dataraw->student_id?></option>
                                    <? }}?>
                                </select>
                        </div>
 
                         <div class="form-group">
                            <button type="submit" id="search" class="btn btn-primary " style="margin-bottom: 20px;margin-top: 20px;">Search</button>
                        </div>

                    </div>


                    <div class="form-inline" style="text-align: center;">

                        <div class="row">
            

             <div class="table-responsive bs-example widget-shadow" id="full_data"  style="max-height:400px; overflow:scroll" >

              <table class="table table-bordered" id="table">


               <tr> 
                <th style="text-align: center;">Student ID</th>
                <th style="text-align: center;">Full Name</th>
                <th style="text-align: center;">Grade</th>
                <th style="text-align: center;">Maths</th>
                <th style="text-align: center;">Science</th>
                <th style="text-align: center;">English</th>
          
              </tr>


              <?  if($data_list ){

                
                ?>

                <?
                foreach($data_list as $raw){
                
                  ?>
                  
                  <tr>

                    <td style="text-align: center;"><?php $details = $this->Mark_model->get_student($raw->student_id);
                                echo $details->student_id?></td>
                    <td style="text-align: center;"><?php $details = $this->Mark_model->get_student($raw->student_id);
                                echo $details->initial.' '.$details->surname ?></td>
                    <td style="text-align: center;"><?php echo $raw->grade ?></td>
                    <td style="text-align: center;"><?php echo $raw->maths ?></td>
                    <td style="text-align: center;"><?php echo $raw->science ?></td>
                    <td style="text-align: center;"><?php echo $raw->english ?></td>
                                        
                  </tr>



                  <?

                }



                
              }
              else{
                
              }

              


                
              
                ?>  



              </table>




            </div>
          

        </div>

                        

                       
                    </div>
                </div>

            </div>
        </div>
    </form>



</div>




