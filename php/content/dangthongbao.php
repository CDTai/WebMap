<style>
#thongbao{
width:80%;	
margin-left: 10%;
height:auto;
}
#thongbao textarea{
width:100%;	
height:250px;
}
#thongbao select{
width: 15%;
margin-bottom: 1%;
}
#thongbao input[type=file]{
width:42%;
margin-bottom: 0%;
}
#thongbao p{
	font-family: tahoma;
	font-size: 20px;
}
#thongbao input[type=button]{
width:20%;
}
</style>

<script>
//---------------------Kiểm tra form nhập liệu--------------------------
function kiemtra(){
	tieude=document.forms["baidang"].tieude.value;
	noidung=document.forms["baidang"].noidung.value;
	file=document.forms["baidang"].hinhanh.value;
	if(tieude==""){
		alert("Bạn chưa nhập tiêu đề bài đăng!");
		document.forms["baidang"].tieude.focus();
		}
	else if(noidung==""){
		alert("Bạn chưa nhập nội dung bài đăng!");
		document.forms["baidang"].noidung.focus();
		}
      else{
		if(file!=""){
		type=file.split(".");
			if(type[1]!=='JPG'&&type[1]!=='jpg'
			&&type[1]!=='PNG'&&type[1]!=='png'
			&&type[1]!=='gif'&&type[1]!=='GIF'
			&&type[1]!=='JPEG'&&type[1]!=='jpeg'){
			alert("vui lòng chọn file ảnh đúng định dạng JPG,PNG,GIF");
		file=document.forms["baidang"].hinhanh.focus();
		return 0;
			}
		}
	if(kiemtra)document.forms["baidang"].submit();
	  }
		
	}
</script>

<?php
#-------------------------Đăng thông báo----------------------
if(isset($_POST["noidung"])){
	require_once('connect.php');
	$sql1 = "SET @autoid:= 0;";
    mysqli_query($conn,$sql1) or die("<script> alert('Không thể thêm1!')</script>");
    $sql2= "UPDATE thongbao SET ma_thongbao=@autoid:=(@autoid+1);";
    mysqli_query($conn,$sql2) or die("<script> alert('Không thể thêm2!')</script>");
    $sql3= "ALTER table thongbao AUTO_INCREMENT=1;";
    mysqli_query($conn,$sql3) or die("<script> alert('Không thể thêm3!')</script>");
	#Kiểm tra file ảnh có đúng định dạng không
	if($_FILES["hinhanh"]["name"]!=""){
		$file_part=$_FILES["hinhanh"]["name"];
		move_uploaded_file($_FILES["hinhanh"]["tmp_name"],"upload/".$file_part);
	}
	else $file_part="default.png";
	#Thêm vào csdl 
	$ngay=date('d/m/Y') ;
	$sql="INSERT INTO thongbao (chude, noidung, hinhanh, ngaydang)
	VALUES ( '".$_POST['tieude']."' , '".$_POST['noidung']."' , '".$file_part."' , '".$ngay."' );";
	mysqli_query($conn,$sql) or die("Không thể thêm");
	echo "<script> alert('Đã Đăng Thông Báo Thành Công!!!')</script>";		
	}
?>
<div id="thongbao"> 
      <form name="baidang" method="post" action="#" enctype="multipart/form-data">
      <div class="tieude">ĐĂNG THÔNG BÁO</div>
	  <p>Tiêu Đề Bài Đăng:</p><select class="form-control" type="text" name="tieude">
					<option>An Ninh</option>
					<option>Chính Trị</option>
					<option>Xã Hội</option>
					<option>Tìm Người Và Vật Bị Thất Lạc</option>
					<option>Thái Độ Phục Vụ</option>
					<option>Các Thông Tin Khác...</option>
			</select>
      <p>Nội Dung Bài Đăng:</p><textarea name="noidung" class="form-control" placeholder="Bạn hãy nhập nội dung vào đây!"></textarea>
      <input type="file" class="btn btn-primary" name="hinhanh" value="chọn hình"/>
      <center>
      <input type="button" class="btn btn-primary" name="sub" value="Đăng thông báo" onClick="kiemtra();"/>
      <input type="button" class="btn btn-primary" value="D.Sach thông báo" onClick="location.href='index.php?xem=danhsachthongbao'">
      </center>   
   </form>
</div>
