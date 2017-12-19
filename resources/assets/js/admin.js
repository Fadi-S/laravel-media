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
$(document).ready(function () {
    $("input[data-toggle=preview]").on("change", function() {
        var imgElement = $($(this).data("target"));
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                imgElement.attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        }
    });
});