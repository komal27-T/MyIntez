/*======== 16. ANALYTICS - ACTIVITY CHART ========*/

$(function () {
    var activity = document.getElementById("activityBar");
    if (activity !== null) {
        var activityData = [
            {
                first: [35, 65, 52, 115, 98, 185, 125,35, 65, 52, 115, 140],
                second: [40, 105, 92, 155, 138, 205, 165, 35, 65, 52, 115, 110],
            },
           
        ];

        activity.height = 100;
	url :"http://localhost:8080/intez-html/homeChartData.php",
        var config = {
            type: "bar",
            data: {
                labels: [
                    var expense = [];
				var amt = [];
				for(var i in data){
					expense.push("Id"+ data[i].pid);
					amt.push("Amount" + data[i].pamt);
				}
                ],
                datasets: [
                    {
                        label: "Youtube",
                        backgroundColor: "rgba(22, 82, 240, 0.75)",
                        borderColor: "transparent",
                        data: activityData[0].first,
                        lineTension: 0,
                        pointRadius: 0,
                        borderWidth: 2,
                    },
                    {
                        label: "Facebook",
                        backgroundColor: "rgba(22, 82, 240, 0.5)",
                        borderColor: "transparent",
                        data: activityData[0].second,
                        lineTension: 0,
                        // borderDash: [10, 5],
                        borderWidth: 1,
                        pointRadius: 0,
                    },
                ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    display: false,
                },
                scales: {
                    xAxes: [
                        {
                            stacked: true,
                            barPercentage: 0.40,
                            gridLines: {
                                display: false,
                                drawBorder: false,
                            },
                            ticks: {
                                fontColor: "#8a909d",
                            },
                        },
                    ],
                    yAxes: [
                        {
                            stacked: true,
                            gridLines: {
                                display: true,
                                color: "#eee",
                            },
                            ticks: {
                                stepSize: 50,
                                fontColor: "#8a909d",
                            },
                        },
                    ],
                },
                tooltips: {
                    mode: "index",
                    intersect: false,
                    titleFontColor: "#888",
                    bodyFontColor: "#555",
                    titleFontSize: 12,
                    bodyFontSize: 15,
                    backgroundColor: "rgba(256,256,256,0.95)",
                    displayColors: true,
                    xPadding: 10,
                    yPadding: 7,
                    borderColor: "rgba(220, 220, 220, 0.9)",
                    borderWidth: 2,
                    caretSize: 6,
                    caretPadding: 5,
                },
            },
        };

        var ctx = document.getElementById("activityBar").getContext("2d");
        var myLine = new Chart(ctx, config);

        var items = document.querySelectorAll("#user-activity .btn");
        items.forEach(function (item, index) {
            item.addEventListener("click", function () {
                config.data.datasets[0].data = activityData[index].first;
                config.data.datasets[1].data = activityData[index].second;
                myLine.update();
            });
        });
    }
});