<?php

/*
if(!isset($_GET["b"])){
echo "<script>
alert('Mohon klik tombol monitoring yang terdapat di list pasien , terima kasih'); window.location = './indexdokter.php';</script>";}
*/
//initilize the page
require_once("inc/init.php");

//require UI configuration (nav, ribbon, etc.)
require_once("inc/config.ui.php");
if(empty($_SESSION['level'])) {
		echo '<script type="text/javascript">window.location.href="index.php";</script>';
}else{
	if(!isset($_GET['deviceid']) ){
		if($_SESSION['level']=="dokter"){
			echo '<script type="text/javascript">alert(\'Mohon klik tombol monitoring yang terdapat di list pasien , terima kasih\'); window.location.href="datapasien.php";</script>';
		}else if($_SESSION['level']=="pasien"){
			echo "<script type=\"text/javascript\">window.location.href=\"monitoring.php?deviceid=\"'".$_SESSION['deviceid']."';</script>";
		}
		}
}

/*---------------- PHP Custom Scripts ---------

YOU CAN SET CONFIGURATION VARIABLES HERE BEFORE IT GOES TO NAV, RIBBON, ETC.
E.G. $page_title = "Custom Title" */

$page_title = "Monitoring";

/* ---------------- END PHP Custom Scripts ------------- */

//include header
//you can add your custom css in $page_css array.
//Note: all css files are inside css/ folder
$page_css[] = "your_style.css";
include("inc/header.php");

//include left panel (navigation)
//follow the tree in inc/config.ui.php
$page_nav["dashboard"]["sub"]["monitoring"]["active"] = true;
include("inc/nav.php");

?>
<!-- ==========================CONTENT STARTS HERE ========================== -->
<!-- MAIN PANEL -->
<div id="main" role="main">
	<?php
		//configure ribbon (breadcrumbs) array("name"=>"url"), leave url empty if no url
		//$breadcrumbs["New Crumb"] => "http://url.com"
		include("inc/ribbon.php");
	?>

	<!-- MAIN CONTENT -->
	<div id="content">

		<!-- widget grid -->
		<section id="widget-grid" class="">

			<!-- row -->

			<div class="row">

				<!-- NEW WIDGET START -->
				<article class="col-xs-12 col-sm-6 col-md-12 col-lg-6">

					<!-- Widget ID (each widget will need unique ID)-->
					<div class="jarviswidget" id="wid-id-0" data-widget-colorbutton="false" data-widget-deletebutton="false" data-widget-editbutton="false" data-widget-sortable="false">
						<!-- widget options:
						usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">

						data-widget-colorbutton="false"
						data-widget-editbutton="false"
						data-widget-togglebutton="false"
						data-widget-deletebutton="false"
						data-widget-fullscreenbutton="false"
						data-widget-custombutton="false"
						data-widget-collapsed="true"
						data-widget-sortable="false"

						-->
						<?php
						$result = mysqli_query($mysqli, "SELECT * FROM data_pasien WHERE device_id='".$_GET['deviceid']."'");
						$res = mysqli_fetch_array($result)
						 ?>
						<header>
							<span class="widget-icon"> <i class="fa fa-bar-chart-o"></i> </span>
							<h2>Live Monitoring <?php echo $res['nama_pasien']; ?></h2>

						</header>

						<!-- widget div-->
						<div>

							<!-- widget edit box -->
							<div class="jarviswidget-editbox">
								<!-- This area used as dropdown edit box -->

							</div>
							<!-- end widget edit box -->

							<!-- widget content -->
							<div class="widget-body">

								<div id="graph" style="width: 100%; height: 500px;"></div>

							</div>
							<!-- end widget content -->

						</div>
						<!-- end widget div -->

					</div>
					<!-- end widget -->

				</article>
				<!-- WIDGET END -->

				<!-- NEW WIDGET START -->
				<article class="col-xs-12 col-sm-6 col-md-6 col-lg-6">

					<!-- Widget ID (each widget will need unique ID)-->
					<div class="jarviswidget" id="wid-id-3" data-widget-colorbutton="false" data-widget-deletebutton="false" data-widget-editbutton="false" data-widget-sortable="false">
						<!-- widget options:
						usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">

						data-widget-colorbutton="false"
						data-widget-editbutton="false"
						data-widget-togglebutton="false"
						data-widget-deletebutton="false"
						data-widget-fullscreenbutton="false"
						data-widget-custombutton="false"
						data-widget-collapsed="true"
						data-widget-sortable="false"

						-->
						<header>
							<span class="widget-icon"> <i class="fa fa-bar-chart-o"></i> </span>
							<h2>Monitoring Report </h2>

						</header>

						<!-- widget div-->
						<div>

							<!-- widget edit box -->
							<div class="jarviswidget-editbox">
								<!-- This area used as dropdown edit box -->

							</div>
							<!-- end widget edit box -->

							<!-- widget content -->
							<div class="widget-body no-padding">

								<div class="well well-sm">
					<!-- Timeline Content -->
					<div class="smart-timeline">
						<ul id="mqttnotif" class="smart-timeline-list">

						</ul>
					</div>
					<!-- END Timeline Content -->

				</div>

							</div>
							<!-- end widget content -->

						</div>
						<!-- end widget div -->

					</div>
					<!-- end widget -->

				</article>
				<!-- WIDGET END -->

			</div>

			<!-- end row -->

			<!-- row -->



			<!-- end row -->

		</section>
		<!-- end widget grid -->

	</div>
	<!-- END MAIN CONTENT -->

