<?php
#
# Template for check_swap
# Copyright (c) 2006-2008 Joerg Linge (http://www.pnp4nagios.org)
# $Id: check_swap.php 367 2008-01-23 18:10:31Z pitchfork $
#
#
# RRDtool Options
$opt[1] = "-X 0 --vertical-label MB -l 0 -u $MAX[1] --title \"Swap usage $hostname / $servicedesc\" ";
#
#
# Graphen Definitions
$def[1] = "DEF:var1=$rrdfile:$DS[1]:AVERAGE "; 
$def[1] .= "AREA:var1#c6c6c6:\"$servicedesc\\n\" "; 
$def[1] .= "LINE1:var1#003300: "; 
$def[1] .= "HRULE:$MAX[1]#003300:\"Capacity $MAX[1] MB \" ";
$def[1] .= "HRULE:$WARN[1]#ffff00:\"Warning on $WARN[1] MB \" ";
$def[1] .= "HRULE:$CRIT[1]#ff0000:\"Critical on $CRIT[1] MB \\n\" ";       
$def[1] .= "GPRINT:var1:LAST:\"%6.2lf MB currently free  \\n\" ";
$def[1] .= "GPRINT:var1:MAX:\"%6.2lf MB max free \\n\" ";
$def[1] .= "GPRINT:var1:AVERAGE:\"%6.2lf MB average free\" ";
?>
