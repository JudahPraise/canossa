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
    // $('#medTable').DataTable( {
    //     responsive:true,
    //     columnDefs: [
    //                 { responsivePriority: 1, targets: 0 },
    //                 { responsivePriority: 2, targets: 4 }
    //             ],
    //     searching: false,
    //     bInfo: false,
    //     bLengthChange: false,
    //     bPaginate: false,
    //   });
    //  $('#immTable').DataTable( {
    //   responsive:true,
    //   columnDefs: [
	// 	          { responsivePriority: 1, targets: 0 },
	// 	          { responsivePriority: 2, targets: 4 }
	// 	      ],
    //   searching: false,
    //   bInfo: false,
    //   bLengthChange: false,
    //   bPaginate: false,
    // });
    $('.hospitalization-edit').each(function(){
        $(this).click(function(event){
            $('#updateHospitalization').attr("action", "/employee/medical-record/hospitalization/update/"+$(this).data('hospitalizationid')+"");
            $('input[name="disease"]').val($(this).data('disease'));
            $('input[name="d_date"]').val($(this).data('ddate'));
            $('input[name="operation"]').val($(this).data('operation'));
            $('input[name="o_date"]').val($(this).data('odate'));
        });
    });
    $('.hospitalization-delete').each(function(){
        $(this).click(function(event){
            $('#destroyHospitalization').attr("action", "/employee/medical-record/hospitalization/delete/"+$(this).data('hospitalizationid')+"");
        });
    });
    $('.immunization-edit').each(function(){
        $(this).click(function(event){
            $('#updateImmunization').attr("action", "/employee/medical-record/immunization/update/"+$(this).data('idimmunization')+"");
            $("#vaccine").val($(this).data('vaccine'));
            $("#status").val($(this).data('status'));
            $("#brand").val($(this).data('brand'));
            $("#date").val($(this).data('date'));
            
        });
    });
    $('.immunization-delete').each(function(){
        $(this).click(function(event){
            $('#destroyImmunization').attr("action", "/employee/medical-record/immunization/delete/"+$(this).data('idimmunization')+"");
        });
    });

    $('.medication-edit').each(function(){
        $(this).click(function(event){
            $('#updatemedication').attr("action", "/employee/medical-record/medication/update/"+$(this).data('medid')+"");
            $("#name").val($(this).data('name'));
            $("#condition").val($(this).data('condition'));
            $("#strength").val($(this).data('mg'));
            $("#frequency").val($(this).data('frequency'));
            
        });
    });
    
    $('.medication-delete').each(function(){
        $(this).click(function(event){
            $('#destroyMedication').attr("action", "/employee/medical-record/medication/delete/"+$(this).data('medid')+"");
        });
    });


    $('.delete-pill').each(function(){
        $(this).click(function(){
            console.log($(this).data('illnessid'));
            $('#historyDelete').attr("action", "/employee/medical-record/history/delete/"+$(this).data('illnessid')+"");
            $('#historyDelete').submit();
        });
    });


});