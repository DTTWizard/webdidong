$('.popovers').popover();
window.setTimeout(function() {
    $(".alertsea").fadeTo(2000, 500).slideUp(500, function(){
        $(this).remove(); });
}, 5000);