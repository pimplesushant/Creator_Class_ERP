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
    $('body').append(form.e1);
});