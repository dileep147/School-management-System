<script src="<?=base_url()?>assets/assets/js/chosen.jquery.js"></script>
<script src="<?=base_url()?>assets/assets/public/chosen.jquery.js"></script>
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/assets/css/chosen.css">

   

<script>

    function load_student_details(student_id){

        // alert(student_id);
        document.getElementById("inputform").reset();
        $("#student_id").val(student_id);
        var siteUrl = '<?php echo base_url(); ?>';

        if(student_id != ''){          

            $.ajax({
                cache: false,
                url: siteUrl + 'Mark/get_student_details',
                type: "POST",
                async: false,
                dataType: 'json',
                data: {student_id:student_id},


                success: function(data) {  

                // alert(data);                  

                 if (data!= null) {
                             
                        $("#surname").val(data.initial+' '+data.surname);
                    
                            
                        }   
                },
                error: function(e) {
                    console.log(e.responseText);
                }
            });

        }else{
            

        }
    }


    


</script>



<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="panel panel-bd ">
        <div class="panel-heading">
            <div class="panel-title">
                <h4><i class="fa fa-file"></i>Add Marks

                </h4>
            </div>
        </div>
        <form name="inputform"  class="form-horizontal" action="<?php echo base_url() . 'mark/mark_save'; ?>" id="inputform" method="post" enctype="multipart/form-data">

            <div class="panel-body " >               
               
                <div class="form-inline">
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="form-group">
                        <label>Student ID</label>
                        <select name="student_id" id="student_id" class="form-control" required onChange="load_student_details(this.value);">
                            <option value="">Select Student ID </option>
                            <? if($student_list){
                                foreach($student_list as $dataraw)
                                {
                                    ?>
                                    <option value="<?=$dataraw->id?>" ><?=$dataraw->student_id?></option>
                                <? }}?>
                            </select>

                            
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6 col-xs-6 " >
                       <div class="form-group">
                        <label>Full Name</label>
                        <input type="text" class="form-control" id="surname" name="surname" value="" placeholder="Name" readonly>
                        
                    </div>

                </div> 
                </div>

                <br> 
                <br>      

                
                <div class="panel-body" style="text-align: center;" id="form_div">           

                 
            <table class="table" id="table">

                <thead>
                    <tr>
                        <th style="text-align: center">Grade</th>
                        <th style="text-align: center">Maths</th>
                        <th style="text-align: center">Science </th>
                        <th style="text-align: center">English</th>
                        
                    </tr>
                </thead>

                <?php 
                ?>

                <input type="hidden" value="<?php echo null; ?>" name="clickEdit" id="clickEdit">



                <tbody >

                    <tr>          
                             
                        
                        <td ><input type="text"  name="grade" id="grade" required></td>
                        <td ><input type="number"  name="maths" id="maths" required></td>
                        <td ><input type="number"  name="science" id="science" required></td>
                        <td ><input type="number"  name="english" id="english" required></td>                
                        
                    </tr>
                    
                   
                    

                    
                </tbody>
                <?php // }
                ?>


            </table>

                
                
                <div class="form-group row" id="submit_div">
                    <div class="col-md-offset-1 col-md-9" style="margin-left: 35%;">

                      
                      <button  type="submit" id="submit" name="submit" class="btn btn-primary w-md m-b-5"><i class="fa fa-plus"></i> Confirm</button>

                     


                 
             </div>
         </div>
     </div>
 
     </div>
 
 </form>
</div>




</div>

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


<script src="<?=base_url()?>media/js/jquery.confirm.js"></script>


<script>
    (function(a){a.fn.confirm=function(b){if(typeof b==="undefined"){b={}}this.click(function(c){c.preventDefault();var d=a.extend({button:a(this)},b);a.confirm(d,c)});return this};a.confirm=function(f,i){if(a(".confirmation-modal").length>0){return}var j={};if(f.button){var b={title:"title",text:"text","confirm-button":"confirmButton","cancel-button":"cancelButton","confirm-button-class":"confirmButtonClass","cancel-button-class":"cancelButtonClass","dialog-class":"dialogClass"};a.each(b,function(e,k){var l=f.button.data(e);if(l){j[k]=l}})}var g=a.extend({},a.confirm.options,{confirm:function(){var e=i&&(("string"===typeof i&&i)||(i.currentTarget&&i.currentTarget.attributes.href.value));if(e){if(f.post){var k=a('<form method="post" class="hide" action="'+e+'"></form>');a("body").append(k);k.submit()}else{window.location=e}}},cancel:function(e){},button:null},j,f);var c="";if(g.title!==""){c='<div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><h4 class="modal-title">'+g.title+"</h4></div>"}var d='<div class="confirmation-modal modal fade" tabindex="-1" role="dialog"><div class="'+g.dialogClass+'"><div class="modal-content">'+c+'<div class="modal-body">'+g.text+'</div><div class="modal-footer"><button class="confirm btn '+g.confirmButtonClass+'" type="button" data-dismiss="modal">'+g.confirmButton+'</button><button class="cancel btn '+g.cancelButtonClass+'" type="button" data-dismiss="modal">'+g.cancelButton+"</button></div></div></div></div>";var h=a(d);h.on("shown.bs.modal",function(){h.find(".btn-primary:first").focus()});h.on("hidden.bs.modal",function(){h.remove()});h.find(".confirm").click(function(){g.confirm(g.button)});h.find(".cancel").click(function(){g.cancel(g.button)});a("body").append(h);h.modal("show")};a.confirm.options={text:"Are you sure?",title:"",confirmButton:"Yes",cancelButton:"Cancel",post:false,confirmButtonClass:"btn-primary",cancelButtonClass:"btn-default",dialogClass:"modal-dialog"}})(jQuery);

    function confirm(){
        
        $('#complexConfirm').click();
    }
</script>

<!-- <script type="text/javascript">
    
   $("#complexConfirm").confirm({
    title:"Save confirmation",
    text: "Are You sure you want to save this ?",
    headerClass:"modal-header",
    confirm: function(button) {
            // button.fadeOut(2000).fadeIn(2000);
            // document.getElementById("inputform").submit();
            document.getElementById("submit").addEventListener("click", function(){
            document.getElementById("inputform").submit();
            });
        },
        cancel: function(button) {
            button.fadeOut(2000).fadeIn(2000);
        },
        confirmButton: "Yes I am",
        cancelButton: "No"
    });
</script> -->

<script>
    var add_new_invoice = $("#add_new_invoice");
    var invCount = <?php echo $invoice_counter; ?>;

    $(add_new_invoice).click(function(e) { //on add input button click

        var panel_body = $(".add_invoice_holder");
        var maxInvoice = 6;

        // $recordCount++;
        e.preventDefault();
        if (invCount < maxInvoice) {
            // invoCount = invoCount+1 ;

            invCount++;

            $(panel_body).append('<tr><td ><input type="text"  name="invoice[' + invCount + '][station]" id="invoice[' + invCount + '][station]" required="yes"></td><td><input type="number"  name="invoice[' + invCount + '][liters]" id="invoice[' + invCount + '][liters]" required="yes"></td><td ><input type="number"   name="invoice[' + invCount + '][rupees]" id="invoice[' + invCount + '][rupees]" required="yes"></td><td><input type="file" id="receipt[]" name="receipt[]"></td><td></td></tr> <tr><td></td><td></td><td></td><td></td>   </tr>');

            

            $("#invoice_counter").val(invCount);

        }

    });
</script>