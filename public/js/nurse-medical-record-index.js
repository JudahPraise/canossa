$( document ).ready(function() {
    $('.table').DataTable( {
        responsive:true,
        columnDefs: [
		            { responsivePriority: 1, targets: 0 },
		            { responsivePriority: 2, targets: 4 }
		        ],
        searching: false,
        bInfo: false,
        bLengthChange: false,
        bPaginate: false,

    });
    $('.hospitalization-edit').each(function(){
        $(this).click(function(event){
            $('#updateHospitalization').attr("action", "/medical-record/nurse/hospitalization/update/"+$(this).data('hospitalizationid')+"");
            $('input[name="disease"]').val($(this).data('disease'));
            $('input[name="d_date"]').val($(this).data('ddate'));
            $('input[name="operation"]').val($(this).data('operation'));
            $('input[name="o_date"]').val($(this).data('odate'));
        });
    });
    $('.hospitalization-delete').each(function(){
        $(this).click(function(event){
            $('#destroyHospitalization').attr("action", "/medical-record/nurse/hospitalization/delete/"+$(this).data('hospitalizationid')+"");
        });
    });
    $('.immunization-edit').each(function(){
        $(this).click(function(event){
            $('#updateImmunization').attr("action", "/medical-record/nurse/immunization/update/"+$(this).data('idimmunization')+"");
            $("#vaccine").val($(this).data('vaccine'));
            $("#status").val($(this).data('status'));
            $("#brand").val($(this).data('brand'));
            $("#date").val($(this).data('date'));
            
        });
    });
    $('.immunization-delete').each(function(){
        $(this).click(function(event){
            $('#destroyImmunization').attr("action", "/medical-record/nurse/immunization/delete/"+$(this).data('idimmunization')+"");
        });
    });

    $('.medication-edit').each(function(){
        $(this).click(function(event){
            $('#updatemedication').attr("action", "/medical-record/nurse/medication/update/"+$(this).data('medid')+"");
            $("#name").val($(this).data('name'));
            $("#condition").val($(this).data('condition'));
            $("#strength").val($(this).data('mg'));
            $("#frequency").val($(this).data('frequency'));
            
        });
    });
    
    $('.medication-delete').each(function(){
        $(this).click(function(event){
            $('#destroyMedication').attr("action", "/medical-record/nurse/medication/delete/"+$(this).data('medid')+"");
        });
    });


    $('.delete-pill').each(function(){
        $(this).click(function(){
            console.log($(this).data('illnessid'));
            $('#historyDelete').attr("action", "/medical-record/nurse/history/delete/"+$(this).data('illnessid')+"");
            $('#historyDelete').submit();
        });
    });


});