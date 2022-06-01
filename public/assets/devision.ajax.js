

    $(document).ready(function () {
        $(document).on("change","#faculty", function () {
            let id=$(this).val();
            $('#domain').empty();
            $('#domain').append('<option value="0" disabled selected>Domain</option>')

            $.ajax({
                type:'GET',
                url: "http://localhost/univ-certaficate-management/public/getDomainOfSpeciality/"+ id,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                },
                success: function(reponse){

                    alert(id);
                    console.log(reponse);
                    // var x = JSON.parse(reponse);
                    var h ='<option value="0" disabled selected>Domain</option>';
                    $('#domain').empty();
                    $('#domain').append('<option value="0" disabled selected>Domain</option>')
                    reponse.forEach(element =>{
                        h += "<option value="+element['domain_id']+">"+element['domain_code']+"</option>";
                        // $('.domain_cc').append(`<option value="${element['domain_id']}">${element['domain_code']}</option>`)

                    });

                    $(".domain_cc").html(h);
                },
                error: function (error){
                    console.log(error);
                }
            });

        });







        $(document).on("change",".domain_cc", function () {
            let ids=$(this).val();
            $('#devision').empty();
            $('#devision').append('<option value="0" disabled selected>Devision</option>')
            $.ajax({
                type:'GET',
                url: "http://localhost/univ-certaficate-management/public/getDevisionOfSpeciality/"+ ids,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                },
                success: function(reponse){
                    console.log(reponse);
                    // var x = JSON.parse(reponse);
                    var k ='<option value="0" disabled selected>Devision</option>';
                    $('#devision').empty();
                    $('#devision').append('<option value="0" disabled selected>Devision</option>')
                    reponse.forEach(element =>{
                        k += "<option value="+element['division_id']+">"+element['division_code']+"</option>";
                        // $('.domain_cc').append(`<option value="${element['domain_id']}">${element['domain_code']}</option>`)
                    console.log(k);
                    });
                    $(".devision_cc").html(k);
                }

            });

        });
});



