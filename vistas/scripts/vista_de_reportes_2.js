


$(document).ready(function(){

 // responsable mercado es el nombre del campo en el modal 
 $("#responsable_mercado").select2({
            ajax: {
    
 /// en el url poner la ruta de la ficha de las tablas 
                url: "../ajax/tablas_mercado.php",
                type: "post",
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        searchTerm: params.term // search term
                    };
                },
                processResults: function (response) {
                    return {
                        results: response
                    };
                },
                cache: true
            }
        });
    
    });
    

    init();