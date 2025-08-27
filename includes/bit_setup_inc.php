<?php
namespace Bitweaver\Feed;

global $gBitSystem, $gBitUser, $gBitThemes;

$pRegisterHash = [
	'package_name' => 'feed',
	'package_path' => dirname( dirname( __FILE__ ) ).'/',
];
define( 'FEED_PKG_NAME', $pRegisterHash['package_name'] );
define( 'FEED_PKG_PATH', BIT_ROOT_PATH . basename( $pRegisterHash['package_path'] ) . '/');
define( 'FEED_PKG_INCLUDE_URL', BIT_ROOT_PATH . basename( $pRegisterHash['package_path'] ) . '/includes/');
$gBitSystem->registerPackage( $pRegisterHash );


if( $gBitSystem->isPackageActive( 'feed' ) ) {
	if( $gBitUser->hasPermission( 'p_feed_view' )) {
		$menuHash = [
			'package_name'       => FEED_PKG_NAME,
			'index_url'          => FEED_PKG_URL.'index.php',
			'menu_template'      => 'bitpackage:feed/menu_feed.tpl',
		];
		$gBitSystem->registerAppMenu( $menuHash );
	}
}
