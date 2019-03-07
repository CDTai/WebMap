
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<style type="text/css">
#username{
    margin-bottom:0.5%;
}
.dangky{
    width: 90%;
    height: 50px;
    margin-left: 5%;
    border-radius: 4px;
    border: 1px solid #ccc;
    padding-left: 4%;
    margin-top:1%;
}
.container input[type=input]:hover,input[type=password]:hover{
    background-color: #FFF;
    color: #000;
    border: 1px solid blue;
}
.container input[type=input]:active,input[type=password]:active{
    background-color: #FFF;
    color: #000;
}
.container input[type=password]{
    margin-top:0.5%;
    margin-bottom:0.5%;
    height: 50px;
}
.container input[type=text]{
    width: 50%;
    height: 50px;
}
button{
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 26px;
    border: none;
    cursor: pointer;
    width: 90%;
	font-size:22px;
}
button:hover {
    opacity: 0.8;
}

/* Center the image and position the close button */
.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
    position: relative;
}
.avatar {
    width: 100px;
	height:100px;
    border-radius: 50%;
}

/* The Modal (background) */
.modal {
	display:none;
    position: fixed;
    z-index: 999999999;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0,0,0,0.8);
}

/* Modal Content Box */
.modal-content {
    background-color: #fefefe;
    margin: 4% auto 15% auto;
    border: 1px solid #888;
    width: 40%; 
	padding-bottom: 30px;
}

/* The Close Button (x) */
.close {
    position: absolute;
    right: 25px;
    top: 0;
    color: #000;
    font-size: 35px;
    font-weight: bold;
}
.close:hover,.close:focus {
    color: red;
    cursor: pointer;
}

/* Add Zoom Animation */
.animate {
    animation: zoom 1s
}
@keyframes zoom {
    from {transform: scale(0)} 
    to {transform: scale(1)}
}
</style>
<script>
var modal = document.getElementById('a');
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
function getCapcha(){
value=$('#captcha').val();
var dataString ='captcha='+value;
			$.ajax
			({
			type: "POST",
			url: "php/content/action_captcha.php",
			data: dataString,
			success: function(resultData) { 
                alert(resultData)

			//$('#thongbao').html('thành công.').parent().fadeIn().delay(1000).fadeOut('slow');
		  	 },
		  	 error: function(resultData){
    				alert('error!'+resultData);
  				}
			});
        }
</script>
<button class='btn btn-primary' onclick="document.getElementById('a').style.display='block'">
Đăng Ký</button>
<div id="a" class="modal"> 
  <form class="modal-content animate" action="#" method="POST">    
    <div class="imgcontainer">
      <span onclick="document.getElementById('a').style.display='none'" class="close" title="Đóng hộp thoại">&times;</span>
      <img src="img/default.png" alt="Avatar" class="avatar">
      <h1 style="text-align:center">Đăng Ký</h1>
    </div>
    <div class="container">
      <input type="input" id="username" class="dangky" placeholder="Nhập tên tài khoản" name="username">
      <input type="password" class="form-control" placeholder="Nhập mật khẩu" name="pass">  
      <input type="password" class="form-control" placeholder="Nhập lại mật khẩu" name="repass">
      <input type="input" class="dangky" placeholder="Nhập email" name="email"> 
      <input type="input" class="dangky" placeholder="Nhập số điện thoại" name="sdt"> 
      <input type="text" name="captcha" id="captcha" maxlength="6" size="6"><img src="http://127.0.0.1/webMap/php/content/captcha_code.php" title="" alt="" />
      <button type="button" class="btn btn-primary" onclick="getCapcha();" style="width: 40%; height: 50px; margin-left: 30%; margin-top: 1%;">Đăng Nhập</button>
    </div>  
  </form>
</div>