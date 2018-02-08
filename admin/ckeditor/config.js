/**
 * @license Copyright (c) 2003-2016, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	config.skin='office2013',
	config.basicEntities = false,
    config.entities = false,
    config.allowedContent = true,
    config.fillEmptyBlocks = false,
    config.fullPage = false,
    config.enterMode = CKEDITOR.ENTER_BR,
	config.filebrowserBrowseUrl = 'http://chamsonthuonghieu.vn/admin/ckfinder/ckfinder.html',
	config.filebrowserImageBrowseUrl = 'http://chamsonthuonghieu.vn/admin/ckfinder/ckfinder.html?type=Images',	
	config.filebrowserImageUploadUrl = 'http://chamsonthuonghieu.vn/admin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images'

};
