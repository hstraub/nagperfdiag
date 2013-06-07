<?php
#
# Copyright (c) 2007 by Herbert Straub <herbert@linuxhacker.at>
# See http://www.linuxhacker.at
#
if ($WARN[1] == "") {
	$WARN[1] = 0;
}
if ($CRIT[1] == "") {
	$CRIT[1] = 0;
}

$opt[1] = "--vertical-label \"Temperatur\"  --title \"Temperatur for  $hostname / $servicedesc\" ";

$def[1] = "DEF:var1=$rrdfile:$DS[1]:AVERAGE ";
#$def[1] .= "CDEF:x=var1,40,GT,20,10,IF ";
#$def[1] .= "CDEF:x=var1,UN,0,20,IF ";
$def[1] .= "CDEF:x02=var1,UN,0,var1,02,GT,02,var1,IF,IF ";
$def[1] .= "CDEF:x04=var1,UN,0,var1,04,GT,04,var1,IF,IF ";
$def[1] .= "CDEF:x06=var1,UN,0,var1,06,GT,06,var1,IF,IF ";
$def[1] .= "CDEF:x08=var1,UN,0,var1,08,GT,08,var1,IF,IF ";
$def[1] .= "CDEF:x10=var1,UN,0,var1,10,GT,10,var1,IF,IF ";
$def[1] .= "CDEF:x12=var1,UN,0,var1,12,GT,12,var1,IF,IF ";
$def[1] .= "CDEF:x14=var1,UN,0,var1,14,GT,14,var1,IF,IF ";
$def[1] .= "CDEF:x16=var1,UN,0,var1,16,GT,16,var1,IF,IF ";
$def[1] .= "CDEF:x18=var1,UN,0,var1,18,GT,18,var1,IF,IF ";
$def[1] .= "CDEF:x20=var1,UN,0,var1,20,GT,20,var1,IF,IF ";
$def[1] .= "CDEF:x22=var1,UN,0,var1,22,GT,22,var1,IF,IF ";
$def[1] .= "CDEF:x24=var1,UN,0,var1,24,GT,24,var1,IF,IF ";
$def[1] .= "CDEF:x26=var1,UN,0,var1,26,GT,26,var1,IF,IF ";
$def[1] .= "CDEF:x28=var1,UN,0,var1,28,GT,28,var1,IF,IF ";
$def[1] .= "CDEF:x30=var1,UN,0,var1,30,GT,30,var1,IF,IF ";
$def[1] .= "CDEF:x32=var1,UN,0,var1,32,GT,32,var1,IF,IF ";
$def[1] .= "CDEF:x34=var1,UN,0,var1,34,GT,34,var1,IF,IF ";
$def[1] .= "CDEF:x36=var1,UN,0,var1,36,GT,36,var1,IF,IF ";
$def[1] .= "CDEF:x38=var1,UN,0,var1,38,GT,38,var1,IF,IF ";
$def[1] .= "CDEF:x40=var1,UN,0,var1,40,GT,40,var1,IF,IF ";
$def[1] .= "CDEF:x42=var1,UN,0,var1,42,GT,42,var1,IF,IF ";
$def[1] .= "CDEF:x44=var1,UN,0,var1,44,GT,44,var1,IF,IF ";
$def[1] .= "CDEF:x46=var1,UN,0,var1,46,GT,46,var1,IF,IF ";
$def[1] .= "CDEF:x48=var1,UN,0,var1,48,GT,48,var1,IF,IF ";
$def[1] .= "CDEF:x50=var1,UN,0,var1,50,GT,50,var1,IF,IF ";
$def[1] .= "CDEF:x52=var1,UN,0,var1,52,GT,52,var1,IF,IF ";
$def[1] .= "CDEF:x54=var1,UN,0,var1,54,GT,54,var1,IF,IF ";
$def[1] .= "CDEF:x56=var1,UN,0,var1,56,GT,56,var1,IF,IF ";
$def[1] .= "CDEF:x58=var1,UN,0,var1,58,GT,58,var1,IF,IF ";
$def[1] .= "CDEF:x60=var1,UN,0,var1,60,GT,60,var1,IF,IF ";
$def[1] .= "AREA:var1#ff0000:\"Temperatur \" ";
$def[1] .= "AREA:x60#ff0000:\"\" ";
$def[1] .= "AREA:x58#ff0000:\"\" ";
$def[1] .= "AREA:x56#ff0000:\"\" ";
$def[1] .= "AREA:x54#ff0000:\"\" ";
$def[1] .= "AREA:x52#ff0000:\"\" ";
$def[1] .= "AREA:x50#ff0000:\"\" ";
$def[1] .= "AREA:x48#ff1100:\"\" ";
$def[1] .= "AREA:x46#ff2200:\"\" ";
$def[1] .= "AREA:x44#ff3300:\"\" ";
$def[1] .= "AREA:x42#ff5500:\"\" ";
$def[1] .= "AREA:x40#ff7700:\"\" ";
$def[1] .= "AREA:x38#ff9900:\"\" ";
$def[1] .= "AREA:x36#ffaa00:\"\" ";
$def[1] .= "AREA:x34#ffdd00:\"\" ";
$def[1] .= "AREA:x32#ffff00:\"\" ";
$def[1] .= "AREA:x30#ccff00:\"\" ";
$def[1] .= "AREA:x28#aaff00:\"\" ";
$def[1] .= "AREA:x26#99ff00:\"\" ";
$def[1] .= "AREA:x24#66ff00:\"\" ";
$def[1] .= "AREA:x22#22ff00:\"\" ";
$def[1] .= "AREA:x20#00ff44:\"\" ";
$def[1] .= "AREA:x18#00ff55:\"\" ";
$def[1] .= "AREA:x16#00ff66:\"\" ";
$def[1] .= "AREA:x10#00ff77:\"\" ";
$def[1] .= "AREA:x14#00ff88:\"\" ";
$def[1] .= "AREA:x12#00ff99:\"\" ";
$def[1] .= "AREA:x10#00ffaa:\"\" ";
$def[1] .= "AREA:x08#00ffbb:\"\" ";
$def[1] .= "AREA:x06#00ffcc:\"\" ";
$def[1] .= "AREA:x04#00ffdd:\"\" ";
$def[1] .= "AREA:x02#00ffff:\"\" ";
$def[1] .= "LINE1:var1#000000:\"\" ";
$def[1] .= "GPRINT:var1:LAST:\"Last\: %2.0lf C \" ";
$def[1] .= "GPRINT:var1:MAX:\"Max\: %2.0lf C \" ";
$def[1] .= "GPRINT:var1:AVERAGE:\"Average\: %2.0lf C  \\n\" ";
$def[1] .= sprintf("COMMENT:\"Warning bei %d C Kritisch bei %d C\\n\" ",
	$WARN[1], $CRIT[1]);
?>
