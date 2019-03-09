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


<body>
<div style="position: absolute;display: none;z-index: 9999999999999;right: 0;width: 100%;">
	<div class='alert-success' id='thongbao' style="padding: 5px;width: 100%;text-align: center;"></div>
</div>
<div style="position: relative;float: left;">
	<div id="mapid"></div>
</div>
<div id="form">
        <form action="javascript:submitQuery()" name="search">
            <label> From</label>
            <input type="text" name="frompoint"  id='frompoint' autocomplete="off"  onkeyup="getDataFromTo(this);" />
            <div id='frompoint-result' style="width:80%; margin-top: -8px; background-color:#F0F0F0; color: black;"></div>
            <label> To </label>
            <input type="text" name="topoint" autocomplete="off" id='topoint'  onkeyup="getDataFromTo(this);" />
            <div id='topoint-result' style="width:100%; margin-top: -8px; background-color:#F0F0F0; color: black;"></div>
            <input type="button" value="Submit" id="searchBus"></input>
        </form>
    </div>
 <script src="js/timduongnew.js"></script>
 <script type="text/javascript">initMap();</script>
</body>
