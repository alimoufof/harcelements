<!--====== JQuery from CDN ======-->
<script src="{{ asset('js/jquery.min.js') }}"></script>

<!--====== Bootstrap js ======-->
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>

<!--====== dataTables js ======-->
<script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>

<!--====== Chart.min js ======-->
<script src="{{ asset('js/Chart.min.js') }}"></script>
<script src="{{ asset('js/Chart.bundle.min.js') }}"></script>
<script src="{{ asset('js/chartfunction.js') }}"></script>

<!--====== wow.min js ======-->
<script src="{{ asset('js/wow.min.js') }}"></script>
<!--====== Main js ======-->
<script src="{{ asset('js/script.js') }}"></script>

<script>
    var color = Chart.helpers.color;
    function createConfig(colorName) {
        return {
            type: 'line',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                datasets: [{
                    label: 'My First dataset',
                    data: [
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor()
                    ],
                    backgroundColor: color(window.chartColors[colorName]).alpha(0.5).rgbString(),
                    borderColor: window.chartColors[colorName],
                    borderWidth: 1,
                    pointStyle: 'rectRot',
                    pointRadius: 5,
                    pointBorderColor: 'rgb(0, 0, 0)'
                }]
            },
            options: {
                responsive: true,
                legend: {
                    labels: {
                        usePointStyle: false
                    }
                },
                scales: {
                    xAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: 'Month'
                        }
                    }],
                    yAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: 'Value'
                        }
                    }]
                },
                title: {
                    display: true,
                    text: 'Normal Legend'
                }
            }
        };
    }

    function createPointStyleConfig(colorName) {
        var config = createConfig(colorName);
        config.options.legend.labels.usePointStyle = true;
        config.options.title.text = 'Point Style Legend';
        return config;
    }

    window.onload = function() {
        [{
            id: 'chart-legend-normal',
            config: createConfig('red')
        }, {
            id: 'chart-legend-pointstyle',
            config: createPointStyleConfig('blue')
        }].forEach(function(details) {
            var ctx = document.getElementById(details.id).getContext('2d');
            new Chart(ctx, details.config);
        });
    };
</script>