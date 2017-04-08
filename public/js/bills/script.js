/**
 * Created by Tam on 25-Mar-17.
 */
$().ready(function() {
    $('.selectpicker').select2({
        placeholder: 'Select an item',
        ajax: {
            url: '/search-book',
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                return {
                    results:  $.map(data, function (item) {
                        return {
                            text: item.name,
                            id: item.id
                        }
                    })
                };
            },
            cache: true
        }
    });

    var max_fields = 10; //maximum input boxes allowed
    var x = 1;
    $("table.table-bill").on("click", ".btn-remove", function(e){
        e.preventDefault();
        $(this).parent().parent().remove();
        x--;
    });

    $('.btn-add').click(function(e){
        e.preventDefault();
        var bookName = $(this).parent().parent().find('select option:selected').text();
        var bookId = $(this).parent().parent().find('select option:selected').val();
        var bookAmount = $(this).parent().parent().find('#bookAmount').val();
        if(x < max_fields && bookId != null && bookAmount != 0){ //max input box allowed
            x++; //text box increment
            $.ajax({url: "demo_test.txt", success: function(result){
                $("#div1").html(result);
            }});
            var html = "<tr>"
                + "<td>" + bookName + "<input name='book_id[]' type='hidden' value='" + bookId + "'>"
                + "<td>" + bookAmount + "<input name='amount[]' type='hidden' value='"+ bookAmount + "'>"
                + "</td><td><a class=\"btn btn-default btn-remove\" href=\"#\">Remove</a></td></tr>";
            console.log(html);
            $("table.table-bill").append(html);
        }
        else alert("Vui long dien gia tri hop le!");
    });
});