$(document).ready(function () {
    $('#master').on('click', function() {
        if($(this).is(':checked',true))
            $(".sub_chk").prop('checked', true);
        else
            $(".sub_chk").prop('checked',false);
    });

    $(".sub_chk").on("click", function() {
        if(!$(this).is(':checked'))
            $("#master").prop("checked", false);
    });

    $('.delete_all').on('click', function() {

        var allVals = [];
        $(".sub_chk:checked").each(function() {
            allVals.push($(this).attr('data-id'));
        });

        if(allVals.length <=0)
            alert("Please select row.");
        else {
            if(confirm("Are you sure you want to delete this row?")) {
                var join_selected_values = allVals.join(",");
                $.ajax({
                    url: $(this).data('url'),
                    type: 'POST',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: 'ids='+join_selected_values,
                    success: function (data) {
                        if (data['success']) {
                            $(".sub_chk:checked").each(function() {
                                $(this).parents("tr").remove();
                            });
                            alert(data['success']);
                        } else if (data['error']) {
                            alert(data['error']);
                        } else {
                            alert('Whoops Something went wrong!!');
                        }
                    },
                    error: function (data) {
                        alert(data.responseText);
                    }
                });
                $.each(allVals, function( index, value ) {
                    $('table tr').filter("[data-row-id='" + value + "']").remove();
                });
            }
        }
    });

    $(document).on('confirm', function (e) {
        var ele = e.target;
        e.preventDefault();
        $.ajax({
            url: ele.href,
            type: 'POST',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success: function (data) {
                if (data['success']) {
                    $("#" + data['tr']).slideUp("slow");
                    alert(data['success']);
                } else if (data['error']) {
                    alert(data['error']);
                } else {
                    alert('Whoops Something went wrong!!');
                }
            },
            error: function (data) {
                alert(data.responseText);
            }
        });
        return false;
    });
});