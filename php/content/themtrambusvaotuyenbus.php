<style type="text/css">
	.table{
		position: relative;
		float: left;
		margin-top: 2%;
	}
	.table input{
		width: 100%;
	}
</style>
<script type="text/javascript">
	function themtrambyMAP(){
		 id=$("[type=radio]:checked").val(); 
		 if(id==null) {alert(" chưa chọn tuyến");return 0;}
		window.location="index.php?xem=themtuyenbymap&id="+id+"#mapid";
	
	}
</script>
<script type="text/javascript">
	function themtramthucong(){
		 id=$("[type=radio]:checked").val(); 
		 if(id==null) {alert(" chưa chọn tuyến");return 0;}
		window.location="index.php?xem=themtrambusthucong&id="+id;
	}
</script>
<?php
#------------Danh sách các tuyến bus------------------------
echo "<div class='tieude'>DANH SÁCH CÁC TUYẾN BUS</div>";
include("connect.php");
	$sql="SELECT * FROM tuyen_xebus";
	$retval=mysqli_query($conn, $sql) or die('Không kết nối được');
	if(mysqli_num_rows($retval) > 0){
	echo "<form name='quanly' method='post' action='#'>";
	echo "<table class='table table-hover'>";
	echo "<tr>		<th width='10%' scope='col'>Mã tuyến</th>".
					"<th scope='col'>Tên tuyến</th>".
					"<th width='15%' scope='col'>Tỉnh thành</th>".
					"<th scope='col'>Chọn</th>		
         </tr>";	
		while($row = mysqli_fetch_assoc($retval)){
			$sql="SELECT count(*) as sotram FROM tram_xebus where ma_sotuyen='{$row["ma_sotuyen"]}'";
			$retval2=mysqli_query($conn, $sql);
			$sotram=mysqli_fetch_assoc($retval2);
				echo "<tr>";
				echo "<td>" . $row["ma_sotuyen"]. "</td>"; 
				echo "<td>" . $row["ten_tuyen"]. "</td>"; 
				echo "<td>" . $row["ma_tinhthanh"]. "</td>"; 
				echo "<td style='width:40px;'><input type='radio' name='chon' value='".$row["ma_sotuyen"]."'></td>";
				echo "</tr>";
		}	
		echo "</table>";
		echo "<center>";
					echo "<div class='nutchon'>";
						echo "<input class='btn btn-primary' id='themtrambusthucong' name='themtram' type='button' onclick='themtramthucong();' value='Thêm Trạm Bus Vào Tuyến Bus Thủ Công'></td>";
						echo "<input class='btn btn-primary' id='themtrambymap' name='themtrambymap' type='button' onclick='themtrambyMAP();' value='Thêm Trạm Bus Vào Tuyến Bus By Map'></td>";
		echo "</center>";
	echo "</form>";
}else echo "Không có tuyến bus!";	
mysqli_close($conn);
?>