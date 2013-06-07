<?php
/*
 * Copyright (C) 2008 Herbert Straub <herbert@linuxhacker.at>
 * See http://www.linuxhacker.at for details
 *
 * See enclosed file COPYING for license information (GPL).
 */

/*
 * Class nagperfdiag
 *
 * @author Herbert Straub <herbert@linuxhacker.at>
 */
class nagperfdiag {

    var $logger;
    var $is_opened = false;
    
    /*
     * Logs a message. Detailed informations, see
     * http://www.indelible.org/php/Log/guide.html
     *
     *  @param string $message the message string
     *  @param string $file Filename __FILE__
     *  @param integer $line Line number __LINE__
     *  @param integer $priority Message Priority:
     *  <pre>
     *  LOG_EMERG
     *  LOG_ALERT
     *  LOG_CRIT
     *  LOG_ERR
     *  LOG_WARNING
     *  LOG_NOTICE
     *  LOG_INFO
     *  LOG_DEBUG
     *  </pre>
     */
    function logMessage( $message, $file, $line, $priority ) {
        global $conf;
        // FIXME add Logging enabled to Configuration file
        
        if ( $priority > $conf['logging']['priority'] ) {
            return;
        }

        if ( ! $is_opened ) {
            $logger = openlog ( "NagPerfDiag", LOG_PID, $conf['logging']['facility'] );
            $is_opened = true;
        }

        syslog ($priority, "File: " . $file . " Line: " . $line . "; " . $message);

    }

    /*
     * Dump data to temporary file
     * 
     *  @parameter string $message message string
     *  @parameter string $filename path and filename
     */
    function dumpMessage( $message, $filename) {
        global $conf;

        if ( $conf['logging']['dump_enabled'] == false ) {
            return;
        }

        $f = fopen( $filename, "a+");
        if ( ! $f ) {
            logMessage( "Cannot write to file: $filename", __FILE__, __LINE__, LOG_ERR);
            return;
        }
        fwrite( $f, $message);
        fclose( $f );
    }

  }

/* vim: set ai tabstop=4 shiftwidth=4 expandtab: */
?>
