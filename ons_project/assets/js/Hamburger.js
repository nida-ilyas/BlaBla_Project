$( ".cross" ).hide();
$( ".menu" ).hide();
$( ".hamburger" ).click(function() {
    $( ".menu" ).slideToggle( "slow", function() {
        $( ".hamburger" ).hide();
        $( ".cross" ).show();
    });
});

$( ".cross" ).click(function() {
    $( ".menu" ).slideToggle( "slow", function() {
        $( ".cross" ).hide();
        $( ".hamburger" ).show();
    });
});


/**
 * Created by DanielaCarmelina on 13/05/2016.
 */
