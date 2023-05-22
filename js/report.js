$(document).ready(function() {
    var hand = false;
    $('.report-body').on('click', 'tr', function() {
        $('.warningReport').css('display', 'none');
        var reportId = $(this).data('report-id');
        var textReport = $(this).find('.text_report').text();
        var hoursWeek = parseFloat($(this).find('.hours_week').text());
        var checkMark = $(this).find('.check_end').text();
        hand = true;
        var form = $('.form-report');
        form.data('report-id', reportId);
        form.find('input[name="ch_text_report"]').val(textReport);
        form.find('input[name="ch_report-hours_week"]').val(hoursWeek); 
        if (checkMark === "отмеченно") {
            form.find('input[name="ch_report-check"]').prop('checked', true);
        }
        
    
    });
    

    $('.form-report').submit(function(event) {
        event.preventDefault(); 
        var textReport = $('input[name="ch_text_report"]').val();
        var hoursWeek = $('input[name="ch_report-hours_week"]').val();
        var checkMark = $('input[name="ch_report-check"]').is(':checked') ? 'отмеченно' : 'не отмеченно';
        if (hand) {
            var reportId = $(this).data('report-id');
            $('.waiting-background').show();

            $.ajax({
                url: '../php/update_report.php',
                method: 'POST',
                data: {
                    reportId: reportId,
                    textReport: textReport,
                    hoursWeek: hoursWeek,
                    checkMark: checkMark
                },
                success: function() {
                    var selectedMonth = $('.mounth_select-report').val();
                    loadReportData(selectedMonth);
                    $('.waiting-background').hide();
                    hand = false;
                    $('input[name="ch_text_report"]').val('');
                    $('input[name="ch_report-hours_week"]').val('');
                    $('input[name="ch_report-check"]').prop('checked', false);
                },
                error: function(error) {
                    $('.waiting-background').hide();
                    hand = false;
                    $('input[name="ch_text_report"]').val('');
                    $('input[name="ch_report-hours_week"]').val('');
                    $('input[name="ch_report-check"]').prop('checked', false);
                    console.error(error);
                }
            });
        }
        else {
            if (textReport.trim() === '' || hoursWeek.trim() === '') {
                $('.warningReport').css('display', 'block');
                return;
            } else {
                $('.warningReport').css('display', 'none');
            }
            $('.waiting-background').show();

            var mounth = $('.mounth_select-report').val();

            $.ajax({
                url: '../php/add_report.php',
                method: 'POST',
                data: {
                    mounth: mounth,
                    textReport: textReport,
                    hoursWeek: hoursWeek,
                    checkMark: checkMark
                },
                success: function() {
                    var selectedMonth = $('.mounth_select-report').val();
                    loadReportData(selectedMonth);
                    $('.waiting-background').hide();
                    hand = false;
                    $('input[name="ch_text_report"]').val('');
                    $('input[name="ch_report-hours_week"]').val('');
                    $('input[name="ch_report-check"]').prop('checked', false);
                    $('.warningPlan').css('display', 'none');
                },
                error: function(error) {
                    hand = false;
                    $('input[name="ch_text_report"]').val('');
                    $('.waiting-background').hide();
                    $('input[name="ch_report-hours_week"]').val('');
                    $('input[name="ch_report-check"]').prop('checked', false);
                    $('.warningPlan').css('display', 'none');
                    console.error(error);
                }
            });
        }
        
    });


    var activeContextMenu = null;

    $('.report-body').on('contextmenu', 'tr', function(event) {
        event.preventDefault();
    
        if (activeContextMenu !== null) {
            activeContextMenu.hide();
        }
    
        var posX = event.pageX;
        var posY = event.pageY;
    
        var contextMenu = $('<div class="context-menu">');
        var deleteMenuItem = $('<div class="context-menu-item">Удалить</div>');
        var reportId = $(this).data('report-id');
    
        deleteMenuItem.on('click', function() {
            $('.waiting-background').show();

            $.ajax({
                url: '../php/delete_report.php',
                method: 'POST',
                data: {
                    reportId: reportId,
                },
                success: function() {
                    var selectedMonth = $('.mounth_select-report').val();
                    loadReportData(selectedMonth);
                    $('.waiting-background').hide();
                },
                error: function(error) {
                    console.error(error);
                    $('.waiting-background').hide();
                }
            });
    
            contextMenu.hide();
        });
    
        contextMenu.append(deleteMenuItem);
    
        contextMenu.css({
            top: posY,
            left: posX
        });
    
        $('body').append(contextMenu);
    
        $(document).one('click', function() {
            contextMenu.hide();
        });
    
        contextMenu.on('click', function(event) {
            event.stopPropagation();
        });
    
        contextMenu.show();
    
        activeContextMenu = contextMenu;
    });
    
      

});

