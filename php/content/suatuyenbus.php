<?php
#---------------------------------Sửa tuyến bus--------------------------------------
require("connect.php");
echo "<div class='tieude'>SỬA TUYẾN BUS {$_GET['id']}</div>";
	echo "<form name='sua' method='post' action='#'>";
					echo "<table border='1' class='tabletuyenbus'>";
							echo "<tr>";
							echo "<th width='5%'>Mã tuyến</th>"; 
							echo "<th>Tên tuyến</th>"; 
							echo "<th>ĐV đảm nhận</th>"; 
							echo "<th width='5%'>Độ dài tuyến</th>"; 
							echo "<th width='8%'>Loại xe</th>"; 
							echo "<th width='10%'>Giá vé</th>";
							echo "<th width='6%'>Tỉnh thành</th>"; 
							echo "<th width='5%'>Số chuyến</th>"; 
							echo "<th width='13%'>Từ</th>"; 
							echo "<th width='13%'>Đến</th>"; 
							echo "<th width='8%'>Giản cách chuyến</th>";
							echo "</tr>";
						$sql = "select * FROM tuyen_xebus WHERE ma_sotuyen='".$_GET['id']."'";
							$retval = mysqli_query($conn,$sql)
								or die(mysqli_error());
						if(mysqli_num_rows($retval) > 0){					
								while($row = mysqli_fetch_assoc($retval)){
								    echo "<td> <input name='ma_sotuyen' type='text' value='{$row['ma_sotuyen']}'></td>";
									echo "<td> <input name='ten_tuyen' type='text' value='{$row['ten_tuyen']}'></td>"; 
									echo "<td> <input name='donvi_damnhan' type='text' value='{$row['donvi_damnhan']}'></td>";
									echo "<td> <input name='dodai_tuyen' type='text' value='{$row['dodai_tuyen']}'></td>"; 
									echo "<td> <input name='loai_xe' type='text' value='{$row['loai_xe']}'></td>";
									echo "<td> <input name='gia_ve' type='text' value='{$row['gia_ve']}'></td>";
									echo "<td> <input name='ma_tinhthanh' type='text' value='{$row['ma_tinhthanh']}'></td>";
									echo "<td> <input name='so_chuyen' type='text' value='{$row['so_chuyen']}'></td>";
									echo "<td> <input name='tu' type='time' value='{$row['tu']}'></td>";
									echo "<td> <input name='den' type='time' value='{$row['den']}'></td>";		
									echo "<td> <input name='giancach_chuyen' type='number' value='{$row['giancach_chuyen']}'></td>";					
								}
						}
						 echo "</tr> ";							
					echo "</table>";
						echo "<center>";
						echo "<div class='nutchon'>";
							echo "<input class='btn btn-primary' type='submit' name='capnhat' value='Cập nhật'>";
						echo "</center>";
						echo "</div>";
					echo "</form>";
#----------Cập nhật tuyến bus-----------------
	if(isset($_POST['capnhat'])){
	require("connect.php");
		$sql = "UPDATE tuyen_xebus SET ten_tuyen='{$_POST['ten_tuyen']}',
				donvi_damnhan='{$_POST['donvi_damnhan']}',
				dodai_tuyen='{$_POST['dodai_tuyen']}',
				loai_xe='{$_POST['loai_xe']}',
				gia_ve='{$_POST['gia_ve']}',
				ma_tinhthanh='{$_POST['ma_tinhthanh']}',
				so_chuyen='{$_POST['so_chuyen']}',
				tu='{$_POST["tu"]}',
				den='{$_POST["den"]}',
				giancach_chuyen='{$_POST['giancach_chuyen']}'
		WHERE ma_sotuyen='{$_POST['ma_sotuyen']}'";
	   mysqli_query($conn, $sql) or die("<script> alert('Cập nhật không thành công!')</script>");
	   echo "<script> alert('Cập nhật thành công!')</script>";
	}
?>