<div id='content'>
<style type="text/css">
	#mapid{
		width: 1080px;
		height: 600px;
		z-index: 0;
	}
	.frompoint{
		padding-left:1%;
		padding-right: 1%;
		margin-bottom: 0%;
	}
	#result .frompoint:hover{
		background-color: #CCC;	
	}
</style>
<div style="position: relative;float: left;">
			<div id="mapid"></div>
</div>
<script type="text/javascript">
	var map = L.map('mapid').setView([10.775375, 106.705737], 14);
			L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
						maxZoom: 18,
						attributionControl: false,
						prefix: '',
					}).addTo(map);
</script>
<body>
	<div id="form">
            <form action="javascript:submitQuery()" name="search">
                <label> From</label>
                <input type="text" name="frompoint" autocomplete="off"  onkeyup="getDataFromTo(this.value);" />
                <div id='result' style="width:80%; margin-top: -8px; background-color:#F0F0F0; color: black;"></div>
                <label> To </label>
                <input type="text" name="topoint" autocomplete="off"  onkeyup="getDataFromTo(this.value);" />
                <div id='result' style="width:100%; margin-top: -8px; background-color:#F0F0F0; color: black;"></div>
                <input type="submit" value="Submit"></input>
            </form>
        </div>
</body>

<script type="text/javascript">
	
	function getDataFromTo($value){
		document.getElementById("result").innerHTML="";
		var dataString ='&data='+$value;
			$.ajax
			({
			type: "POST",
			url: "php/content/function_ajax/getSearch.php",
			data: dataString,
			success: function(resultData) { 
			if(resultData=='') return;
				
				$tram=resultData.split(';');
				setFormSearch($tram);
			//$('#thongbao').html('thành công.').parent().fadeIn().delay(1000).fadeOut('slow');
		  	 },
		  	 error: function(data){
    				alert('error!'+data);
  				}
			});
		
	};
	function setFormSearch($dataTram){
		for(i=0;i< $dataTram.length;i++){
			$tramT = jQuery.parseJSON($dataTram[i]);
			document.getElementById("result").innerHTML +='<p class="frompoint" id="'+$tramT.ten_tram+'" onmouseover="newTram(id);" onclick=document.getElementById("result").innerHTML="">'+$tramT.ten_tram +'</p>';
		}
	}
	function newTram($x){
		document.forms['search'].frompoint.value=$x;
	}
</script>