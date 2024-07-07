$(document).ready(function () {
    var options1 = {
        chart: {
            height: 350,
            type: 'area',
            toolbar: {
                show: false,
            }
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            curve: 'smooth'
        },
        colors: ['#b3baff','#90e0db'],
        series: [{
            name: 'series1',
            data: [70, 79, 42, 51, 28, 40, 37]
        }, {
            name: 'series2',
            data: [41, 52, 14, 32, 45, 32, 21]
        }],

        xaxis: {
            type: 'datetime',
            categories: ["2018-09-19T00:00:00", "2018-09-19T01:30:00", "2018-09-19T02:30:00", "2018-09-19T03:30:00", "2018-09-19T04:30:00", "2018-09-19T05:30:00", "2018-09-19T06:30:00"],
            labels: {
                style: {
                    colors: 'rgba(94, 96, 110, .5)'
                }
            }
        },
        tooltip: {
            x: {
                format: 'dd/MM/yy HH:mm'
            },
        },
        grid: {
            borderColor: 'rgba(94, 96, 110, .5)',
            strokeDashArray: 4
        }    
    }

    var chart1 = new ApexCharts(
        document.querySelector("#apex1"),
        options1
    );

    chart1.render();

    var options2 = {
        series: [{
            name: 'Series 1',
            data: [20, 100, 40, 30, 50, 80, 33]
        }],
        chart: {
            height: 337,
            type: 'radar',
            toolbar: {
                show: false,
            }
        },
        dataLabels: {
            enabled: true
        },
        plotOptions: {
            radar: {
                size: 140,
                polygons: {
                    strokeColors: '#e9e9e9',
                    fill: {
                        colors: ['#f8f8f8', '#fff']
                    }
                }
            }
        },
        colors: ['#EE6E83'],
        markers: {
            size: 4,
            colors: ['#fff'],
            strokeColor: '#FF4560',
            strokeWidth: 2,
        },
        tooltip: {
            y: {
                formatter: function (val) {
                    return val
                }
            }
        },
        xaxis: {
            categories: ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday']
        },
        yaxis: {
            tickAmount: 7,
            labels: {
                formatter: function (val, i) {
                    if (i % 2 === 0) {
                        return val
                    } else {
                        return ''
                    }
                }
            }
        }
    };

    var chart2 = new ApexCharts(document.querySelector("#apex2"), options2);
    chart2.render();
});