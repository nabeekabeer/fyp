$(document).ready(function(){
	$.ajax({
		url: "http://[::1]/my_fyp/index.php/myController/reports/data.php",
		method: "GET",
		success: function(data) {
			console.log(data);
			var Consumer = [];
			var Reading = [];

			for(var i in data) {
				Consumer.push(" " + data[i].con_consumer_new_no);
				Reading.push(data[i].new_reading);
			}

			var chartdata = {
				labels: Consumer,
				datasets : [
					{
						label: 'Consumed Unit',
						backgroundColor: 'rgba(130, 130, 130, 0.75)',
						borderColor: 'rgba(130, 130, 192, 0.75)',
						hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
						hoverBorderColor: 'rgba(200, 200, 200, 1)',
						data: Reading
					}
				]
			};

			var ctx = $("#mycanvas");

			var barGraph = new Chart(ctx, {
				type: 'bar',
				data: chartdata
			});
		},
		error: function(data) {
			console.log(data);
		}
	});
});
