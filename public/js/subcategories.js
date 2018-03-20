$(document).ready(function(){
    showSubCategories($("#category_id").val());
    $("#category_id").change(function(){
        showSubCategories(this.value);
    });

});


function showSubCategories(categoryId)
{
    var select = $("#subcategory_id");

    select.empty();

    $.ajax({
        url: '/categories/'+categoryId+'/sub-categories',
        type: 'GET'
    }).done(function (data) {
        $.each(data, function(key, value) {
            select
                .append($("<option></option>")
                    .attr("value",value.id)
                    .text(value.name));
        });
    }).fail(function (data) {
        select.empty();
    });
}