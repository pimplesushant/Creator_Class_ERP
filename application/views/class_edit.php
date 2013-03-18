	<div class="container">
		<a class="btn" href="<?php echo base_url('index.php/class_controller'); ?>">Add New Class</a>
		<a class="btn" href="<?php echo base_url('index.php/class_controller/show_all_classes'); ?>">Show All Classes</a>
		<div class="container ">&nbsp;</div>
		<?php echo $this->session->flashdata('message'); ?>
	</div>
	<div class="container">
		<fieldset style="border:2px solid #C0C0C0; background-color:#f8f8f8;">&nbsp;
			<form class="form-horizontal" enctype="multipart/form-data" method="POST" action="<?php echo $class=site_url('class_controller/update'); ?>"  >
				<?php echo form_hidden('class_id', $row[0]->class_id); ?>
				<div class="control-group">
				<label class="control-label">Class Name</label>
				<div class="controls">
					<?php 
						$cname=array('name'=>'class_name', 'id'=>'class_name', 'value'=>$row[0]->class_name, 'required'=>'required');
						echo form_input($cname); 
						echo form_error('class_name');
					?>
				</div>
				</div>

				<div class="control-group">
				<label class="control-label">Address</label>
				<div class="controls">
					<?php 
						$caddress=array('name'=>'address', 'id'=>'address', 'rows'=>'2', 'value'=> $row[0]->address, 'required'=>'required');
						echo form_textarea($caddress);
						echo form_error('address');
					?>
				</div>
				</div>
				
				<div class="control-group">
				<label class="control-label">Telephone No.</label>
				<div class="controls">
					<?php 
						$ctelno=array('name'=>'telephone_no', 'id'=>'telephone_no', 'value'=>$row[0]->telephone_no);
						echo form_input($ctelno);
						echo form_error('telephone_no');
					?>
				</div>
				</div>
				
				<div class="control-group">
				<label class="control-label">Mobile Number</label>
				<div class="controls">
					<?php 
						$cmobno=array('name'=>'mobile_no', 'id'=>'mobile_no', 'value'=>$row[0]->mobile_no, 'required'=>'required');
						echo form_input($cmobno);
						echo form_error('mobile_no');
					?>
				</div>
				</div>
				
				<div class="control-group">
				<label class="control-label">Image</label>
				<div class="controls">
					<?php  
						$image=array('name'=>'image', 'id'=>'image', 'value'=>$row[0]->image, 'type'=>'file');
						echo form_input($image); 
						echo form_error('image');
					?>
				</div>
				</div>
				
				<div class="control-group">
				<label class="control-label">E-mail</label>
				<div class="controls">
					<?php 
						$email=array('name'=>'email_id', 'id'=>'email_id', 'value'=>$row1[0]->email_id, 'required'=>'required');
						echo form_input($email);
						echo form_error('email_id');
					?>
				</div>
				</div>

				<div class="control-group">
				<label class="control-label"></label>
				<div class="controls">
					<button class="btn btn-success" id="submit" type="submit">Submit</button>&nbsp;
				</div>
				</div>
					 
			</form>
		</fieldset>  
</div>
	