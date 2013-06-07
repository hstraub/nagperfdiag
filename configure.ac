#                                               -*- Autoconf -*-
# Process this file with autoconf to produce a configure script.

AC_PREREQ(2.59)
AC_INIT(nagperfdiag, 0.4, herbert@linuxhacker.at)
AC_CONFIG_SRCDIR(src/)
AC_CONFIG_HEADERS(include/config.h:include/config.h.in)
AC_PREFIX_DEFAULT(/usr/local/nagios)

AC_DEFINE([DEFAULT_NAGIOS_USER], [nagios], [Default Nagios User])
AC_DEFINE([DEFAULT_NAGIOS_GROUP], [nagios], [Default Nagios Group])

PKG_NAME=pnp
PKG_VERSION="0.6"
PKG_HOME_URL="http://www.linuxhacker.at"
PKG_REL_DATE="2008-06-19"
AC_SUBST(PKG_NAME)
AC_SUBST(PKG_VERSION)
AC_SUBST(PKG_HOME_URL)
AC_SUBST(PKG_REL_DATE)


if test "$prefix" = "NONE" ;then
	PRE="/usr/local/nagios"
	HTML_DIR="$PRE/share/nagperfdiag"
	LIBEXEC_DIR="$PRE/libexec"
else
	PRE=$prefix
	HTML_DIR="$PRE/share/nagperfdiag"
	LIBEXEC_DIR="$PRE/libexec"
fi

if test "$datadir" = "\${prefix}/share" ;then
        HTML_DIR="$PRE/share/nagperfdiag"
else
        HTML_DIR=$datadir
fi

AC_SUBST(HTML_DIR)
AC_SUBST(LIBEXEC_DIR)

dnl Figure out how to invoke "install" and what install options to use.

AC_PROG_INSTALL
AC_SUBST(INSTALL)

#dnl What OS are we running?
#AC_CANONICAL_HOST

dnl Checks for programs.
AC_PROG_CC
AC_PROG_MAKE_SET
AC_PATH_PROG([STRIP],[strip],[true])



AC_PATH_PROG(CP,cp)

# Checks for libraries.

# Checks for header files.
AC_HEADER_STDC
AC_HEADER_DIRENT
AC_HEADER_SYS_WAIT
#AC_CHECK_HEADERS(netinet/in.h string.h sys/socket.h unistd.h stdio.h stdlib.h getopt.h signal.h)
AC_CHECK_HEADERS(dirent.h stdio.h errno.h unistd.h syslog.h signal.h stdlib.h dirent.h string.h pthread.h getopt.h grp.h pwd.h sys/types.h sys/wait.h sys/stat.h sys/socket.h netinet/in.h fcntl.h limits.h)

# Checks for typedefs, structures, and compiler characteristics.
AC_TYPE_PID_T
AC_TYPE_SIGNAL
AC_TYPE_UID_T

