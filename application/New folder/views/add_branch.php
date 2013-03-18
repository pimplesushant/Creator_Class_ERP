<div class="container">


<legend>Add Branch Details</legend>

<fieldset style="border:2px solid #C0C0C0; background-color:#f8f8f8;">&nbsp;

<form class="form-horizontal">
<div class="control-group">
    <label class="control-label" for="Branch Name">Branch Name</label>
        <div class="controls">
        <input type="text" id="branch_name" class="input-xlarge" placeholder="Branch Name" >
        </div>
</div>

<div class="control-group">
    <label class="control-label" for="Branch Address">Branch Address</label>
        <div class="controls">
		<textarea rows="2" class="input-xlarge" placeholder="House, Landmark, City, Pincode"></textarea>
		</div>
</div>

<div class="control-group">
				<label class="control-label">Telephone No.</label>
				<div class="controls">
					<input type="text" class="input-small" id="std_code" name="std_code" placeholder="STD Code"> - 
					<input type="text" class="input-medium" id="telephone_number" name="telephone_number" placeholder="Phone Number">
				</div>
			</div>

<div class="input-prepend control-group">
				<label class="control-label">Mobile No.</label>
					<div class="controls">
					<span class="add-on">+91</span>
					<input class="input-large" id="mobile" type="text" placeholder="xxxxxxxxxx">
				</div>
			</div>

<div class="control-group">
		<label class="control-label" for="Email Id">E-mail</label>
		<div class="controls">
	    <input type="text" class="input-xlarge" id="email_id" placeholder="E-mail Address">
		</div>&nbsp;
		
<div class="control-group">	
		<label class="control-label"></label>
	<div class="controls">
	<button type="Save" class="btn btn-success">Save</button>&nbsp;
    <button type="button" class="btn">Clear</button>
	</div>
<script language="javascript">
$(function() {
    //Use BootstrapModal for object List editor
    Backbone.Form.editors.List.Modal.ModalAdapter = Backbone.BootstrapModal;

    //Main model definition
    var User = Backbone.Model.extend({
        schema: { notes:      { type: 'List' }   }
    });
    
    var user = new User({ notes: ['']  });
    
    //The form
    var form = new Backbone.Form({ model: user }).render();
    
    //Add it to the page
    $('body').append(form.el);
});	</script>
</div>    
</div>  
</div>
    </form>
	</fieldset>
	</div>
	</div>