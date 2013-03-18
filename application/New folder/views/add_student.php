<script>
jQuery(function($) {
  $('div.btn-group[data-toggle-name=*]').each(function(){
    var group   = $(this);
    var form    = group.parents('form').eq(0);
    var name    = group.attr('data-toggle-name');
    var hidden  = $('input[name="' + name + '"]', form);
    $('button', group).each(function(){
      var button = $(this);
      button.live('click', function(){
          hidden.val($(this).val());
      });
      if(button.val() == hidden.val()) {
        button.addClass('active');
      }
    });
  });
});
</script>

<div class="container">
	<legend>Student Registration Form</legend>
	<fieldset style="border:2px solid #C0C0C0; background-color:#f8f8f8;">
		<form class="form-horizontal" id="addstudent" method="post" >&nbsp;
					
			<div class="control-group">
				<label class="control-label">Full Name</label>
				<div class="controls">
					<input type="text" class="input-large" id="last_name" required name="last_name" value="<?php echo set_value('last_name'); ?>"  placeholder="Surname"><span ><?php echo form_error('last_name'); ?></span>
					<input type="text" class="input-large" id="first_name"  required name="first_name"  value="<?php echo set_value('first_name'); ?>" placeholder="First Name"><span ><?php echo form_error('first_name'); ?></span>
					<input type="text" class="input-large" id="middle_name"  required name="middle_name"  value="<?php echo set_value('middle_name'); ?>" placeholder="Father's Name"><span ><?php echo form_error('middle_name'); ?></span>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label">Gender</label>
				<div class="controls">
				<div class="btn-group" data-toggle-name="" data-toggle="buttons-radio">
					<button type="button" value="0" name="gender" class="btn btn-link"data-toggle="button">Male</button>
					<button type="button" value="1" name="gender" class="btn btn-link" data-toggle="button">Female</button>
				</div>
				<span ><?php echo form_error('gender'); ?></span>
				</div>
			</div>
			<input type="hidden" name="is_private" value="0" />
			
			<div class="control-group">
				<label class="control-label">Date of Birth</label>
				<div class="controls">
				<input type="date" name="dob" id="dob" required value="<?php echo set_value('dob'); ?>"><span ><?php echo form_error('dob'); ?></span>
				
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label">Email</label>
				<div class="controls">
					<input type="email"  class="input-xlarge" id="email_id" name="email_id" value="<?php echo set_value('email_id'); ?>" placeholder="E-mail Address">
					<span ><?php echo form_error('email_id'); ?></span>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label">Address</label>
				<div class="controls">
					<textarea class="input-xlarge" id="address" required name="address" value="<?php echo set_value('address'); ?>" placeholder="House, Landmark, City, Pincode" name="address"></textarea>
					<span ><?php echo form_error('address'); ?></span>
				</div>
			</div>
			
			<div class=" control-group">
				<label class="control-label"> Mobile No.</label>
					<div class="controls">
					<input class="input-xlarge" required id="mobile" name="mobile" value="<?php echo set_value('mobile'); ?>" type="text" placeholder="xxxxxxxxxx">
					<span ><?php echo form_error('mobile'); ?></span>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label">Telephone No.</label>
				<div class="controls">
					<input type="text" required class="input-xlarge" value="<?php echo set_value('telephone_number'); ?>" id="telephone_number" name="telephone_number" placeholder="Phone Number">
					<span ><?php echo form_error('telephone_number'); ?></span>
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label">School / College</label>
				<div class="controls">
					<input type="text" required class="input-xlarge" id="student_of" name="student_of" value="<?php echo set_value('student_of'); ?>" placeholder="School or College Name">
					<span ><?php echo form_error('student_of'); ?></span>
				</div>
			</div>

			
			
			
			<div class="fileupload fileupload-new controls" data-provides="fileupload">
				<div class="fileupload-new thumbnail" style="width: 150px; height: 180px;">
					<img src="http://www.placehold.it/150x180/EFEFEF/AAAAAA&text=NO PHOTO" /></div>
					<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
				
					<span class="btn btn-file">
						<span class="fileupload-new icon-upload"> Upload Photograph </span>
						<span class="fileupload-exists icon-upload"> Change</span><input type="file" />
					</span>
					<a href="#" class="btn fileupload-exists icon-remove-sign" data-dismiss="fileupload"> Remove</a>
				
			</div>
			
			
			
			
			<div class="control-group">
				<label class="control-label"></label>
				<div class="controls">
					<button type="submit" class="btn btn-success icon-save" > Save </button>
					<button type="submit" class="btn" > Clear </button>
				</div>
			</div>
			
			
			

		</form>
	</fieldset>
</div>
