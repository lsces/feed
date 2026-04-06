<?php
/**
 * @version $Header$
 *
 * FeedStatus class
 *
 * @version  $Revision$
 * @package  feed
 */

/**
 * required setup
 */
namespace Bitweaver\Feed;
use Bitweaver\Liberty\LibertyComment;
use Bitweaver\Users\RoleUser;

define( 'FEEDSTATUS_CONTENT_TYPE_GUID','feedstatus');

/**
 * FeedStatus
 * @package  feed
 */
class FeedStatus extends LibertyComment {

	/**
	* During initialisation, be sure to call our base constructors
	**/
	public function FeedStatus($pCommentId = null, $pContentId = null, $pInfo = null) {
		
		LibertyComment::LibertyComment($pCommentId,$pContentId,$pInfo);
	
/*		// Permission setup
		$this->mViewContentPerm  = 'p_boards_read';
		$this->mUpdateContentPerm  = 'p_boards_post_update';
		$this->mAdminContentPerm = 'p_boards_admin';
*/
		
		$this->mContentTypeGuid = FEEDSTATUS_CONTENT_TYPE_GUID;
		$this->registerContentType( FEEDSTATUS_CONTENT_TYPE_GUID, [
				'content_type_guid' => FEEDSTATUS_CONTENT_TYPE_GUID,
				'content_name' => 'Feed Status',
				'handler_class' => 'FeedStatus',
				'handler_package' => 'feed',
				'handler_file' => 'FeedStatus.php',
				'maintainer_url' => 'https://www.bitweaver.org'
			] );
/*
		$this->mViewContentPerm  = 'p_loc_view';
		$this->mCreateContentPerm  = 'p_loc_edit';
		$this->mUpdateContentPerm  = 'p_loc_edit';
		$this->mAdminContentPerm = 'p_loc_admin';
*/
	}
	
	public function getThumbnailUrl( string $pSize = 'avatar', ?array $pInfoHash = null, ?int $pSecondaryId = null, ?int $pDefault = null ): string|null {
		$rootUser = new RoleUser(null,$this->mInfo['root_id']);
		$rootUser->load();
		$thumbnailUrl = $rootUser->getThumbnailUrl( $pSize );
		if( empty ($thumbnailUrl) ){
			$thumbnailUrl = USERS_PKG_PATH.'icons/silhouette.png';
		}
		return $thumbnailUrl;
	}

}
