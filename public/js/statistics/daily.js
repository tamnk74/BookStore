$(function () {

    $('#top-book').highcharts({

        chart: {

            type: 'column'

        },
        title: {

            text: labelTopbook

        },
        xAxis: {

            categories: categories_topbook

        },
        yAxis: {

            title: {

                text: numberOfBook

            }

        },
        series: [{

                name: labelBookName,
                data: data_topbook

            }]

    });

});
