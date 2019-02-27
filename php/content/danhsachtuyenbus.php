<style type="text/css">
	#phantrang{
		position: relative;
		width:100%;
		height: 10%;
		background-color:#00CC66;
		float:left;
		padding: 1%;
		}	
	#phantrang a{
		margin:2px;
		text-decoration:none;
		color:#FFF;
		display: block;
		float: left;
		text-align: center;
		} 	
	#phantrang span{
		margin:2px;
		margin-top:2px;
		margin-bottom:2px;
		color:#009;
		float: left;
		} 
	#phantrang a:hover{
	color:#009;	
	}
	.tabletuyenbus td .fas{
		text-decoration: none;
	}
</style>
<script type="text/javascript">
	function suatuyenbus(){
		 id=$("[type=checkbox]:checked").val(); 
		 if(id==null) {alert("chưa chọn tuyến");return 0;}
		window.location="index.php?xem=suatuyenbus&id="+id;
	}
</script>
<?php
#---------------------------------Xóa tuyến bus--------------------------------------
if(isset($_POST['xoa'])){
	if(!empty($_POST['chon'])){
				$checkbox =$_POST['chon'];
				$len=count($checkbox);
				require("connect.php");
						for( $i=0;$i<$len;$i++){
							$sql = "DELETE FROM tuyen_xebus WHERE ma_sotuyen='".$checkbox[$i]."'";
							$retval = mysqli_query($conn,$sql)
								or die(mysqli_error());
								
				}
				echo "<script>alert('Đã xóa thành công!')</script>";      
	}else echo "<script> alert('Vui lòng chọn ít nhất một tuyến bus!')</script>";
}
?>

<div class="tieude">DANH SÁCH TUYẾN BUS</div>
<?php
include("connect.php");
	$sql="SELECT * FROM tuyen_xebus";
	$retval=mysqli_query($conn, $sql) or die('Không kết nối được');
	if(mysqli_num_rows($retval) > 0){
		$phantrang=6;
		$sotrang=ceil(mysqli_num_rows($retval)/$phantrang);
			if(isset($_GET['trang']))
			{
				$batdau=$_GET['trang']*$phantrang;
				$tranghienthai=$_GET['trang'];
				}
			else{
				$batdau=0;
				$ketthuc=$phantrang;
				$tranghienthai=0;
				}
	echo "<form name='quanly' method='post' action='#'>";
	echo "<table border='1' class='tabletuyenbus'>";
	echo "<tr>		<th width='5%'>Mã tuyến</th>".
					"<th>Tên tuyến</th>".
					"<th>ĐV đảm nhận</th>".
					"<th width='5%'>Độ dài tuyến</th>".
					"<th width='8%'>Loại xe</th>".
					"<th width='10%'>Giá vé</th>".
					"<th width='6%'>Tỉnh thành</th>".
					"<th width='5%'>Số chuyến</th>".
					"<th width='9%'>Từ</th>".
					"<th width='9%'>Đến</th>".
					"<th width='8%'>Giãn cách chuyến</th>".
					"<th width='auto'>Chi Tiết</th>
					<th>Chọn</th>		
         </tr>";	
        $sql="SELECT * FROM tuyen_xebus limit $batdau, $phantrang";
		$retval=mysqli_query($conn, $sql) or die('Không kết nối được');
		while($row = mysqli_fetch_assoc($retval)){
			$sql="SELECT count(*) as sotram FROM tram_xebus where ma_sotuyen='{$row["ma_sotuyen"]}'";
			$retval2=mysqli_query($conn, $sql);
			$sotram=mysqli_fetch_assoc($retval2);
				echo "<tr>";
				echo "<td>" . $row["ma_sotuyen"]. "</td>"; 
				echo "<td>" . $row["ten_tuyen"]. "</td>"; 
				echo "<td>" . $row["donvi_damnhan"]. "</td>"; 
				echo "<td>" . $row["dodai_tuyen"]. "</td>"; 
				echo "<td>" . $row["loai_xe"]. "</td>"; 
				echo "<td>" . $row["gia_ve"]. "</td>"; 
				echo "<td>" . $row["ma_tinhthanh"]. "</td>"; 
				echo "<td>" . $row["so_chuyen"]. "</td>"; 
				echo "<td>" . $row["tu"]. "</td>"; 
				echo "<td>" . $row["den"]. "</td>"; 
				echo "<td>" . $row["giancach_chuyen"]."</td>";
				if($sotram['sotram']>0)
				echo "<td><a class='fas fa-eye' href='index.php?xem=danhsachtrambus&id={$row['ma_sotuyen']}'></a></td>";
				else echo "<td><a class='fas fa-eye-slash' name='{$row['ma_sotuyen']}' onClick=thongbaorong(name);></a></td>";
				echo "<td style='width:40px;'><input type='checkbox' name='chon[]' value='".$row["ma_sotuyen"]."'></td>";
				echo "</tr>";
		}	
		echo "</table>";
		echo "<center>";
					echo "<div class='nutchon'>";
						echo "<input class='btn btn-primary' name='xoa' type='submit' value='Xóa Tuyến Bus'>";
						echo "<input class='btn btn-primary' name='sua' type='button' onclick='suatuyenbus();' value='Sửa Tuyến Bus'>";
					echo "</div>";
					echo "<div id='phantrang'>";
						for($i=0;$i<$sotrang;$i++){
							if($i!=$tranghienthai){
								echo "<a href='index.php?xem=danhsachtuyenbus&trang={$i}'>[ ".($i+1)." ]</a>";
								}
								 	else echo "<span>[ ".($i+1)." ]</span>";
							}
						echo "</div>";
		echo "</center>";
	echo "</form>";
}else echo "Không có tuyến bus!";	
mysqli_close($conn);
?>

