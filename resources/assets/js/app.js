
/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

window.$ = window.jQuery = require('jquery');

require('bootstrap-sass');

require('select2');
require('bootstrap-datepicker');

require('trumbowyg');
require('parsleyjs');
window.moment = require('moment');

$(document).ready(function(){


    $(".select2-multi, select").select2();



    $('.editor').trumbowyg({
        btns: [
            ['viewHTML'],
            ['formatting'],
            'btnGrp-semantic',
            ['link', 'insertImage'],
            'btnGrp-justify',
            'btnGrp-lists',
            ['horizontalRule'],
            ['removeformat'],
            ['fullscreen'],
        ]
    });


    $('#datepicker').datepicker({
        startDate: '0',
        // endDate: '90',
        format: "yyyy-mm-dd",
        maxViewMode: 2,
        keyboardNavigation: true,
        daysOfWeekDisabled: window.schedule.daysDisabled,
        daysOfWeekHighlighted: window.schedule.daysHighlighted,
        todayHighlight: true,
        // datesDisabled: ['04/06/2017', '04/21/2017'],
        toggleActive: true
    }).on('changeDate', function() {

        var selectedDate = $('#datepicker').datepicker('getFormattedDate');

        $(this).find('[type=hidden]').val(selectedDate);

        var weekday = moment(selectedDate).day();

        $.each(window.schedule.dayTimes[weekday+1], function(timeofday, enabled){
            console.log(weekday, timeofday, enabled);
            if (enabled) {
                $('[name=timeofday][value=' + timeofday + ']').removeAttr('disabled').closest('.form-group').removeClass('disabled');
            } else {
                console.log('[name=timeofday][value=' + timeofday + ']')            ;

                $('[name=timeofday][value=' + timeofday + ']').attr('disabled', 'disabled').closest('.form-group').addClass('disabled');
            }
        });


        console.log(moment(selectedDate).isoWeekday());

    });

});