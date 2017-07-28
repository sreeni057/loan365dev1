$(document).on('keydown', '.data-number', function (e) {
// Allow: backspace, delete, tab, escape, enter and .
if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110]) !== -1 ||
        // Allow: Ctrl+A, Command+A

                (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
                // Allow: home, end, left, right, down, up
                        (e.keyCode >= 35 && e.keyCode <= 40)) {

            // let it happen, don't do anything
            return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.keyCode === 32 || e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
$(document).on('keydown','.data-name',function(e){  

   if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 32]) !== -1 ||
                // Allow: Ctrl+A, Command+A

                        (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
                        // Allow: home, end, left, right, down, up
                                (e.keyCode >= 35 && e.keyCode <= 40)) {

                    // let it happen, don't do anything
                    return;
                }
                // Ensure that it is a number and stop the keypress
                if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105) && (e.keyCode < 65 || e.keyCode > 90)) {
                    e.preventDefault();
                }
});
/*$(".name").on("blur", function() {
    if ( $(this).val().match('^[a-zA-Z]{3,16}$') ) {
        alert( "Valid name" );
    } else {
        alert("That's not a name");
    }
});*/
