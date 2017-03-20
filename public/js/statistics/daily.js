$(function () {

    $('#top-book').highcharts({

        chart: {

            type: 'column'

        },
        title: {

            text: 'Top 5 cuốn sách bán chạy nhất ngày'

        },
        xAxis: {

            categories: categories_topbook

        },
        yAxis: {

            title: {

                text: 'Số lượng'

            }

        },
        series: [{

                name: 'Tên sách',
                data: data_topbook

            }]

    });

});
