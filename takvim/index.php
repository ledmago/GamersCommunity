<!DOCTYPE html>
<html>
<head>
<title>ZeoNNN Yayın Akışı</title>
<meta charset='utf-8' />
<link href='assest/fullcalendar.css' rel='stylesheet' />
<link href='assest/fullcalendar.print.css' rel='stylesheet' media='print' />
<script src='assest/lib/moment.min.js'></script>
<script src='assest/lib/jquery.min.js'></script>
<script src='assest/fullcalendar.min.js'></script>
<script src='assest/lang/tr.js'></script>


<script>

	$(document).ready(function() {
		
		$('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay'
			},
			
			defaultDate: '<?php echo date("Y-m-d"); ?>',
			selectable: true,
			selectHelper: true,
			select: function(start, end) {
				
				var eventData;
				if (title) {
					eventData = {
						title: title,
						start: start,
						end: end
					};
					$('#calendar').fullCalendar('renderEvent', eventData, true); // stick? = true
				}
				$('#calendar').fullCalendar('unselect');
			},
			editable: false,
			eventLimit: true, // allow "more" link when too many events
			events: [
			
			
			<?php 
include("../ayar.php");
mysql_query("SET NAMES UTF8");
		$sorguson=mysql_query("SELECT * FROM takvim"); 
		mysql_query("SET NAMES UTF8");
		while($gonderison = mysql_fetch_array($sorguson))   
			{
				$tarih = $gonderison["tarih"];
				$baslik = $gonderison["baslik"];
				$tarihbitis = $gonderison["tarihbitis"];
				
				echo "
				{
					title: '$baslik',
					start: '$tarih',
					end: '$tarihbitis',
				},
				
				";
			}

?>
			

			]
		});
		
	});

</script>
<style>

	body {
		margin: 40px 10px;
		padding: 0;
		font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
		font-size: 14px;
	}

	#calendar {
		max-width: 900px;
		margin: 0 auto;
	}

</style>
</head>
<body>

	<div id='calendar'></div>

</body>
</html>