</div>
<!-- END MAIN PANEL -->

<!-- ==========================CONTENT ENDS HERE ========================== -->

<!-- PAGE FOOTER -->
<?php
	include("inc/footer.php");
?>
<!-- END PAGE FOOTER -->

<?php
	//include required scripts
	include("inc/scripts.php");
?>

<!-- PAGE RELATED PLUGIN(S)
<script src="..."></script>-->
<!-- Flot Chart Plugin: Flot Engine, Flot Resizer, Flot Tooltip -->
<script src="<?php echo ASSETS_URL; ?>/js/plugin/flot/jquery.flot.cust.min.js"></script>
<script src="<?php echo ASSETS_URL; ?>/js/plugin/flot/jquery.flot.resize.min.js"></script>
<script src="<?php echo ASSETS_URL; ?>/js/plugin/flot/jquery.flot.time.min.js"></script>
<script src="<?php echo ASSETS_URL; ?>/js/plugin/flot/jquery.flot.tooltip.min.js"></script>

<!-- Vector Maps Plugin: Vectormap engine, Vectormap language -->
<script src="<?php echo ASSETS_URL; ?>/js/plugin/vectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo ASSETS_URL; ?>/js/plugin/vectormap/jquery-jvectormap-world-mill-en.js"></script>

<!-- Full Calendar -->
<script src="<?php echo ASSETS_URL; ?>/js/plugin/moment/moment.min.js"></script>
<script src="<?php echo ASSETS_URL; ?>/js/plugin/fullcalendar/jquery.fullcalendar.min.js"></script>
<script src="<?php echo ASSETS_URL; ?>/js/plotly-latest.min.js"></script>
<script src="<?php echo ASSETS_URL; ?>/js/mqttws31.js"></script>
<script type="text/javascript">
console.log("MQTT Test");
var client = new Messaging.Client("<?php echo $_GET['ipbroker'] ?>", <?php echo $_GET['portbroker'] ?>, "myclientid_" + parseInt(Math.random() * 100, 10));

client.onConnectionLost = onConnectionLost;
client.onMessageArrived = onMessageArrived;

//Connect Options
var options = {
	 timeout: 3,

	 //Gets Called if the connection has sucessfully been established
	 onSuccess: onConnect,
	 //Gets Called if the connection could not be established
	 onFailure: function (message) {
			 //alert("Connection failed: " + message.errorMessage);
	 }
};

client.connect(options);

function onConnect() {
// Once a connection has been made, make a subscription and send a message.
console.log("onConnect");
client.subscribe("<?php echo "rhythm/".$_GET['deviceid']?>"); //ini untuk konek ke mosquito
// message = new Messaging.Message("IPAT GANTENG");
  // message.destinationName = "<?php echo "rhythm/".$_GET['deviceid']?>";
//   client.send(message);
};

function onConnectionLost(responseObject) {
if (responseObject.errorCode !== 0)
	console.log("onConnectionLost:"+responseObject.errorMessage);
};
var testing;

var time = new Date();

var data = [{
	x: [time],
	y: [0],
	mode: 'lines',
	line: {color: '#cf606d'}
}]
//console.log(data)
Plotly.plot('graph', data);
var cnt = 0;
window.onresize = function() {
Plotly.Plots.resize(graph);
};
var i =0;
var ECG_data = [];
var isidata = [];
//ini array buat ECG datanya nanti datanya dateng dari sensor
//code dibawah itu fungsi ketika ada message datang dari sensor , dia tangkep
function onMessageArrived(message) {
// for (var i = 0; i < 200; i++) {
testing = message.payloadString;
testing = testing.split(":");

	// for (var i = 1; i < 200; i++) {
	// ECG_data.push(testing[i]);
	// }
	testing.shift();
	// ECG_data = testing;
	ECG_data = ECG_data.concat(testing);
	// ECG_data.shift();
 //realtime increment
	// console.log(ECG_data);
	// ECG_data.push(1);
// ECG_data.push(testing);


 //console.log(testing);
//  if (testing == 0.00) {
// 	 message = new Messaging.Message("IPAT GANTENG");
//  	  message.destinationName = "<?php //echo "rhythm/".$_GET['deviceid']?>";
//  	  client.send(message);
//  }else {
// 	 setInterval(function(){
// 						var time = new Date();
// //							console.log(ECG_data[i]);
// 						var update = {
// 							 x:  [[time]],
// 							 y: [[ECG_data[i]]]
// 						}
// 						var olderTime = time.setSeconds(time.getSeconds() - 7);
// 						var futureTime = time.setSeconds(time.getSeconds() + 7);
//
// 						var minuteView = {
// 									xaxis: {
// 										type: 'date',
// 										range: [olderTime,futureTime]
// 									}
// 								};
//
// 					Plotly.relayout('graph', minuteView);
// 					Plotly.extendTraces('graph', update, [0]);
// //i=i+3; // semi realtime
// 		}, 0);


 //for (i = 0; i < testing.length; i++)
//console.log(testing);
 // if(data.length < 1000){
 // 	//  data.push(testing);
 // }
 // else{
 //  data = []
 // }


// console.log(ECG_data);

// console.log(i);
//

  }//end fungsi messageonarrive
