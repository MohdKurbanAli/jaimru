'use strict';
var Index = function() {
	var chart1Handler = function() {
		var data = {
			labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
			datasets: [{
				label: 'My First dataset',
				fillColor: 'rgba(220,220,220,0.2)',
				strokeColor: 'rgba(220,220,220,1)',
				pointColor: 'rgba(220,220,220,1)',
				pointStrokeColor: '#fff',
				pointHighlightFill: '#fff',
				pointHighlightStroke: 'rgba(220,220,220,1)',
				data: [65, 59, 80, 81, 56, 55, 40, 84, 64, 120, 132, 87]
			}, {
				label: 'My Second dataset',
				fillColor: 'rgba(151,187,205,0.2)',
				strokeColor: 'rgba(151,187,205,1)',
				pointColor: 'rgba(151,187,205,1)',
				pointStrokeColor: '#fff',
				pointHighlightFill: '#fff',
				pointHighlightStroke: 'rgba(151,187,205,1)',
				data: [28, 48, 40, 19, 86, 27, 90, 102, 123, 145, 60, 161]
			}]
		};

		var options = {

			maintainAspectRatio: false,

			// Sets the chart to be responsive
			responsive: true,

			///Boolean - Whether grid lines are shown across the chart
			scaleShowGridLines: true,

			//String - Colour of the grid lines
			scaleGridLineColor: 'rgba(0,0,0,.05)',

			//Number - Width of the grid lines
			scaleGridLineWidth: 1,

			//Boolean - Whether the line is curved between points
			bezierCurve: false,

			//Number - Tension of the bezier curve between points
			bezierCurveTension: 0.4,

			//Boolean - Whether to show a dot for each point
			pointDot: true,

			//Number - Radius of each point dot in pixels
			pointDotRadius: 4,

			//Number - Pixel width of point dot stroke
			pointDotStrokeWidth: 1,

			//Number - amount extra to add to the radius to cater for hit detection outside the drawn point
			pointHitDetectionRadius: 20,

			//Boolean - Whether to show a stroke for datasets
			datasetStroke: true,

			//Number - Pixel width of dataset stroke
			datasetStrokeWidth: 2,

			//Boolean - Whether to fill the dataset with a colour
			datasetFill: true,

			// Function - on animation progress
			onAnimationProgress: function() {
			},

			// Function - on animation complete
			onAnimationComplete: function() {
			},

			//String - A legend template
			legendTemplate: '<ul class="tc-chart-js-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].strokeColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>'
		};
		// Get context with jQuery - using jQuery's .get() method.
		var ctx = $("#chart1").get(0).getContext("2d");
		// This will get the first returned node in the jQuery collection.
		var chart1 = new Chart(ctx).Line(data, options);
		//generate the legend
		var legend = chart1.generateLegend();
		//and append it to your page somewhere
		$('#chart1Legend').append(legend);
	};
	return {
		init: function() {
			chart1Handler();
		}
	};
}();
