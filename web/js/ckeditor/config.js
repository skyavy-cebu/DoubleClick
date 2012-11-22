/*
Copyright (c) 2003-2012, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/
CKEDITOR.editorConfig = function( config )
{
	config.toolbar = 'Basic';
 
	config.toolbar_MyToolbar =
	[
    { name: 'document', items : [ 'Save','NewPage'] },
    { name: 'basicstyles', items : [ 'Bold','Italic','Underline','Strike' ] },
    { name: 'paragraph', items : ['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'] },
    { name: 'styles', items : [ 'Styles','Format','Font'] },
    { name: 'styles', items : ['FontSize'] }
	];
};