//Carga el listado de regiones
function regionelements() {
    $.ajax({
        'url': location.origin + '/dropdown-regions',
        'type': 'GET',
        success: function(response) {
            $.each(response, function(i, regiones) {
                var region = $(
                    '<option value="' + regiones.id + '">' + regiones.name + '</option>'
                );
                $("#region_id").append(region);
            });
        }
    });
};
//Carga el listado de departamentos
function departmentelements() {
    $("#region_id").change(function() {
        var str = $("#region_id").val();
        $('#department_id').empty();
        $('#municipality_id').empty();
        $.ajax({
            url: location.origin + '/dropdown-departments/' + str,
            type: 'GET',
            success: function(response) {
                var tittle = $(
                    '<option>' + "Seleccione una linea" + '</option>'
                );
                $("#department_id").append(tittle);
                $.each(response, function(i, departments) {
                    var department = $(
                        '<option value="' + departments.id + '">' + departments.name + '</option>'
                    );
                    $("#department_id").append(department);
                });
            }
        });
    })
};

//carga el listado de municipalidades
function municipalityelements() {
    $("#department_id").change(function() {
        var str = $("#department_id").val();
        $.ajax({
            'url': location.origin + '/dropdown-municipalities/' + str,
            'type': 'GET',
            success: function(response) {
                if (response != 0) {
                    $("#municipality_id").empty();
                    $.each(response, function(i, municipalities) {
                        var municipality = $(
                            '<option  value="' + municipalities.id + '">' + municipalities.name + '</option>'
                        );
                        $("#municipality_id").append(municipality);
                    });
                } else {
                    $("#municipality_id").empty();
                    var nomunicipality = $(
                        '<option>' + "Sin registros" + '</option>'
                    );
                    $("#municipality_id").append(nomunicipality);
                }
            }
        });
    })
};