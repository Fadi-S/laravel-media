import "./admin/deleteAll.js";
$(".data-table").DataTable({
    'language' : {
        'url': '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Arabic.json'
    }
});
$('.multi-select').multiSelect();
$('div.alert').not(".alert-important, .alert-normal").each(function(i){
    $(this).delay(5000 * (i+1)).hide(500);
});
$('#flash-overlay-modal').modal();