// 	// var i = 0;
// var graphDiv = document.getElementById('graph');
// graphDiv.on('plotly_click', function(){
//     location.reload();
// });
	   	setInterval(function(){
				console.log(i);
							var time = new Date();
							// console.log(ECG_data[i]);
							var update = {
								 x:  [[time]],
								 y: [[ECG_data[i]]]
							}
							var olderTime = time.setSeconds(time.getSeconds() - 7);
							var futureTime = time.setSeconds(time.getSeconds() + 7);

							var minuteView = {
										xaxis: {
											type: 'date',
											range: [olderTime,futureTime]
										}
									};
					  console.log(ECG_data);

						Plotly.relayout('graph', minuteView);
						Plotly.extendTraces('graph', update, [0]);

						i = i + 2;
//i=i+3; // semi realtime
      }, 0);


</script>
<script>
	$(document).ready(function() {

var client1 = new Messaging.Client("<?php echo $_GET['ipbroker'] ?>", <?php echo $_GET['portbroker'] ?>, "myclientid_" + parseInt(Math.random() * 100, 10));

 //Gets  called if the websocket/mqtt connection gets disconnected for any reason
 client1.onConnectionLost = function (responseObject1) {
     //Depending on your scenario you could implement a reconnect logic here
     alert("connection lost: " + responseObject1.errorMessage);
 };
 var count_notif = 0;
 //Gets called whenever you receive a message for your subscriptions
 client1.onMessageArrived = function (message1) {

	   //Do something with the push message you received
		 var str = "";

		 var currentTime = new Date()
		 var hours = currentTime.getHours()
		 var minutes = currentTime.getMinutes()
		 var seconds = currentTime.getSeconds()
	var miliseconds = currentTime.getMilliseconds();
		 str += hours + ":" + minutes + ":" + seconds + "." + miliseconds;
	//console.log(str);

	if(count_notif >= 5){
		$('#mqttnotif li').first().remove();

		if(message1.payloadString == "pvc"){
			$('#mqttnotif').append('<li><div class="smart-timeline-icon bg-color-red"><i class="fa fa-heart"></i></div><div class="smart-timeline-time"><small>'+str+'</small></div><div class="smart-timeline-content"><p><strong class="txt-color-red">Ventricular Arrhytmia Detected</strong></p><br></div></li>');
		}else {
			$('#mqttnotif').append('<li><div class="smart-timeline-icon bg-color-greenDark"><i class="fa fa-heart"></i></div><div class="smart-timeline-time"><small>'+str+'</small></div><div class="smart-timeline-content"><p><strong class="txt-color-greenDark">Normal Heartbeat</strong></p><br></div></li>');
		}
	}else{
		if(message1.payloadString == "pvc"){
			$('#mqttnotif').append('<li><div class="smart-timeline-icon bg-color-red"><i class="fa fa-heart"></i></div><div class="smart-timeline-time"><small>'+str+'</small></div><div class="smart-timeline-content"><p><strong class="txt-color-red">Ventricular Arrhytmia Detected</strong></p><br></div></li>');
		}else {
			$('#mqttnotif').append('<li><div class="smart-timeline-icon bg-color-greenDark"><i class="fa fa-heart"></i></div><div class="smart-timeline-time"><small>'+str+'</small></div><div class="smart-timeline-content"><p><strong class="txt-color-greenDark">Normal Heartbeat</strong></p><br></div></li>');
		}
	}

	count_notif += 1;
	//code di atas buat nampilin di bagian monitoring report biar setiap 5 kali report di hapus yang paling atas
	//console.log(count_notif);
};

 //Connect Options
 var options1 = {
     timeout: 3,
     //Gets Called if the connection has sucessfully been established
     onSuccess: onConnect1,
     //Gets Called if the connection could not be established
     onFailure: function (message1) {
        // alert("Connection failed: " + message1.errorMessage);
     }
 };

client1.connect(options1);

	 	function onConnect1() {
	 	 // Once a connection has been made, make a subscription and send a message.
	 	 console.log("onConnectnotif");
	 	 client1.subscribe("<?php echo "rhythm/".$_GET['deviceid']."/n"?>");
	 	/* message = new Messaging.Message("haaay");
	 	 message.destinationName = "/testmqtt";
	 	 client.send(message);*/
	 	};



	});

</script>
