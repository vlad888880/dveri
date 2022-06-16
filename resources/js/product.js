$(document).ready(function () {
    $('.about').on('click', function () {
        $('.about').removeClass('class_activ');
        $('.property').removeClass('class_activ');
        $('.recamend').removeClass('class_activ');
        $('.about').toggleClass('class_activ');
    });
    $('.property').on('click', function () {
        $('.about').removeClass('class_activ');
        $('.property').removeClass('class_activ');
        $('.recamend').removeClass('class_activ');
        $('.property').toggleClass('class_activ');
    });
    $('.recamend').on('click', function () {
        $('.about').removeClass('class_activ');
        $('.property').removeClass('class_activ');
        $('.recamend').removeClass('class_activ');
        $('.recamend').toggleClass('class_activ');
    });
});