/*================================================================================
	Item Name: Materialize - Material Design Admin Template
	Version: 5.0
	Author: PIXINVENT
	Author URL: https://themeforest.net/user/pixinvent/portfolio
================================================================================

NOTE:
------
PLACE HERE YOUR OWN JS CODES AND IF NEEDED.
WE WILL RELEASE FUTURE UPDATES SO IN ORDER TO NOT OVERWRITE YOUR CUSTOM SCRIPT IT'S BETTER LIKE THIS. */
// START CLOCK SCRIPT
function clock() {// We create a new Date object and assign it to a variable called "time".
	var time = new Date(),
	
	// Access the "getHours" method on the Date object with the dot accessor.
	hours = time.getHours(),
	
	// Access the "getMinutes" method with the dot accessor.
	minutes = time.getMinutes(),
	
	
	seconds = time.getSeconds();

	document.querySelectorAll('.clock')[0].innerHTML = harold(hours) + ":" + harold(minutes) + ":" + harold(seconds);

	function harold(standIn) {
		if (standIn < 10) {
			standIn = '0' + standIn
		}
		return standIn;
	}
}
setInterval(clock, 1000);
// END CLOCK SCRIPT
$(document).ready(function(){
	let today = new Date();
	var fullday = today.toLocaleString('fa-IR', { weekday: 'long' });
	var month = today.toLocaleString('fa-IR', { month: 'long' });
	var time = today.toLocaleString('fa-IR');
	var split_time = time.split("/");
	var split_day = split_time[2];
	var day = split_day.split("،");
	$('.date').html(fullday + " " + day[0] +  " " + month + " " + split_time[0]);
});