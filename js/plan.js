$(document).ready(function() {
    $('.btn_close-plan').click(function() {
        $('.plan-change-popup').css('display', 'none');
        $('.type_work-select').prop('selectedIndex', 0);
        $('input[name="ch_plan-date"]').val('');
        $('input[name="ch_plan-form"]').val('');
        $('input[name="ch_plan-check"]').prop('checked', false);
        $('.warningPlan').css('display', 'none');
    });
    var hand = false;
    $('.plan-body').on('click', 'tr', function() {
        var planId = $(this).data('plan-id');
        var typeOfWork = $(this).find('.type_work').text();
        var date = $(this).find('.plan_date').text();
        var formOfWork = $(this).find('.form_work').text();
        var checkMark = $(this).find('.check_end').text();
        hand = true;
        var form = $('.plan-change-popup form');
        form.data('plan-id', planId);
        form.find('.type_work-select option').filter(function() {
            return $(this).text() === typeOfWork;
        }).prop('selected', true);
        form.find('input[name="ch_plan-date"]').val(date);
        form.find('input[name="ch_plan-form"]').val(formOfWork);
        if (checkMark === "отмеченно") {
            form.find('input[name="ch_plan-check"]').prop('checked', true);
        }
    
        $('.plan-change-popup').css('display', 'block');

        
    });
    

    $('.plan-change-popup form').submit(function(event) {
        event.preventDefault(); 
        var typeOfWork = $('.type_work-select').val();
        var date = $('input[name="ch_plan-date"]').val();
        var formOfWork = $('input[name="ch_plan-form"]').val();
        var checkMark = $('input[name="ch_plan-check"]').is(':checked') ? 'отмеченно' : 'не отмеченно';
        if (hand) {
            var planId = $(this).data('plan-id');
            $('.waiting-background').show();

            $.ajax({
                url: '../php/update_plan.php',
                method: 'POST',
                data: {
                    planId: planId,
                    typeOfWork: typeOfWork,
                    date: date,
                    formOfWork: formOfWork,
                    checkMark: checkMark
                },
                success: function() {
                    $('.waiting-background').hide();
                    var selectedMonth = $('.mounth_select').val();
                    loadTableData(selectedMonth);
                    $('.type_work-select').prop('selectedIndex', 0);
                    $('input[name="ch_plan-date"]').val('');
                    $('input[name="ch_plan-form"]').val('');
                    $('input[name="ch_plan-check"]').prop('checked', false);
                    $('.warningPlan').css('display', 'none');
                    $('.plan-change-popup').css('display', 'none');
                },
                error: function(error) {
                    $('.waiting-background').hide();
                    console.error(error);
                }
            });
        }
        else {
            if (date.trim() === '' || formOfWork.trim() === '') {
                $('.warningPlan').css('display', 'block');
                return;
            } else {
                $('.warningPlan').css('display', 'none');
            }
            $('.waiting-background').show();

            var mounth = $('.mounth_select').val();

            $.ajax({
                url: '../php/add_plan.php',
                method: 'POST',
                data: {
                    mounth: mounth,
                    typeOfWork: typeOfWork,
                    date: date,
                    formOfWork: formOfWork,
                    checkMark: checkMark
                },
                success: function() {
                    var selectedMonth = $('.mounth_select').val();
                    $('.waiting-background').hide();
                    loadTableData(selectedMonth);
                    $('.type_work-select').prop('selectedIndex', 0);
                    $('input[name="ch_plan-date"]').val('');
                    $('input[name="ch_plan-form"]').val('');
                    $('input[name="ch_plan-check"]').prop('checked', false);
                    $('.warningPlan').css('display', 'none');
                    $('.plan-change-popup').css('display', 'none');
                },
                error: function(error) {
                    $('.waiting-background').hide();
                    console.error(error);
                }
            });
        }
        
    });

    $('.ChangePlanBtn').click(function() {
        $('.plan-change-popup').css('display', 'block');
        hand = false;
    });

    $('.ReportBtn').click(function() {
        $('.report-container').css('display', 'block');
        $('.plan-container').css('display', 'none');
    });


    var activeContextMenu = null;
    $('.plan-body').on('contextmenu', 'tr', function(event) {
        event.preventDefault();
    
        if (activeContextMenu !== null) {
            activeContextMenu.hide();
        }
    
        var posX = event.pageX;
        var posY = event.pageY;
    
        var contextMenu = $('<div class="context-menu">');
        var deleteMenuItem = $('<div class="context-menu-item">Удалить</div>');
        var planId = $(this).data('plan-id');
    
        deleteMenuItem.on('click', function() {
            $('.waiting-background').show();

            $.ajax({
                url: '../php/delete_plan.php',
                method: 'POST',
                data: {
                    planId: planId,
                },
                success: function() {
                    var selectedMonth = $('.mounth_select').val();
                    $('.waiting-background').hide();
                    loadTableData(selectedMonth);
                },
                error: function(error) {
                    $('.waiting-background').hide();
                    console.error(error);
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
    
        $(document).on('click', function() {
            contextMenu.hide();
        });
    
        contextMenu.on('click', function(event) {
            event.stopPropagation();
        });
    
        contextMenu.show();
    
        activeContextMenu = contextMenu;
    });

});

