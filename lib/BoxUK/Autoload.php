<?php

namespace BoxUK;

/**
 * Class with single static method for initializing autoloading of PSR0
 * compatible libraries.
 * 
 */
class Autoload {
    
    /**
     * Register a path to autoload PSR0 compatible PHP classes from
     * 
     * @param string $rootPath Absolute path
     */
    public static function register( $rootPath ) {
        
        spl_autoload_register(function( $class ) use ( $rootPath ) {
            
            $filePath = sprintf(
                '%s/%s.php',
                $rootPath,
                str_replace( '\\', '/', $class )
            );
            
            if ( file_exists($filePath) ) {
                include $filePath;
            }
            
        });
        
    }
    
}
