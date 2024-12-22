Chart.defaults.global.defaultFontColor = 'white';
let ctxLine,
    ctxBar,
    ctxPie,
    optionsLine,
    optionsBar,
    optionsPie,
    configLine,
    configBar,
    configPie,
    lineChart,
    barChart,
    pieChart;

// DOM is ready
$(function () {
    if (typeof drawLineChart === 'function') drawLineChart();
    if (typeof drawBarChart === 'function') drawBarChart();
    if (typeof drawPieChart === 'function') drawPieChart();

    $(window).resize(function () {
        if (typeof updateLineChart === 'function') updateLineChart();
        if (typeof updateBarChart === 'function') updateBarChart();                
    });
});