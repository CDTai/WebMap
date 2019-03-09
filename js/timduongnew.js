
map = L.map('mapid');
makerDiemdi=null;
markerDiemDen=null;
countMarker=1;//default;
/** event * */
// A $( document ).ready() block.
$( document ).ready(function() {
	$('#searchBus').click(function(){
		searchBus();
	});
	$(window).click(function(e){
		id=e.target.id;
		if(id!="frompoint" && id!="topoint"){
			$('#frompoint-result').html("");
			$('#topoint-result').html("");
		};
	});
});


function onMapClick(e) {
	if(	countMarker>2) return 0;
		countMarker++;
		   $('#'+id).val(info);
	   		if(id=='frompoint') {
	        	 action="<input type='button' value='Delete this marker' class='marker-delete-button'/>"+
	            				"<button class='diemden'>set diem den</button>";
	        }
	        if(id=='topoint') {
	        	 action="<input type='button' value='Delete this marker' class='marker-delete-button'/>"+
	            				"<button class='diemdi'>set diem di</button>";
	        }
	 marker = L.marker(e.latlng, {
                alt: "Resource Location",
                riseOnHover: true,
                draggable: true,
	            }).bindPopup(action);
marker.on("popupopen", onPopupOpen);
	 marker.addTo(map);

	 console.log(e.point);
}

function setInfo(lat,lng,id){
	$.post('https://nominatim.openstreetmap.org/reverse?format=xml&lat='+lat+'&lon='+lng+'&zoom=18&addressdetails=1',function(data) {

	   info=(data.getElementsByTagName("result"))[0].innerHTML;
	   $('#'+id).val(info);
	   		if(id=='frompoint') {
	        	 action="<input type='button' value='Delete this marker' class='marker-delete-button'/>"+
	            				"<button class='diemden'>set diem den</button>";
	        }
	        if(id=='topoint') {
	        	 action="<input type='button' value='Delete this marker' class='marker-delete-button'/>"+
	            				"<button class='diemdi'>set diem di</button>";
	        }
	   	  
	   	   marker = L.marker([lat,lng], {
                alt: info,
                title:info,
                trangthai:id,
                riseOnHover: true,
                draggable: true,
	            }).bindPopup(action);   	
	        marker.on("popupopen", onPopupOpen); 
	        marker.addTo(map);
	        marker.on("popupopen", onPopupOpen);
	        if(id=='frompoint') {
	        	makerDiemdi=marker;
	        }
	        if(id=='topoint') {
	        	makerDiemDen=marker;
	        }
	});
}
/*
*khởi tạo bảng đồ
*/
var diemXP={
	name:null,
	id:null,
	lat:null,
	lon:null
},
	diemDen={
		name:null,
		id:null,
		lat:null,
		lon:null
	};

function initMap(){
	map.setView([10.775375, 106.705737], 14);
	L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
				maxZoom: 18,
				attributionControl: false,
				prefix: '',
			}).addTo(map);
	map.on('click', onMapClick);
	map.locate({setView:true,maxZoom:16});
	map.on('locationfound', function (e) {
	setInfo(e.latlng.lat,e.latlng.lng,'frompoint');
	});
}

function onPopupOpen() {
    var tempMarker = this;

    $(".marker-delete-button:visible").click(function () {
        map.removeLayer(tempMarker);
    });
    $(".diemden:visible").click(function () {
    	 map.removeLayer(tempMarker);
        setInfo(tempMarker._latlng.lat,tempMarker._latlng.lng,'topoint');
    });
    $(".diemdi:visible").click(function () {
    	 map.removeLayer(tempMarker);
        setInfo(tempMarker._latlng.lat,tempMarker._latlng.lng,'frompoint');
    });

}

/*
param element
lấy dữ liệu tên trạm bus
output: none
*/
function getDataFromTo(e){
	value=e.value;
	var dataString ='&data='+value;
		$.ajax
		({
		type: "POST",
		url: "php/content/function_ajax/getSearch.php",
		data: dataString,
		success: function(resultData) { 
		if(resultData=='') return;
			tram=resultData.split(';');
			setFormSearch(tram,e);
		//$('#thongbao').html('thành công.').parent().fadeIn().delay(1000).fadeOut('slow');
	  	 },
	  	 error: function(data){
				alert('error!'+data);
				}
		});
	
};

