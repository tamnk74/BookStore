$(function () { 

        var data_click = {{ json_encode(array_column($data['top_book'], 'sum'),JSON_NUMERIC_CHECK)}};

        var data_viewer = {{ json_encode(array_column($data['top_book'], 'sum'),JSON_NUMERIC_CHECK)}};

    $('#example').highcharts({

        chart: {

            type: 'column'

        },

        title: {

            text: 'Thống kê theo tháng'

        },

        xAxis: {

            categories: {{json_encode(array_column($data['top_book'], 'name'),JSON_NUMERIC_CHECK)}}

        },

        yAxis: {

            title: {

                text: 'Rate'

            }

        },

        series: [{

            name: 'Click',

            data: data_click

        }, {

            name: 'View',

            data: data_viewer

        }]

    });

});