<?php
if(isset($_POST['xemtram'])){	
?>
<?php
if(!empty($_POST['chon'])){
	require("connect.php");
	$checkbox =$_POST['chon'];
	$len=count($checkbox);
	if($len==1){
		echo "<div class='tieude'>DANH SÁCH TRẠM BUS THUỘC TUYẾN {$checkbox[0]}</div>";
		$sql="SELECT * FROM tram_xebus where ma_sotuyen='{$checkbox[0]}'";
		$retval=mysqli_query($conn, $sql);
		if(mysqli_num_rows($retval) > 0){	
		echo "<form name='quanly' method='post' action='#'>";
		echo "<table border='1' class='tabletuyenbus'>";
		echo "<tr>		<th width='10%' >Mã trạm</th>".
						"<th>Tên trạm</th>".
						"<th width='20%'>Vĩ độ(Latitude)</th>".
						"<th width='20%'>Kinh độ(Longitude)</th>".
						"<th width='10%'>STT Theo Tuyến</th>".
						"<th>Chọn</th>".
	         "</tr>";			
		while($row = mysqli_fetch_assoc($retval)){
				echo "<tr>";
				echo "<td style='text-align:center;'>" . $row["ma_tram"]. "</td>"; 
				echo "<td>" . $row["ten_tram"]. "</td>"; 
				echo "<td style='text-align:center;'>" . $row["lat"]. "</td>"; 
				echo "<td style='text-align:center;'>" . $row["lon"]. "</td>"; 
				echo "<td style='text-align:center;'>" . $row["stt_theotuyen"]. "</td>";
				echo "<td style='width:40px;'><input type='checkbox' name='chon[]' value='".$row["ma_tram"]."'></td>";
				echo "</tr>";
		}	
		echo "</table>";
		echo "<center>";
					echo "<div class='nutchon'>";
						echo "<a class='btn btn-primary' name='suatram'>Sửa trạm</a></td>";
					echo "</div>";
		echo "</center>";
		echo "</form>";
		}else echo "Không có trạm bus thuộc tuyến!";	
		mysqli_close($conn);
	}else  echo "<script> alert('Bạn chỉ chọn tối đa 1 tuyến!')</script>";
}else echo "<script> alert('Vui lòng chọn ít nhất 1 tuyến!')</script>";
}
?>
<script type="text/javascript">
	function thongbaorong(mst){
		alert('Không có trạm bus trong tuyến bus '+mst);
	}

</script>