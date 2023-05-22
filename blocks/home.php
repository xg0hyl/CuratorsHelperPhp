<div class="container-home active-menu">
    <div class="btns-container">
        <button class="mb-2 btn btn-lg rounded-3 btn-dark PlanBtn" type="submit">План</button>
        <button class="mb-2 btn btn-lg rounded-3 btn-dark StudentBtn" type="submit">Учащиеся</button>
    </div>
</div>

<script> 
    jQuery('.PlanBtn').click(function() {
        jQuery('.plan-container').css('display', 'block');
        jQuery('.container-home').removeClass('active-menu');
    });

    jQuery('.StudentBtn').click(function() {
        jQuery('.listStudents-container').css('display', 'block');
        jQuery('.container-home').removeClass('active-menu');
    })
</script>