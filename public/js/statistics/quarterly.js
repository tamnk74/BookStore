$(function () {

    $('#selft_quarter').highcharts({

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
                name: 'bill',
                data: totalBill
            },{
                name: 'import',
                data: totalImport
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
})