/*
param danh sach ten tram bus, element của thẻ input
tạo danh sách sổ xuống các tên trạm bus
output: none
*/
function setFormSearch(dataTram,e){
	id=e.id;
	idResult=id+"-result";
	for(i=0; i< dataTram.length;i++){
		if(!dataTram[i]) continue;
		tramT = jQuery.parseJSON(dataTram[i]);
		document.getElementById(idResult).innerHTML +='<p id="'+id+'" title="'+tramT.ten_tram+
		'" onmouseover="setValueInput(id,title);" onclick=document.getElementById("'+idResult+'").innerHTML="">'
		+tramT.ten_tram +'</p>';
	}
}

/*
* param: id thẻ input
* lấy giá trị khi hover hoặc click vào element gán vào thẻ iput
  output: none
*/
function setValueInput(id,e){
	$('#'+id).val(e);
}



function searchBus(){
	diemXP['name']=$('#frompoint').val();
	diemDen['name']=$('#topoint').val();
	if(diemXP['name']==diemDen['name']){
		thongbao('điểm đi phải khác điểm đến.');
		return ;
	}
	if(diemXP['name']===""){
		$('#frompoint').focus();
		return ;
	}
	if(diemDen['name']===""){
		$('#topoint').focus();
		return ;
	}
	getToaDo("getToaDoAll");
}

function getToaDo(action){
	data = {
		action: action,
		data: null
	};
	$.ajax({
			url:"php/content/function_ajax/timduong.php",
			data: data,
			type:'POST',
			success: function(data){
				if(data[0]=='-') {
					thongbao('loi') ;
					return;
				}
				 xuly(data);
			}
		});
}
function getXuatPhat_KT(dstrambus){
	for(i=0;i<dstrambus.length;i++){
		if((dstrambus[i])['ten_tram']==diemXP['name']){
				diemXP['id']=(dstrambus[i])['ma_tram'];
				diemXP['lat']=(dstrambus[i])['lat'];
				diemXP['lon']=(dstrambus[i])['lon'];

		} 
		else if((dstrambus[i])['ten_tram']==diemDen['name']){
				diemDen['id']=(dstrambus[i])['ma_tram'];
				diemDen['lat']=(dstrambus[i])['lat'];
				diemDen['lon']=(dstrambus[i])['lon'];
		
		}
	}
}
function xuly(data){
	dstrambus=tachdulieu(data);
	getXuatPhat_KT(dstrambus);
	for(i=0;i<dstrambus.length;i++){
		(dstrambus[i])['khoangcach']=tinhkhoangcach(dstrambus[i],diemXP);
		}
	dstrambus=sapxep(dstrambus);
	chuyentuyen1lan(dstrambus);
}

function khongchuyentuyen(){


}

function tachdulieu(data){
	dstrambus_raw=data.split(';');
	
	var dstrambus=[];
	for(i=0;i<dstrambus_raw.length;i++){
		if(!dstrambus_raw[i]) continue;
		tmp=JSON.parse(dstrambus_raw[i]);
		dstrambus.push(tmp);
	}
	return dstrambus;
}

function tinhkhoangcach(a,b){
lat_a=a['lat'];
lon_a=a['lon'];
lat_b=b['lat'];
lon_b=b['lon'];
R = 6373.0 ;
 dLat = (lat_b - lat_a) * (Math.PI / 180);
 dLon = (lon_b - lon_a) * (Math.PI / 180);
 la1ToRad = lat_a * (Math.PI / 180);
 la2ToRad = lat_b * (Math.PI / 180);
 a = Math.sin(dLat / 2) * Math.sin(dLat / 2) + Math.cos(la1ToRad)
* Math.cos(la2ToRad) * Math.sin(dLon / 2) * Math.sin(dLon / 2);
 c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
 d = R * c;
return parseFloat(d*1000).toFixed(4);
}

function sapxep(data){
	data.sort(
		function(a , b){
			if ( parseFloat(a['khoangcach']) >  parseFloat(b['khoangcach'])) return 1;
			if ( parseFloat(a['khoangcach']) <  parseFloat(b['khoangcach'])) return -1;
			return 0;
		       }
			);
	return data;
}

function thongbao(tb){
	$('#thongbao').html(tb).parent().fadeIn().delay(1000).fadeOut('slow');
}