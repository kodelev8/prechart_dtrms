		
		
	    <script type="text/javascript" src="<?= base_url('js/bootstrap.min.js'); ?>"></script>
	    <script type="text/javascript" src="<?= base_url('js/bootstrap.js'); ?>"></script>
	    <script type="text/javascript" src="<?= base_url('js/google-analytics.js'); ?>"></script>
	    <script type="text/javascript" src="<?= base_url('js/jquery.datetimepicker.js'); ?>"></script>
	
		<script type="text/javascript">
			function date() {
				var m = "AM";
				var gd = new Date();
				var secs = gd.getSeconds();
				var minutes = gd.getMinutes();
				var hours = gd.getHours();
				var day = gd.getDay();
				var month = gd.getMonth();
				var date = gd.getDate();
				var year = gd.getYear();
		
		
				if (secs < 10) {
					secs = "0" + secs;
				}
				if (minutes < 10) {
					minutes = "0" + minutes;
				}
				if (hours < 10) {
					hours = "0" + hours;
				}
		
				//var dayarray = new Array ("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");
				var montharray = new Array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
		
				var fulldate = hours + ":" + minutes + ":" + secs;
		
				$("#date").html(fulldate);
				setTimeout("date()", 1000);
			}
			date();
		</script>

		<div class="container">
			<div class="span">
				<p align="center"> 
					<strong style= "color: #000">&copy; 2011 Prechart Software Inc.</strong>
				</p>
			</div>
		</div>
	</body>
</html>