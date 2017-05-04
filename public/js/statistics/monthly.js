$(function () {

    $('#top-book').highcharts({

        chart: {
            type: 'column'
        },
        title: {
            text: 'Top 5 cuốn sách bán chạy nhất tháng ' + month + ' - ' + year
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

    // Make monochrome colors and set them as default for all pies
    Highcharts.getOptions().plotOptions.pie.colors = (function () {
        var colors = [],
                base = Highcharts.getOptions().colors[0],
                i;

        for (i = 0; i < 10; i += 1) {
            // Start out with a darkened base color (negative brighten), and end
            // up with a much brighter color
            colors.push(Highcharts.Color(base).brighten((i - 3) / 7).get());
        }
        return colors;
    }());

// Build the chart
    Highcharts.chart('catagory', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Top các loại sách ưa thích tháng ' + month + ' - ' + year
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
                name: 'Brands',
                data: categoryData
            }]
    });
    
    $('#revenue').highcharts({

        chart: {
            type: 'column'
        },
        title: {
            text: 'Thống kê doanh thu theo tháng của năm ' + year
        },
        xAxis: {
            categories: categories_month
        },
        yAxis: {
            title: {
                text: 'Doanh thu'
            }
        },
        series: [{
                name: 'Nhập sách',
                data: data_bill
            },{
                name: 'Bán sách',
                data: data_import
            }]
    });
    $('#turnover').highcharts({

        chart: {
            type: 'column'
        },
        title: {
            text: 'Thống kê doanh số theo tháng của năm ' + year
        },
        xAxis: {
            categories: categories_month
        },
        yAxis: {
            title: {
                text: 'Doanh số'
            }
        },
        series: [{
                name: 'Nhập sách',
                data: data_bills
            },{
                name: 'Bán sách',
                data: data_imports
            }]
    });
    $('#turnover').click(function () {
        chart.reflow();
    });


});
