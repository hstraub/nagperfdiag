<?php
#
# Template for check_disk_1
#
# Copyright (c) 2007 Herbert Straub <herbert@linuxhacker.at>
#
# 2007-11-10 Herbert Straub
#	- normalized values and units + trend graph
#
include_once ("/etc/nagperfdiag/templates/helper_functions.php");
$opt[1] = "--vertical-label Bytes --title \"Filesystem  $hostname / $servicedesc\" ";
#
#
# Graphen Definitions
$def[1] = "DEF:var1=$rrdfile:$DS[1]:AVERAGE "; 
$def[1] .= "CDEF:G=var1 "; 
$def[1] .= "VDEF:D=G,LSLSLOPE ";
$def[1] .= "VDEF:H=G,LSLINT ";
$def[1] .= "VDEF:F=G,LSLCORREL ";
$def[1] .= "CDEF:E=G,POP,D,COUNT,*,H,+ ";
$def[1] .= "AREA:var1#00f6ff:\"\" "; 
$def[1] .= "LINE1:E#FF0000:\"Prognose\" ";
$def[1] .= "LINE1:var1#003300: "; 
$def[1] .= sprintf("HRULE:$MAX[1]#003300:\"Kapazitaet %3.2lf %s \" ",
	helper_value($MAX[1]), helper_unit($MAX[1]));
$def[1] .= sprintf("HRULE:$WARN[1]#ffff00:\"Warning bei %3.2lf %s \" ",
	helper_value($WARN[1]),helper_unit($WARN[1]));
$def[1] .= sprintf("HRULE:$CRIT[1]#ff0000:\"Critical bei %3.2lf %s \" ",
	helper_value($CRIT[1]), helper_unit($CRIT[1]));       
$def[1] .= "COMMENT:\"\\n\" ";
$def[1] .= sprintf("GPRINT:var1:LAST:\"%%3.2lf %%sB von %3.2lf %s zur Zeit belegt \\n\" ",
	helper_value($MAX[1]), helper_unit($MAX[1]));
$def[1] .= "GPRINT:var1:MAX:\"%3.2lf %sB waren maximal belegt \\n\" ";
$def[1] .= "GPRINT:var1:AVERAGE:\"%3.2lf %sB waren im Durchschnitt belegt\" ";
?>
