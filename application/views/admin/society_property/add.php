<?php $this->load->view('admin/header'); ?>
<style type="text/css">
#id-form th {
    line-height: 28px;
    min-width: 130px;
    padding: 10px;
    text-align: left;
    width: 284px;
}
</style>
 <div class="clear"></div>
 <script type="text/javascript">
 function getstates()
  {
	  id=$('#countryid').val();
	  url='<?php echo base_url();?>admin/master/getstate';
	  
	  $.post(url,{"id":id,"action":"states"},function (data)		{ 	$('#stateid').html(data); 	});				

	  	  
  } 
  


function getcity()
  {
	  id=$('#stateid').val();
	  url='<?php echo base_url();?>admin/master/getcity';
	  
	  $.post(url,{"id":id,"action":"city"},function (data)		{ 	$('#cityid').html(data); 	});				

	  	  
  } 
  
function  getarea()
  {

	  id=$('#cityid').val();
	  url='<?php echo base_url();?>admin/master/getarea';
	  
	  $.post(url,{"id":id,"action":"area"},function (data){ 
		 $('#areaid').html(data); 	});				

	  	  
  } 
  
 function getsociety()
  {
	  id=$('#areaid').val();
	  
	  

	  url='<?php echo base_url();?>admin/master/getsociety';
	  
	  $.post(url,{"id":id,"action":"area"},function (data)	{ 
	 $('#societyid').html(data); 	});				

	  
	  }

 
  $(document).ready(function () {
 

 $('#addnewsocity').validate({ // initialize the plugin
        rules: {
           		 societyid: {
                required: true				
               
            },
			
			 address: {
                required: true,
				maxlength:50
               
            }
			
        }
    });

});

</script>
<style>
#addnewsocity label.error {float:right !important; width:250px;}

</style>
<div id="content-outer">
<!-- start content -->
<div id="content">

	<!--  start page-heading -->
	<div id="page-heading">
		<h1>Add New Property</h1><br>
		
		
		

   <?php 
   
   $msg_error = $this->session->flashdata('msg_error'); 
   
   if($msg_error !=''){ ?>             
   <div id="message-green">

				<table width="50%" cellspacing="0" cellpadding="0" border="0">

				<tbody><tr>

					<td class="green-left"><?php echo  $msg_error; ?></td>

					<td class="green-right"><a class="close-green"><img alt="" src="<?php echo AdminThemeUrl; ?>images/table/icon_close_green.gif"></a></td>

				</tr>

				</tbody></table>
</div>
<?php } ?>




	</div>
	<!-- end page-heading -->

    <div style=" display:none;" id="error1"></div>                        

	<table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
	<tr>
		<th rowspan="3" class="sized"><img src="<?php echo AdminThemeUrl; ?>images/shared/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
		<th class="topleft"></th>
		<td id="tbl-border-top">&nbsp;</td>
		<th class="topright"></th>
		<th rowspan="3" class="sized"><img src="<?php echo AdminThemeUrl; ?>images/shared/side_shadowright.jpg" width="20" height="300" alt="" /></th>
	</tr>
	<tr>
		<td id="tbl-border-left"></td>
		<td>
		<!--  start content-table-inner ...................................................................... START -->
		  <form  id="addnewsocity" name="addnewsocity" method="post"  action="<?php echo base_url();?>admin/society_property/add" >
		    <input type="hidden" name="countryid" value="1" >
            	<table id="id-form" class="table table-bordered">
				<thead>
					
                 
               
                <tr>
                  <th>Society</th>
                  <td>
                 <select id="societyid" name="societyid" >
				  <option value="">Select Your Society</option>
				  <?php
				  if(count($sodata) >0){

				  foreach($sodata as $society){
				 
				  echo "<option value=".$society['id'].">".$society['society_title']."</option>";
				  
				  }
				  
				  }				  ?>
                    
                 </select>
                    
                    </td>
                </tr>
                <tr>    
				   <th>Property Address</th><td><textarea name="address" id="address" ></textarea></td>
                    	                
					</tr>
                   
                   <tr>    
				    	<th>&nbsp;</th>
                        <td>
                         <input type="submit" class="form-submit"  value="Add property" >&nbsp;<input class="form-reset" type="reset" value="Reset" >
                         <input type="hidden" id="status" name="status" value="1">
                         <input type="hidden" id="ip" name="ip" value="<?php echo $_SERVER['REMOTE_ADDR'];?>" >
                         </td>
                
					</tr>
		          
				</thead>
			
				
			</table>
            </form>
		<!--  end content-table-inner ............................................END  -->
		</td>
		<td id="tbl-border-right"></td>
	</tr>
	<tr>
		<th class="sized bottomleft"></th>
		<td id="tbl-border-bottom">&nbsp;</td>
		<th class="sized bottomright"></th>
	</tr>
	</table>
	<div class="clear">&nbsp;</div>

</div>
<!--  end content -->
<div class="clear">&nbsp;</div>
</div>


<div class="clear">&nbsp;</div>
    
<?php $this->load->view('admin/footer'); ?>