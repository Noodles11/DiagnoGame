<!DOCTYPE html>
<html>
<head>
	<?php 
		include 'head.html'; 

		$katalog = 'cwiczenia';
		$folder = opendir($katalog);

		while($li = readdir($folder)){
			$lista[] = $li;
		}
		sort($lista);

		foreach( $lista as $li ){
			if( !is_dir($li) && substr($li, 0, 1)!='.' ){
				$nr = intval(substr($li, 0, 2 ));
				$listArr[$nr] = $li;
			}
		}

		$_SESSION['listaCw'] = $listArr;

	?>
</head>
<body>

<div id="container">
<?php
	if( isset($_GET['page']) ){
		switch( $_GET['page'] ){
			case 'new':
				include 'newgame.html';
				break;
			case 'load':
				include 'loadgame.html';
				break;
			case 'cwiczenia':
				include 'cwiczenia.html';
				break;
			case 'about':
				include 'about.html';
				break;
			case 'credits':
				include 'credits.html';
				break;
			case 'stats':
				include 'stats.html';
				break;
			case 'logout':
				session_destroy();
				header('Location: index.php');
				break;

			default:
				include 'error.html';
				break;
		}
		include 'nawigacja.html';
		
	} else if( isset($_GET['cw']) ){
		include 'graj.html';
		include 'nawigacja.html';

	} else {
		include 'mainmenu.html';
	}
?>
</div>

<div id="bg"></div>

<?php include 'foot.html'; ?>



<!--<script>
	$('a').each(function(i,el){
		el.addEventListener('mouseover',function( e ){
			System.playSound('sound_btn');
		}.bind(this),false);
	}.bind(this));
</script>-->



</body>
</html>