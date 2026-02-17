function showMessage(message, type) {

    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-bottom-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };

    toastr[type](message);

}


function loadDataToTemplate(idTemplate, idContentData, data) {

var template = $('#'+idTemplate).html();
var html = Mustache.to_html(template, data);
$('#'+idContentData).html(html);
}

function loadDataToTemplate_(idTemplate, idContentData, data) {
    var template = $("#" + idTemplate).html();

    Mustache.parse(template);

    var renderedHtml = Mustache.render(template, {data: data});

    $("#" + idContentData).html(renderedHtml);

}
