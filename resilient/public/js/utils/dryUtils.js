function onShowFieldByCheckboxValue(checkboxId, inputHiddenId) {
    var checkboxValue = $(checkboxId).prop( "checked" )
    var inputToHidden = $(inputHiddenId);

    if(checkboxValue) {
        inputToHidden.hide()
    } else {
        inputToHidden.show();
    }
}

function preventDoubleSubmit(){
    jQuery.fn.preventDoubleSubmission = function() {
        $(this).on('submit',function(e){
            var $form = $(this);

            if ($form.data('submitted') === true) {
                // Previously submitted - don't submit again
                e.preventDefault();
            } else {
                // Mark it so that the next submit can be ignored
                $form.data('submitted', true);
            }
        });

        // Keep chainability
        return this;
    };

    $('form').preventDoubleSubmission();
}
