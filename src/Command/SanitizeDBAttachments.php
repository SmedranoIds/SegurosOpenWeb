#!/usr/bin/php
<?php
namespace OpenWeb\Command;

require_once __DIR__.'/../../../../../wp-blog-header.php';

class SanitizeDBAttachments
{
    public function execute()
    {
        $wpdb = $GLOBALS['wpdb'];

        $sql = "
          UPDATE ".$wpdb->prefix."postmeta SET meta_value =
            REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE(
              REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE(
                REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE(
                  LOWER(meta_value),
                    'ù','u'),'ú','u'),'û','u'),'ü','u'),'ý','y'),'ë','e'),'à','a'),'á','a'),'â','a'),'ã','a'),
                'ä','a'),'å','a'),'æ','a'),'ç','c'),'è','e'),'é','e'),'ê','e'),'ë','e'),'ì','i'),'í','i'),
            'î','i'),'ï','i'),'ð','o'),'ñ','n'),'ò','o'),'ó','o'),'ô','o'),'õ','o'),'ö','o'),'ø','o') 
          WHERE meta_key IN ('_wp_attached_file', '_wp_attachment_metadata');
        ";

        $rows = $wpdb->query($sql);

        echo sprintf('Registros modificados: %d', $rows).PHP_EOL;
    }
}

$command = new SanitizeDBAttachments();
$command->execute();


