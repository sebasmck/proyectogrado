function onShowFieldByCheckboxValue(checkboxId, inputHiddenId) {
    var checkboxValue = $(checkboxId).prop( "checked" )
    var inputToHidden = $(inputHiddenId);

    if(checkboxValue) {
        inputToHidden.hide()
    } else {
        inputToHidden.show();
    }
}