# Checks for structure members
AC_CHECK_MEMBER([struct dirent.d_type], [AC_MSG_RESULT([We successfully have a `dirent_d_type'!])],
		[AC_MSG_ERROR([We need `dirent.d_type'!])],
		[#include <dirent.h>])

#AC_STRUCT_DIRENT_D_TYPE

# Checks for library functions.
AC_FUNC_FORK
AC_CHECK_FUNCS([bzero socket alarm strerror strspn])

AC_FUNC_MALLOC
AC_FUNC_STAT

AC_C_CONST



AC_ARG_WITH(nagios_user,[  --with-nagios-user=<user> sets user name to run nagios],nagios_user=$withval,nagios_user=nagios)
AC_ARG_WITH(nagios_group,[  --with-nagios-group=<grp> sets group name to run nagios],nagios_grp=$withval,nagios_grp=nagios)
AC_SUBST(nagios_user)
AC_SUBST(nagios_grp)
AC_DEFINE_UNQUOTED(DEFAULT_NAGIOS_USER,"$nagios_user")
AC_DEFINE_UNQUOTED(DEFAULT_NAGIOS_GROUP,"$nagios_grp")
INSTALL_OPTS="-o $nagios_user -g $nagios_grp"
AC_SUBST(INSTALL_OPTS)

# Checks for programs.
AC_PATH_PROG(PERL,perl)

AC_ARG_WITH(onlypnpsender,[  --with-onlypnpsender use this if you know that you don't have rrdtools],ONLYPNPSENDER=yes,ONLYPNPSENDER=no)

RRDTOOL=no
AC_ARG_WITH(rrdtool,[  --with-rrdtool=<path_to_rrdtool> sets path to rrdtool],RRDTOOL=$withval,RRDTOOL=no)
if test RRDTOOL=no; then
        AC_PATH_PROG(RRDTOOL,rrdtool)
fi

if test "x$ONLYPNPSENDER" = "xno" ;then
	AC_CHECK_FILE($RRDTOOL,
	AC_MSG_RESULT([RRDtool ($RRDTOOL) found]),
	AC_MSG_ERROR([RRDtool ($RRDTOOL) NOT found])
	)
else
	AC_MSG_WARN([Hope you know that you come along without rrdtools...])
fi

AC_SUBST(RRDTOOL)


if test x$localstatedir = 'x${prefix}/var' ;then
		PERFDATA_LOG="$PRE/var/perfdata.log"
		PERFDATA_DIR="$PRE/share/perfdata"
		NPCD_LOG="$PRE/var/npcd.log"
        AC_SUBST(PERFDATA_DIR)
        AC_SUBST(PERFDATA_LOG)
        AC_SUBST(NPCD_LOG)
else
        PERFDATA_DIR="$localstatedir/perfdata"
        PERFDATA_LOG="$localstatedir/perfdata.log"
        NPCD_LOG="$localstatedir/perfdata.log"
        AC_SUBST(PERFDATA_DIR)
        AC_SUBST(PERFDATA_LOG)
        AC_SUBST(NPCD_LOG)
fi

if test x$sysconfdir = 'x${prefix}/etc' ;then
	CFG_DIR="$PRE/etc/nagperfdiag/"
        AC_SUBST(CFG_DIR)
else
	CFG_DIR="$sysconfdir/"
        AC_SUBST(CFG_DIR)
fi


AC_ARG_WITH(perfdata-dir,[  --with-perfdata-dir=<path_to_perfdata> Tell me where I should store the RRD Database Files],
	    PERFDATA_DIR=$withval
	   )

AC_ARG_WITH(perfdata-spool-dir,[  --with-perfdata-spool-dir=<path_to_perfdata_spool_dir> Tell me where I should store perfdata files for bulk mode with npcd],
	    PERFDATA_SPOOL_DIR=$withval,
	    PERFDATA_SPOOL_DIR=$PRE/var/spool/perfdata/
	   )
AC_SUBST(PERFDATA_SPOOL_DIR)

AC_ARG_WITH(debug,[  --with-debug Enable debuging for process_perfdata.pl],
	    DEBUG="2",
	    DEBUG="0"
	   )
AC_SUBST(DEBUG)

										
AC_CHECK_FILE($HTML_DIR,[PNP_UPDATE="true"],[PNP_UPDATE="false"])

dnl Check for location of init scripts
init_dir=/etc/rc.d/init.d
if test -d /etc/rc.d/init.d; then
    init_dir="/etc/rc.d/init.d"
elif test -d /usr/local/etc/rc.d; then
    init_dir="/usr/local/etc/rc.d"
elif test -d /etc/rc.d; then
    init_dir="/etc/rc.d"
elif test -d /etc/init.d; then
    init_dir="/etc/init.d"
elif test -d /sbin/init.d; then
    init_dir="/sbin/init.d"
fi

dnl User can override init script location
AC_ARG_WITH(init_dir,[  --with-init-dir=<path> sets directory to place init script into],init_dir=$withval) 
AC_SUBST(init_dir)

pnpsender_name=pnpsender
AC_SUBST(pnpsender_name)

npcd_name=npcd
AC_SUBST(npcd_name)

pp_pl_name=process_perfdata.pl
AC_SUBST(pp_pl_name)


AC_CONFIG_FILES(Makefile share/Makefile scripts/Makefile src/Makefile sample-config/Makefile scripts/process_perfdata.pl scripts/net2pnp.pl scripts/rc.npcd share/nagperfdiag/index.php share/nagperfdiag/zoom.php share/nagperfdiag/ajax.php sample-config/nagperfdiag/config.php sample-config/xinetd.pnp.sample sample-config/misccommands.sample sample-config/nagperfdiag/npcd.cfg-sample man/Makefile sample-config/nagperfdiag/process_perfdata.cfg-sample )
AC_OUTPUT()

dnl Review options
echo ""
echo ""
AC_MSG_RESULT([*** Configuration summary for $PKG_NAME $PKG_VERSION $PKG_REL_DATE ***:])

echo ""
echo " General Options:"
echo " -------------------------"

AC_MSG_RESULT([        Nagios user/group:  $nagios_user,$nagios_grp])
AC_MSG_RESULT([        Install \${prefix}:  $prefix])
AC_MSG_RESULT([                 HTML Dir:  $HTML_DIR])
AC_MSG_RESULT([               Config Dir:  $CFG_DIR])
AC_MSG_RESULT([          Path to rrdtool:  $RRDTOOL])
AC_MSG_RESULT([      RRD Files stored in:  $PERFDATA_DIR])
if test "x$DEBUG" = "x1" ;then
AC_MSG_RESULT([                Debug Log:  $PERFDATA_LOG])
AC_MSG_RESULT([            Debug Enabled:  WARNING: Debug Funktions are enabled!])
AC_MSG_RESULT([                            $PERFDATA_LOG will grow fast.])
fi
AC_MSG_RESULT([ Perfdata Files stored in:  $PERFDATA_SPOOL_DIR])
if test "x$PNP_UPDATE" = "xtrue" ;then
AC_MSG_RESULT([                Is Update:  Please backup your installation!])
fi
echo ""
echo ""
echo "Review the options above for accuracy.  If they look okay,"
echo "type 'make all' to compile."
echo ""

