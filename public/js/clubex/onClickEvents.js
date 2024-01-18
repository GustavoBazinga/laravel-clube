$(document).ready(function() {
    $('#sports').on('click', function() {
        //GO TO SPORTS PAGE
        window.location.href = '/sports';
    });

    $('#professors').on('click', function() {
        //GO TO PROFESSORS PAGE
        window.location.href = '/professors';
    });

    $('#sportsClasses').on('click', function() {
        //GO TO CLASSES PAGE
        window.location.href = '/sportsClass';
    });
});