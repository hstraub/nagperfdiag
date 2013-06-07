<?php
#
# Fue�r check_pcmessure.pl von Wolfgang Bart
# Erstellt von Joerg Peter Geissler <lairdofglencairn AT nagios-wiki.de>  
# $Id: check_messpc_temp.php 79 2006-09-14 18:21:09Z linge $
#
if ($WARN[1] == "") {
	$WARN[1] = 0;
}
if ($CRIT[1] == "") {
	$CRIT[1] = 0;
}

$opt[1] = "--vertical-label \"Temperatur\"  --title \"Temperatur for  $hostname / $servicedesc\" ";

$def[1] = "DEF:var1=$rrdfile:$DS[1]:AVERAGE ";
$def[1] .= "AREA:var1#00FF00:\"Temperatur \" ";
$def[1] .= "LINE1:var1#000000:\"\" ";
$def[1] .= "GPRINT:var1:LAST:\"%3.4lg %s$UNIT[1] LAST \" ";
$def[1] .= "GPRINT:var1:MAX:\"%3.4lg %s$UNIT[1] MAX \" ";
$def[1] .= "GPRINT:var1:AVERAGE:\"%3.4lg %s$UNIT[1] AVERAGE \\n\" ";
$def[1] .= "HRULE:$WARN[1]#FFFF00:\"Warning on $WARN[1]C\" ";
$def[1] .= "HRULE:$CRIT[1]#FF0000:\"Critical on $CRIT[1]C\" ";
?>
