<?php
/**
 * Package file for creating PEAR packages. This file defines how the PEAR
 * package should be constructed.
 *
 * usage: php package.php VERSION {channel}
 *  VERSION is required
 *  {CHANNEL}
 *
 * @author    Box UK <opensource@boxuk.com>
 * @copyright Copyright (c) 2011, Box UK
 * @license   http://opensource.org/licenses/mit-license.php MIT License and http://www.gnu.org/licenses/gpl.html GPL license
 * @link      http://github.com/boxuk/describr
 * @since     1.0.0
 */
require_once( 'PEAR/PackageFileManager2.php' );

@list( $IGNORE, $version, $channel ) = $_SERVER['argv'];

if ( !$version ) {
    echo "usage: php package.php VERSION {CHANNEL}\n";
    echo " VERSION is required\n";
    echo " {CHANNEL} is optional\n";
    exit( 1 );
}
if( !$channel ) {
    $channel = 'pear.boxuk.net';
}
define( 'BOXUK_PEAR_CHANNEL', $channel );

$packagexml = new PEAR_PackageFileManager2;
$packagexml->setOptions(array(
    'packagedirectory' => 'lib',
    'baseinstalldir' => '/'
));

$packagexml->setPackage( 'autoload' );
$packagexml->setSummary( 'PSR0 Autoloader' );
$packagexml->setDescription( '-' );
$packagexml->setChannel( BOXUK_PEAR_CHANNEL ); // TODO
$packagexml->setAPIVersion( $version );
$packagexml->setReleaseVersion( $version );
$packagexml->setReleaseStability( 'stable' );
$packagexml->setAPIStability( 'stable' );
$packagexml->setNotes( "-" );
$packagexml->setPackageType( 'php' );
$packagexml->setPhpDep( '5.3.0' );
$packagexml->setPearinstallerDep( '1.3.0' );
$packagexml->addMaintainer( 'lead', 'boxuk', 'boxuk', 'opensource@boxuk.com' );
$packagexml->setLicense( 'MIT License', 'http://opensource.org/licenses/mit-license.php' );
$packagexml->generateContents();
$packagexml->writePackageFile();
