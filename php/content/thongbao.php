
<style type="text/css">
.tabletuyenbus th{
	height: 50px;
}
</style>
<?php
#----------------------Hàm rút ngắn nội dung---------------
	function rutgonnoidung($string,$batdau,$sotu){
		$len=strlen($string);
		while($sotu<$len){
			if($string[$sotu]==' ') break;
			$sotu++;
		}
		$string=substr($string,$batdau,$sotu);
		if($len>strlen($string)) $string.='...';
		return $string;
	}
?>

<?php
#-----------------------Hiển thị danh sách thông báo-------------
include("connect.php");
	$sql="SELECT * FROM thongbao";
	$retval=mysqli_query($conn, $sql);
	if(mysqli_num_rows($retval) > 0){	
		while($row = mysqli_fetch_assoc($retval)){
            echo  "<div class='container'>
        				<div class='post row'>
        					<div class='picture col-4'>
        					<img src='img/".$row['hinhanh']."'/>
        					</div>
        					<div class='notify col-8'>
	        					<h2><a href='#'>".$row['chude']."</a></h2>
	        					<p>".rutgonnoidung($row['noidung'],0,300)."</p>
        					</div>
        				</div>
        			</div>";
		}	
}else echo "Không có thông báo!";	
mysqli_close($conn);
?>

