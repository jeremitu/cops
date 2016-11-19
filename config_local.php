<?php
    if (!isset($config))
        $config = array();

    /*
     * The directory containing calibre's metadata.db file, with sub-directories
     * containing all the formats.
     * BEWARE : it has to end with a /
     */
    //$config['calibre_directory'] = '/var/www/virtual/jurasz.de/books/Calibre Bibliothek/'; // wanjo
    $config['calibre_directory'] = '/var/www/books/Calibre Bibliothek/'; // cienki
    if(strtolower(substr(PHP_OS, 0, 3)) == 'win') {
      $config['calibre_directory'] = 'c:\Users\Public\Documents\Calibre-Bibliothek/'; // PC
    }


    function mylog($string)
    {
      global $config;
      $ip = $_SERVER['REMOTE_ADDR']; # . $_SERVER['REMOTE_HOST'];
      $remote_user = NULL;
      if (array_key_exists('PHP_AUTH_USER', $_SERVER))
        $remote_user = $_SERVER['PHP_AUTH_USER'];
      if (!$remote_user && array_key_exists('REDIRECT_REMOTE_USER', $_SERVER))
        $remote_user = $_SERVER['REDIRECT_REMOTE_USER'];
      if (!$remote_user && array_key_exists('REMOTE_USER', $_SERVER))
        $remote_user = $_SERVER['REMOTE_USER'];

        #$user .= $_SERVER['PHP_AUTH_USER'];
	    # 19/Oct/2016:13:53:18 +0200
	  $s = $ip . ' ' . $remote_user . ' [' . date('d/M/Y:h:i:s O') . '] ' . $string . ' ' . $_SERVER['REQUEST_URI'] . "\n";
      // different dev/prod logs
      $log_file = $config['calibre_directory'] . '_Inbox/books.' . strtolower(substr(PHP_OS, 0, 3)) . '.log';
	  file_put_contents($log_file, $s, FILE_APPEND);
	}

    //mylog("Hello");

    /*
     * Catalog's title
     */
    $config['cops_title_default'] = "BOOKS";

    $config['default_timezone'] = "Europe/Berlin";

    /*
     * use URL rewriting for downloading of ebook in HTML catalog
     * See README for more information
     *  1 : enable
     *  0 : disable
     * JJ on for Kobo (Sasza)
     */
    $config['cops_use_url_rewriting'] = "1";
    /*
     * Full URL prefix (with trailing /)
     * useful especially for Opensearch where a full URL is often required
     * For example Mantano, Aldiko and Marvin require it.
     */
    $config['cops_full_url'] = "http://books.jurasz.de/";

    require_once 'config_local.php';
    // TODO does not work
    $config['cops_mail_configuration'] = array(
       "smtp.host" => "box.jurasz.de",
       "smtp.username" => "books@jurasz.de",
       "smtp.password" => "skoob5367",
       "smtp.secure" => "ssl",
       "address.from" => "books@jurasz.de" );

    // cannot switch off multiline comment with // comment in PHP :(
    // *
    $config['cops_mail_configuration'] = array(
       "smtp.host" => "smtp.gmail.com",
       "smtp.username" => "jarek.jurasz@gmail.com",
       "smtp.password" => "juGMrek1",
       "smtp.secure" => "ssl",
       "address.from" => "books@jurasz.de" );
    // * /

    /*
     * split authors by first letter
     * 1 : Yes
     * 0 : No
     */
    $config['cops_author_split_first_letter'] = "0";

    /*
     * split titles by first letter
     * 1 : Yes
     * 0 : No
     */
    $config['cops_titles_split_first_letter'] = "0";

    $config['cops_update_epub-metadata'] = "1";
    /*
     * Show icon for authors, series, tags and books on OPDS feed
     *  1 : enable
     *  0 : disable
     */
    $config['cops_show_icons'] = "1";
    /*
     * Max number of items per page
     * -1 unlimited - slow
     */
    $config['cops_max_item_per_page'] = "100";

    /*
     * Number of recent books to show
     */
    $config['cops_recentbooks_limit'] = '100';
    /*
     * Set language code to force a language (see lang/ directory for available languages).
     * When empty it will auto detect the language.
     */
    $config['cops_language'] = 'pl'; //fix
