/**
 * Created by Tam on 21-Apr-17.
 */
$().ready(function() {
    function formatRepo(repo) {
        if (repo.loading) return repo.text;
        var markup = "<div class='media'>" +
            "<div class='media-left'><img class='media-object' src='/images/books/" + repo.front_cover
            + "' style='width:60px'/></div>" +
            "<div class='media-body'>" +
            "<h4 class='media-heading'>" + repo.name + "</h4>" +
            "<p>" + repo.author + "</p>" +
            "</div>" +
            "</div>";
        return markup;
    }

    function formatRepoSelection(repo) {
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
        escapeMarkup: function (markup) {
            return markup;
        }, // let our custom formatter work
        minimumInputLength: 1,
        templateResult: formatRepo, // omitted for brevity, see the source of this page
        templateSelection: formatRepoSelection // omitted for brevity, see the source of this page
    });
})