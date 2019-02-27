<!DOCTYPE html>
<html>
<head>
	<title>Trang chủ</title>
	<link rel="stylesheet" type="text/css" href="csstrangchu.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">


</head>
<body>
	<div id="container" style="margin-left: 10%;margin-right: 10%;">
				<div class="row">
					<div class="col-sm-3" style="background-color: red;padding: 0;">
						<?php include('php/header.php'); ?>
					</div>
					<div class="col-sm-9" style="padding: 0;">
						<?php include('slide.php'); ?>
					</div>
				</div>
				
	</div>

	<?php

/**
 * nv_theme_alert()
 *
 * @param mixed $message
 * @param mixed $type
 * @return
 */
function nv_theme_alert( $message_title, $message_content, $type = 'info', $url_back = '', $lang_back = '', $time_back = 5 )
{
	global $global_config, $module_file, $module_info, $lang_module, $page_title;

	$lang_back = empty( $lang_back ) ? $lang_module['back'] : $lang_back;

	$xtpl = new XTemplate( 'alert.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_file );
	$xtpl->assign( 'LANG', $lang_module );
	$xtpl->assign( 'LANG_BACK', $lang_back );
	$xtpl->assign( 'CONTENT', $message_content );

	if( $type == 'success' )
	{
		$xtpl->parse( 'main.success' );
	}
	elseif( $type == 'warning' )
	{
		$xtpl->parse( 'main.warning' );
	}
	elseif( $type == 'danger' )
	{
		$xtpl->parse( 'main.danger' );
	}
	else
	{
		$xtpl->parse( 'main.info' );
	}

	if( !empty( $message_title ) )
	{
		$page_title = $message_title;
		$xtpl->assign( 'TITLE', $message_title );
		$xtpl->parse( 'main.title' );
	}
	else
	{
		$page_title = $module_info['custom_title'];
	}

	if( !empty( $url_back ) )
	{
		$xtpl->assign( 'TIME', $time_back );
		$xtpl->assign( 'URL', $url_back );
		$xtpl->parse( 'main.url_back' );
		$xtpl->parse( 'main.url_back_button' );
	}

	$xtpl->parse( 'main' );
	$contents = $xtpl->text( 'main' );

	include (NV_ROOTDIR . "/includes/header.php");
	echo nv_site_theme( $contents );
	include (NV_ROOTDIR . "/includes/footer.php");
	exit( );
}
?>
<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>