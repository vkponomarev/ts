
$(function(){
    // bind change event to select
    $('#selectCountrySeasons').on('change', function () {
        let urlThis = $(this).val(); // get selected value
        if (urlThis) { // require a URL
            window.location = url+urlThis; // redirect
        }
        return false;
    });

    $('#selectCountry').on('change', function () {
        let urlThis = $(this).val(); // get selected value
        if (urlThis) { // require a URL
            window.location = url+urlThis; // redirect
        }
        return false;
    });


});
