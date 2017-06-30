$(function () {

    $('#sale_quarter').highcharts({

        chart: {
            type: 'column'
        },
        title: {
            text: 'Thống kê quý ' + quarter + ' - ' + year
        },
        xAxis: {
            categories: months
        },
        yAxis: {
            title: {
                text: 'Doanh số'
            }
        },
        series: [{
            name: 'Sách bán ra',
            data: totalBill
        },{
            name: 'Sách nhập vào',
            data: totalImport
        }]
    });
    $('#revenue-quarter').highcharts({

        chart: {
            type: 'column'
        },
        title: {
            text: 'Thống kê quý ' + quarter + ' - ' + year
        },
        xAxis: {
            categories: months
        },
        yAxis: {
            title: {
                text: 'Doanh thu'
            }
        },
        series: [{
            name: 'Doanh thu',
            data: revenue
        },{
            name: 'Chi phí',
            data: cost
        }]
    });

    // Build the chart
    Highcharts.chart('catagory', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Top các loại sách ưa thích quý ' + quarter + ' - ' + year
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

    $('#top-book').highcharts({

        chart: {
            type: 'column'
        },
        title: {
            text: 'Top 10 cuốn sách bán chạy nhất qúy ' + quarter + ' - ' + year
        },
        xAxis: {
            categories: categoriesTopBook
        },
        yAxis: {
            title: {
                text: 'Số lượng'
            }
        },
        series: [{
            name: 'Tên sách',
            data: dataTopBook
        }]
    });

    /* Morris.js Charts */
    // Sales chart
    var area = new Morris.Area({
        element: 'revenue-chart',
        resize: true,
        data: revenueQuarters,
        xkey: 'y',
        ykeys: ['revenue', 'cost'],
        labels: ['Doanh thu', 'Chi phí'],
        lineColors: ['#a0d0e0', '#3c8dbc'],
        pointSize: 2,
        hideHover: 'auto'
    });
})