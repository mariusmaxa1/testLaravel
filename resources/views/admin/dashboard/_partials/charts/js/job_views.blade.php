<script>
    $(function () {
        var viewsStatsData = {
            labels: ["{!! implode('","', array_keys($stats['jobs']['views']['daily'])) !!}"],
            datasets: [
                {
                    label: "Views for last 15 days",
                    fillColor: "rgba(151,187,205,0.2)",
                    strokeColor: "rgba(151,187,205,1)",
                    pointColor: "rgba(151,187,205,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(151,187,205,1)",
                    data: [{{ implode(',', array_values($stats['jobs']['views']['daily'])) }}]
                }
            ]
        };

        var viewsChartDashboardOptions = {
            showScale: true,
            scaleShowGridLines: false,
            scaleGridLineColor: "rgba(0,0,0,.05)",
            scaleGridLineWidth: 1,
            scaleShowHorizontalLines: true,
            scaleShowVerticalLines: true,
            bezierCurve: true,
            bezierCurveTension: 0.3,
            pointDot: true,
            pointDotRadius: 4,
            pointDotStrokeWidth: 1,
            pointHitDetectionRadius: 20,
            datasetStroke: true,
            datasetStrokeWidth: 2,
            datasetFill: false,
            legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].lineColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
            maintainAspectRatio: false,
            responsive: true
        };

        var viewsChartDashboardCanvas = $("#viewsChartDashboard").get(0).getContext("2d");
        var viewsChartDashboard = new Chart(viewsChartDashboardCanvas);
        viewsChartDashboard.Line(viewsStatsData, viewsChartDashboardOptions);
    });
</script>