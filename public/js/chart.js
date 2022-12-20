$(function() {
    new Chart(document.getElementById("bar-chart"), {
        type: 'bar',
        data: {
            labels: ["2020", "2021", "2022", "2023", "2024","2025"],
            datasets: [{
                label: "Population (millions)",
                backgroundColor: ["#3e95cd", "#8e5ea2", "#3cba9f", "#e8c3b9", "#c45850","#c45850"],
                data: [2478, 5267, 734, 784, 433,500]
            }]
        },
        options: {
            legend: {
                display: false
            },
            title: {
                display: true,
                text: 'Project'
            }
        }
    });
})
google.charts.load("current", {packages:["corechart"]});
google.charts.setOnLoadCallback(drawChart);
function drawChart() {
  var data = google.visualization.arrayToDataTable([
    ['Progress', 'Hours per Day'],
    ['Done',     11],
    ['Progress',      2],
  ]);

  var options = {
    title: 'Progress/Done',
    is3D: true,
  };

  var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
  chart.draw(data, options);
}
