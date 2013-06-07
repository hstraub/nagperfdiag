<?php
#
# Plugin: check_iftraffic.pl (COUNTER)
#
# 2007-11-13 Copyright (c) Herbert Straub <herbert@linuxhacker.at>
# See http://www.linuxhacker.at
#
$opt[1] = "--vertical-label \"Traffic\" -b 1024 --title \"Interface Traffic for $hostname / $servicedesc\" ";
$def[1] = "DEF:inp=$rrdfile:$DS[3]:AVERAGE " ;
$def[1] .= "DEF:out=$rrdfile:$DS[4]:AVERAGE " ;
$def[1] .= "CDEF:aggsum=inp,out,+ " ;

$def[1] .= "AREA:aggsum#ff303a:\"sum\" " ;
$def[1] .= "GPRINT:aggsum:LAST:\"%3.2lf %Sb/s last\" " ;
$def[1] .= "GPRINT:aggsum:AVERAGE:\"%3.2lf %Sb/s avg\" " ;
$def[1] .= "GPRINT:aggsum:MAX:\"%3.2lf %Sb/s max\\n\" ";

$def[1] .= "AREA:inp#6af036:\"in\" " ;
$def[1] .= "GPRINT:inp:LAST:\"%3.2lf %Sb/s last\" " ;
$def[1] .= "GPRINT:inp:AVERAGE:\"%3.2lf %Sb/s avg\" " ;
$def[1] .= "GPRINT:inp:MAX:\"%3.2lf %Sb/s max\\n\" " ;
#
$def[1] .= "AREA:out#70a1f7:\"out\" " ;
$def[1] .= "GPRINT:out:LAST:\"%3.2lf %Sb/s last\" " ;
$def[1] .= "GPRINT:out:AVERAGE:\"%3.2lf %Sb/s avg\" " ;
$def[1] .= "GPRINT:out:MAX:\"%3.2lf %Sb/s max\" ";
?>
