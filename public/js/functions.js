
function getInfo(id){
    $.ajax({
        type: 'GET',
        url: `/withCategory/` + id,
        dataType: 'JSON',
        success: function (data) {
            // console.log(data);
            $('#panelEmpresas').html(data);
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
