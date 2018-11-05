<?php

	class baza{
		var $handle;
		function __construct( $dbuser, $dbpass, $dbname, $dbhost ){
			$this->handle = mysql_connect( $dbhost, $dbuser, $dbpass ) or die('error! dane logowania do bazy!');
			$tmp = mysql_select_db( $dbname, $this->handle ) or die('error! błędne dane bazy!');
		}

		function getGracz( $id ){
			$rs = mysql_query("
				select
					*
				from 
					`gracze`
				where
					`id`=".$id."
				limit 1
			;");
			
			while( $row = mysql_fetch_assoc($rs) ){
				return $row;
			}	
		}

		function getListaGraczy(){
			$rs = mysql_query("
				select
					id, gracz
				from 
					`gracze`
			;");
			
			$arr = array();
			while( $row = mysql_fetch_array($rs) ){
				$arr[$row['id']] = $row['gracz'];
			}	
			return $arr;
		}

		function setNewGracz( $name ){
			$rs = mysql_query("
				INSERT INTO  
					`gracze` (
						`gracz` ,
						`cw1` ,
						`cw2` ,
						`cw3` ,
						`cw4` ,
						`cw5` ,
						`cw6` ,
						`cw7` ,
						`cw8` ,
						`cw9` ,
						`cw10`
					)
					VALUES (
						'".$name."',  0,  0,  0,  0,  0,  0,  0,  0,  0,  0
					);
			;");

			$rs = mysql_query("SELECT LAST_INSERT_ID();");
			while( $row = mysql_fetch_assoc($rs) ){
				return $row['LAST_INSERT_ID()'];
			}			
		}

		function dodajPunkty( $userid, $cwid, $pkt ){
			$rs = mysql_query("
				update
					`gracze`
				set
					`cw".$cwid."` = ".$pkt."
			;");
		}
	}

?>