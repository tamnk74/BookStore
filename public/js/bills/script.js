/**
 * Created by Tam on 25-Mar-17.
 */
$().ready(function() {
    function formatRepo (repo) {
        if (repo.loading) return repo.text;
        var markup = "<div class='media'>" +
            "<div class='media-left'><img class='media-object' src='/images/books/" + repo.front_cover
            + "' style='width:60px'/></div>" +
            "<div class='media-body'>" +
            "<h4 class='media-heading'>"+ repo.name + "</h4>"+
            "<p>"+repo.author+"</p>" +
            "</div>" +
            "</div>";
        return markup;
    }
    function formatRepoSelection (repo) {
        return repo.name || repo.text;
    }

    $('.selectpicker').select2({
        placeholder: 'Select an item',
        ajax: {
            url: '/search-book',
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    q: params.term, // search term
                    page: params.page
                };
            },
            processResults: function (data, params) {
                // parse the results into the format expected by Select2
                // since we are using custom formatting functions we do not need to
                // alter the remote JSON data, except to indicate that infinite
                // scrolling can be used
                params.page = params.page || 1;

                return {
                    results: data.items,
                    pagination: {
                        more: (params.page * 30) < data.total_count
                    }
                };
            },
            cache: true
        },
        escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
        minimumInputLength: 1,
        templateResult: formatRepo, // omitted for brevity, see the source of this page
        templateSelection: formatRepoSelection // omitted for brevity, see the source of this page
    });

    var max_fields = 10; //maximum input boxes allowed
    var x = 1;
    $("table.table-bill").on("click", ".btn-remove", function(e){
        e.preventDefault();
        total = total - parseInt($(this).parent().parent().find('td:eq(2)').text());
        $('.bill_total').text(total + " VND");
        $(this).parent().parent().remove();
        x--;
    });

    $('.btn-add').click(function(e){
        e.preventDefault();
        var bookName = $(this).parent().parent().find('.select2-selection__rendered').text()
        var bookId = parseInt($(this).parent().parent().find('select option:selected').val());
        var bookAmount = parseInt($(this).parent().parent().find('#bookAmount').val());
        if(x < max_fields && bookId >0 && bookAmount > 0){ //max input box allowed
            x++; //text box increment)
            $.ajax({
                type: "GET",
                url: "/get-book",
                dataType: 'json',
                delay: 250,
                data: {id: bookId},
                success: function(result){
                    total += parseInt(result.subtotal)*bookAmount;
                    var html = "<tr>"
                        + "<td>" + bookName + "<input name='book_id[]' type='hidden' value='" + bookId + "'>"
                        + "<td>" + bookAmount + "<input name='amount[]' type='hidden' value='"+ bookAmount + "'></td>";
                    html+= "<td>" + result.subtotal*bookAmount + " VND</td>";
                    html += "<td><a class=\"btn btn-link btn-remove\" href=\"#\">Xóa</a></td></tr>";
                    $("table.table-bill").append(html);
                    $('.bill_total').text(total + " VND");
                }
            });
        }
        else alert("Vui lòng điền giá trị hợp lệ!");
    });
});