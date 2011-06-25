<?php

namespace BoxUK;

/**
 * Class with single static method for initializing autoloading of PSR0
 * compatible libraries.
 * 
 */
class Autoload {
    
    /**
     * @var array Paths registered to autoload from
     */
    private static $registeredPaths = array();
    
    /**
     * Register a path to autoload PSR0 compatible PHP classes from
     * 
     * @param string $rootPath Absolute path
     */
    public static function register( $rootPath ) {
        
        if ( !isset(self::$registeredPaths[$rootPath]) ) {
            
            self::registerPath( $rootPath );
            self::$registeredPaths[ $rootPath ] = 1;
            
        }

    }

    /**
     * Registers a path to autoload classes from
     * 
     * @param type $rootPath Absolute path
     */
    protected static function registerPath( $rootPath ) {
        
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
    
    /**
     * Registers the root PEAR folder to autoload classes from.  Only PEAR
     * classes in PSR0 format will be loaded though.
     * 
     */
    public static function registerPear() {
        
        require_once 'PEAR/Config.php';
        
        $pearConfig = new \PEAR_Config();
        $pearRoot = $pearConfig->get( 'php_dir' );
        
        self::registerPath( $pearRoot );
        
    }
    
}
