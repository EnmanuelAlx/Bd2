
function getInfo(id){
    $.ajax({
        type: 'GET',
        url: `/withCategory/` + id,
        dataType: 'JSON',
        success: function (data) {
            console.log('hey');
            $('#panelEmpresas').empty().append($(data));
        },
        error: function (data) {
            var errors = data.responseJSON;
            if (errors) {
                $.each(errors, function (i) {
                    console.log(errors[i]);
                });
            }
        }
    });
}
