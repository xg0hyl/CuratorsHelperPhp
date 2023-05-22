$(document).ready(function() {
    $('.CardStSelect').on('change', function() { 
        var studentId = $('.CardStSelect').val();
        $('.cardInfo-FIO').val("");
        $('.cardInfo-Date').val("");
        $('.cardInfo-National').val("");
        $('.cardInfo-School').val("");
        $('.cardInfo-Adres').val("");
        $('.cardInfo-Phone').val("");
        $('.cardInfo-Hostel').val("");
        $('.cardInfo-Passport').val("");
        $('.cardInfo-Health').val("");
        $('.cardInfo-Relationship').val("");
        $('.cardInfo-Hobby').val("");
        $('.cardInfo-Mother').val("");
        $('.cardInfo-Father').val("");
        $('.cardInfo-Brothers').val("");
        $('.cardInfo-Sisters').val("");
        $('.cardInfo-accept, .cardInfo-cancel').hide();
        $('.cardInfo-edit').show();
        LoadStudentData(studentId);
    });

    $('.btn_close-passport').click(function() {
        $('.passport-popup').hide();
        $('input[name="passport-num"]').val('');
        $('input[name="passport-date"]').val('');
        $('input[name="passport-person"]').val('');
        $('.warningPassport').css('display', 'none');
        $('.cardInfo-accept, .cardInfo-cancel').hide();
        $('.cardInfo-edit').show();
    });

    $('.btn_close-parent').click(function() {
        $('.parent-popup').hide();
    });

    $('.btn_close-WhatDo_parent').click(function() {
        $('.whatDo-parent').hide();
    });

    $('.btn_close-Who_parent').click(function() {
        $('.Who-parent').hide();
        $('.Who-Mother').show();
        $('.Who-Father').show();
        $('.Who-Opekun').show();
    });

    $('.btn_close-WhatDo_other').click(function() {
        $('.whatDo-other').hide();
        
    });

    $('.btn_close-other').click(function() {
        $('.other-popup').hide();
        $('.other-who').empty();
        var option = $('<option>', { value: 'none', text: 'Выберите родственника' });
        $('.other-who').append(option);
        $('.other-who').val('none');
        $('input[name="other-fio"]').val('');
        $('input[name="other-date_born"]').val('');
        $('.Other-type').val('none');
    });



    $('.listStudents').on('click', '.st_item-more', function() {
        var studentId = $(this).data('student-id');
        LoadStudentData(studentId);
    });


    var studentObj;
    function LoadStudentData(studentId){
        $('.waiting-background').show();
        $.ajax({
            url: '../php/update_cardStudent.php',
            method: 'POST',
            data: {
                studentId: studentId
            },
            success: function(response) {
                studentObj = JSON.parse(response);
                $('.cardInfo-FIO').val(studentObj.FIO);
                $('.cardInfo-date_born').val(studentObj.date_born);
                $('.cardInfo-national').val(studentObj.national);
                $('.cardInfo-school').val(studentObj.school);
                $('.cardInfo-adres').val(studentObj.adres);
                $('.cardInfo-phone').val(studentObj.phone);
                if (studentObj.passport != null){
                    $('.cardInfo-Passport').val(studentObj.passport.num_passport + ', ' + 
                    studentObj.passport.person_issue + ', ' +
                    studentObj.passport.date_issue);
                }
                $('.cardInfo-Hostel').val(studentObj.room);
                $('.cardInfo-health').val(studentObj.health);
                $('.cardInfo-relationship').val(studentObj.relationship);
                $('.cardInfo-hobby').val(studentObj.hobby);
                if (studentObj.mother != null) {
                    $('.cardInfo-Mother').val(studentObj.mother.parent + ': ' +
                    studentObj.mother.FIO + ', ' +
                    studentObj.mother.date_bord + ', ' +
                    studentObj.mother.adres + ', ' + 
                    studentObj.mother.phone + ', ' +
                    studentObj.mother.job_place + ', ' +
                    studentObj.mother.job);
                }
                if (studentObj.father != null) {
                    $('.cardInfo-Father').val(studentObj.father.parent + ': ' +
                    studentObj.father.FIO + ', ' +
                    studentObj.father.date_bord + ', ' +
                    studentObj.father.adres + ', ' + 
                    studentObj.father.phone + ', ' +
                    studentObj.father.job_place + ', ' +
                    studentObj.father.job);
                }
                $('.cardInfo-Brothers').val(studentObj.brothers);
                $('.cardInfo-Sisters').val(studentObj.sisters);
                $('.CardStImage').attr('src', studentObj.photo);


                $('.waiting-background').hide();
            },
            error: function(error) {
                $('.waiting-background').hide();
                console.error('AJAX Error:', error);
            }
        });
    }


    var parents;
    $('.cardInfo-edit').on('click', function() {

        var $container = $(this).closest('.cardInfo-item-container');
        var $input = $container.find('input, textarea');
        var studentId = $('.CardStSelect').val();

        if ($input.attr('class') == 'cardInfo-Passport') {
            $('.passport-popup').show();
            $('input[name="passport-num"]').val(studentObj.passport.num_passport).prop('readonly', false);
            $('input[name="passport-date"]').val(studentObj.passport.date_issue).prop('readonly', false);
            $('input[name="passport-person"]').val(studentObj.passport.person_issue).prop('readonly', false);
        } else if ($input.attr('class') == 'cardInfo-Father') {
            $('.waiting-background').show();
            $.ajax({
                url: '../php/checkParent.php',
                method: 'POST',
                data: {
                    studentId: studentId,
                },
                success: function(response) {
                    var col = response.count;
                    parents = response.parents;

                    if (col === 2 || (col === 1 && parents.includes("Опекун"))) {
                        $('.AddParent').hide();
                    } else {
                        $('.AddParent').show();
                    }

                    if (col === 0) {
                        $('.ChangeParent').hide();
                        $('.AddParent').show();
                    } else {
                        $('.ChangeParent').show();
                    }

                    $('.waiting-background').hide();
                    $('.whatDo-parent').show();
                },
                error: function(error) {
                    console.error('AJAX Error:', error);
                    $('.waiting-background').hide();
                }
            });
        } else if ($input.attr('class') == 'cardInfo-Sisters') { 
            $('.whatDo-other').show();
        } else {
            $('.cardInfo-accept, .cardInfo-cancel').hide();
            $('input, textarea').prop('readonly', true);
            $('.cardInfo-edit').show();
            
            $input.data('previous-value', $input.val()); 
            $(this).hide();

            $container.find('.cardInfo-accept, .cardInfo-cancel').show();
            $input.prop('readonly', false).focus();
        }

      });
      

    
      $('.cardInfo-accept').on('click', function() {
        var $container = $(this).closest('.cardInfo-item-container');
        var $input = $container.find('input, textarea');
    
        $container.find('.cardInfo-accept, .cardInfo-cancel').hide();
    
        $container.find('.cardInfo-edit').show();
    
        $input.prop('readonly', true);
    
        if ($input.attr('class') == 'cardInfo-Hostel') {
            var field = 'room'; 
            var value = $input.val();
            var whatUpdate = 'hostel';
        } else {
            var field = $input.attr('class').split('-')[1]; 
            var value = $input.val();
            var whatUpdate = 'student';
        }
        var studentId = $('.CardStSelect').val();
        UpdateStudentData(studentId, field, value, whatUpdate);
      });
    
      $('.cardInfo-cancel').on('click', function() {
        var $container = $(this).closest('.cardInfo-item-container');
        var $input = $container.find('input, textarea');
    
        $container.find('.cardInfo-accept, .cardInfo-cancel').hide();
    
        $container.find('.cardInfo-edit').show();
        
        $input.prop('readonly', true).val($input.data('previous-value'));
      });



    $('.passport-popup form').submit(function(event) {
        event.preventDefault(); 
        if ($('input[name="passport-num"]').val() === "" || 
            $('input[name="passport-person"]').val() === "" || 
            $('input[name="passport-date"]').val() === "") {

            $('.warningPassport').show();
            return;

        } else {
            $('.warningPassport').hide();
        }
        var field = {
        num_passport: 'num_passport',
        person_issue: 'person_issue',
        date_issue: 'date_issue'
        };
        var value = {
            num_passport: $('input[name="passport-num"]').val(),
            person_issue: $('input[name="passport-person"]').val(),
            date_issue: $('input[name="passport-date"]').val()
            };
            var studentId = $('.CardStSelect').val();
        UpdateStudentData(studentId, field, value, 'passport');
        $('.passport-popup').hide();
        $('input[name="passport-num"]').val('');
        $('input[name="passport-date"]').val('');
        $('input[name="passport-person"]').val('');
        $('.warningPassport').hide();
      });

    
    $('.parent-popup form').submit(function(event) {
        event.preventDefault(); 
        if ($('input[name="parent-whois"]').val() === '' ||
            $('input[name="parent-fio"]').val() === '' ||
            $('input[name="parent-adres"]').val() === '' ||
            $('input[name="parent-phone"]').val() === '' ||
            $('input[name="parent-place_job"]').val() === '' ||
            $('input[name="parent-job"]').val() === '' ||
            $('input[name="parent-date_born"]').val() === '') {

                $('.warningParent').show();
                return;

        } else {
            $('.warningParent').hide();
        }
            var field = {
                parent: 'parent',
                FIO: 'FIO',
                date_bord: 'date_bord',
                adres: 'adres',
                phone: 'phone',
                job_place: 'job_place',
                job: 'job'
            };

            var value = {
                parent: $('input[name="parent-whois"]').val(),
                FIO : $('input[name="parent-fio"]').val(),
                adres: $('input[name="parent-adres"]').val(), 
                phone: $('input[name="parent-phone"]').val(), 
                job_place: $('input[name="parent-place_job"]').val(),
                job: $('input[name="parent-job"]').val(),
                date_bord: $('input[name="parent-date_born"]').val()
            };

            var studentId = $('.CardStSelect').val();
            UpdateStudentData(studentId, field, value, 'parent');
            $('.parent-popup').hide();
            $('input[name="parent-whois"]').val('');
            $('input[name="parent-fio"]').val(''); 
            $('input[name="parent-adres"]').val('');
            $('input[name="parent-phone"]').val(''); 
            $('input[name="parent-place_job"]').val(''); 
            $('input[name="parent-job"]').val('');
            $('input[name="parent-date_born"]').val('');
            $('.Who-Mother').show();
            $('.Who-Father').show();
            $('.Who-Opekun').show();
            $('.warningParent').hide();
    });

    $('.other-popup form').submit(function(event) {
        event.preventDefault(); 
        if ($('.other-who').val() === 'none' ||
            $('input[name="other-fio"]').val() === '' ||
            $('input[name="other-date_born"]').val() === '' ||
            $('.Other-type').val() === 'none') {
                $('.warningOther').show();
                return;
            } else {
                $('.warningOther').hide();
            }

        var IdNum = null;
        var who = null;
        if (IsChange) {
            IdNum = $('.other-who').val();
            who = $('.other-who option:selected').data('whois');
        } else {
            IdNum = 'none';
            who = $('.other-who').val();
        }
        var field = {
            id_num: 'id_num',
            whois: 'whois',
            status: 'status',
            date_born: 'date_born',
            FIO: 'FIO'
        };

        var value = {
            id_num: IdNum,
            whois: who,
            status: $('.Other-type').val(),
            date_born: $('input[name="other-date_born"]').val(),
            FIO: $('input[name="other-fio"]').val()
        };

        console.log(field);
        console.log(value);

        var studentId = $('.CardStSelect').val();
        UpdateStudentData(studentId, field, value, 'other');
        $('.other-popup').hide();
        $('.other-who').empty();
        var option = $('<option>', { value: 'none', text: 'Выберите родственника' });
        $('.other-who').append(option);
        $('.other-who').val('none');
        $('input[name="other-fio"]').val('');
        $('input[name="other-date_born"]').val('');
        $('.Other-type').val('none');
        $('.warningParent').hide();

    });

    var IsChange = false;
    $('.AddParent').on('click', function() {
        if (parents.includes("Мать")) {
            $('.Who-Mother').hide();
            $('.Who-Opekun').hide();
        } 
        if (parents.includes("Отец")) {
            $('.Who-Father').hide();
            $('.Who-Opekun').hide();
        }
        if (parents.includes("Опекун")) {
            $('.Who-Mother').hide();
            $('.Who-Father').hide();
            $('.Who-Opekun').hide();
        }

        $('.Who-parent').show();
        $('.whatDo-parent').hide();
        IsChange = false;
    });

    $('.AddOther').on('click', function() {
        var select = $('.other-who');
        var option1 = $('<option>', { value: 'Брат', text: 'Брат' });
        var option2 = $('<option>', { value: 'Сестра', text: 'Сестра' });
        select.append(option1);
        select.append(option2);
        $('.other-popup').show();
        $('.whatDo-other').hide();
        IsChange = false;
    });

    $('.ChangeParent').on('click', function() {
        if (parents.includes("Мать")) {
            $('.Who-Mother').show();
            $('.Who-Opekun').hide();
        } else {
            $('.Who-Mother').hide();
        }
        if (parents.includes("Отец")) {
            $('.Who-Father').show();
            $('.Who-Opekun').hide();
        } else {
            $('.Who-Father').hide();
        }
        if (parents.includes("Опекун")) {
            $('.Who-Mother').hide();
            $('.Who-Father').hide();
            $('.Who-Opekun').show();
        }
        IsChange = true;
        $('.Who-parent').show();
        $('.whatDo-parent').hide();

    });

    $('.ChangeOther').on('click', function() {
        $('.waiting-background').show();
        var studentId = $('.CardStSelect').val();
        $.ajax({
            url: '../php/other_select.php',
            method: 'POST',
            data: {
                studentId: studentId,
            },
            success: function(response) {
                $('.other-who').html(response);
                $('.waiting-background').hide();
            },
            error: function(error) {
                console.error('AJAX Error:', error);
            }
        });
        $('.other-popup').show();
        $('.whatDo-other').hide();
        IsChange = true;
    });

    $('.other-who').on('change', function() {
        if (IsChange) {
            if ($('.other-who').val() != 'none') {
                $('.waiting-background').show();
                var id_num = $('.other-who').val(); 
                $.ajax({
                    url: '../php/other_select-change.php',
                    method: 'POST',
                    data: {
                        id_num: id_num
                    },
                    success: function(response) {
                        var other = JSON.parse(response);
                        $('input[name="other-fio"]').val(other.FIO).prop('readonly', false);
                        $('input[name="other-date_born"]').val(other.date_born).prop('readonly', false);
                        $('input[name="other-date_born"]').val(other.date_born).prop('readonly', false);
                        $('.Other-type').val(other.status);
                        $('.waiting-background').hide();
                    },
                    error: function(error) {
                        $('.waiting-background').hide();
                        console.error('AJAX Error:', error);
                    }
                });
            }

        }
    });


    $('.Who-parent form button').click(function(event) {
        event.preventDefault();
        var buttonName = $(this).attr('name');
        
        if (buttonName === 'mother' || buttonName === 'opekun') {
            if (IsChange) {
                $('input[name="parent-whois"]').val(studentObj.mother.parent).prop('readonly', true);
                $('input[name="parent-fio"]').val(studentObj.mother.FIO).prop('readonly', false);
                $('input[name="parent-adres"]').val(studentObj.mother.adres).prop('readonly', false);
                $('input[name="parent-phone"]').val(studentObj.mother.phone).prop('readonly', false);
                $('input[name="parent-place_job"]').val(studentObj.mother.job_place).prop('readonly', false);
                $('input[name="parent-job"]').val(studentObj.mother.job).prop('readonly', false);
                $('input[name="parent-date_born"]').val(studentObj.mother.date_bord).prop('readonly', false);
            }
            if (buttonName === 'mother') {
                $('input[name="parent-whois"]').val("Мать").prop('readonly', true);
            } else {
                $('input[name="parent-whois"]').val("Опекун").prop('readonly', true);
            }
            $('.parent-popup').show();
            $('.Who-parent').hide();
        } else if (buttonName === 'father') {
            if (IsChange) {
                $('input[name="parent-whois"]').val(studentObj.father.parent).prop('readonly', true);
                $('input[name="parent-fio"]').val(studentObj.father.FIO).prop('readonly', false);
                $('input[name="parent-adres"]').val(studentObj.father.adres).prop('readonly', false);
                $('input[name="parent-phone"]').val(studentObj.father.phone).prop('readonly', false);
                $('input[name="parent-place_job"]').val(studentObj.father.job_place).prop('readonly', false);
                $('input[name="parent-job"]').val(studentObj.father.job).prop('readonly', false);
                $('input[name="parent-date_born"]').val(studentObj.father.date_bord).prop('readonly', false);
            }
            $('input[name="parent-whois"]').val("Отец").prop('readonly', true);
            $('.parent-popup').show();
            $('.Who-parent').hide();
        }
    });
    
    


      function UpdateStudentData(studentId, field, value, whatUpdate) {
        $('.waiting-background').show();
        $.ajax({
            url: '../php/update_Student.php',
            method: 'POST',
            data: {
                studentId: studentId,
                field: field,
                value: value,
                whatUpdate: whatUpdate
            },
            success: function(response) {
                console.log(response);
                LoadStudentData(studentId);
                $('.waiting-background').hide();
            },
            error: function(error) {
                console.error('AJAX Error:', error);
            }
        });
    }
});
