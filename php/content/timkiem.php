<style type="text/css">
	time#icon
{
  font-size: 1em; /* change icon size */
  display: block;
  position: relative;
  width: 100%;
  height: 130px;
  background-color: #fff;
  border-radius: 0.6em;
  box-shadow: 0 1px 0 #bdbdbd, 0 2px 0 #fff, 0 3px 0 #bdbdbd, 0 4px 0 #fff, 0 5px 0 #bdbdbd, 0 0 0 1px #bdbdbd;
  overflow: hidden;
  -webkit-backface-visibility: hidden;
  -webkit-transform: rotate(0deg) skewY(0deg);
  -webkit-transform-origin: 50% 10%;
  transform-origin: 50% 10%;
}
 
time#icon *
{
  display: block;
  width: 100%;
  font-size: 1em;
  font-weight: bold;
  font-style: normal;
  text-align: center;
  padding: 4%;
}
 
time#icon strong
{
  position: absolute;
  top: 0;
  color: #fff;
  background-color: #fd9f1b;
  border-bottom: 1px dashed #f37302;
  box-shadow: 0 2px 0 #fd9f1b;
}
 
time#icon em
{
  position: absolute;
  bottom: 0em;
  color: #fd9f1b;
}
 
time#icon span
{
  width: 100%;
  font-size: 2.5em;
  letter-spacing: -0.05em;
  padding-top: 1em;
  color: #2f2f2f;
}
 
time#icon:hover, time#icon:focus
{
  -webkit-animation: swing 0.6s ease-out;
  animation: swing 0.6s ease-out;
}
 
@-webkit-keyframes swing {
  0%   { -webkit-transform: rotate(0deg)  skewY(0deg); }
  20%  { -webkit-transform: rotate(12deg) skewY(4deg); }
  60%  { -webkit-transform: rotate(-9deg) skewY(-3deg); }
  80%  { -webkit-transform: rotate(6deg)  skewY(-2deg); }
  100% { -webkit-transform: rotate(0deg)  skewY(0deg); }
}
 
@keyframes swing {
  0%   { transform: rotate(0deg)  skewY(0deg); }
  20%  { transform: rotate(12deg) skewY(4deg); }
  60%  { transform: rotate(-9deg) skewY(-3deg); }
  80%  { transform: rotate(6deg)  skewY(-2deg); }
  100% { transform: rotate(0deg)  skewY(0deg); }
}
</style>


<div class='frame'>
	<div class='title'><h5>Thông Tin Tuyến</h5></div>
	<form name='timkiem'>
		<div class='input'>
			<input type="text" class="form-control" placeholder="<Nhập mã hoặc tên tuyến>" aria-label="Username" aria-describedby="addon-wrapping">
		</div>
		<center>
			<button type="button" class="btn btn-primary"><i class="fas fa-search"></i> Xem</button>
		</center>
	</form>
</div>

<div class='frame'>
	<div class='title'><h5>Đường Đi Bằng Xe Bus</h5></div>
	<form name='timkiem'>
		<div class='input'>
			<input type="text" class="form-control" placeholder="<Nhập mã hoặc tên tuyến>" aria-label="Username" aria-describedby="addon-wrapping">
		</div>
		<center>
			<button type="button" class="btn btn-primary"><i class="fas fa-search"></i> Tìm</button>
		</center>
	</form>
</div>

<div class='frame'>
	<div class='title'><h5>Tìm Đường</h5></div>
	<form name='timkiem'>
		<div class='input'>
			<input type="text" class="form-control" placeholder="<Nhập mã hoặc tên tuyến>" aria-label="Username" aria-describedby="addon-wrapping">
		</div>
		<center>
			<button type="button" class="btn btn-primary"><i class="fas fa-search"></i> Tìm</button>
		</center>
	</form>
</div>

<div class='frame'>
	<div class="row">
		<div class="col-5">
			<time datetime="2014-09-20" id="icon">
			  <strong id="thang"></strong>
			  <span id="ngay"></span>
			  <em id="thu"></em>
			</time>
		</div>
		<div class="col-7">
			<time datetime="2014-09-20" id="icon">
			  <strong>Time</strong>
			  <span id="time"></span>
			</time>
		</div>
	</div>
</div>
<script type="text/javascript">
	var d = new Date();
	var ngay = ["Sunday", "Monday", "Tuesday", "Wednesday" ,"Thursday" ,"Friday" ,"Saturday"];
	var thang = ["January", "February", "March", "April", "	May", "June", "July", "August", "September", "October", "November", "December"];
	document.getElementById("thang").innerHTML = thang[d.getMonth()];
	document.getElementById("ngay").innerHTML = d.getDate();
	document.getElementById("thu").innerHTML = ngay[d.getDay()];
</script>