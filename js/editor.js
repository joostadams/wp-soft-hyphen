/**
 * WP Soft Hyphen — registers a RichText format that inserts a soft
 * hyphen (U+00AD / &shy;) at the caret position via a toolbar button
 * or the Ctrl/Cmd+Shift+- shortcut.
 *
 * Build-free: uses the wp.* globals, no JSX or bundler required.
 */
( function ( wp ) {
	'use strict';

	var registerFormatType = wp.richText.registerFormatType;
	var insert = wp.richText.insert;
	var RichTextToolbarButton = wp.blockEditor.RichTextToolbarButton;
	var RichTextShortcut = wp.blockEditor.RichTextShortcut;
	var el = wp.element.createElement;
	var Fragment = wp.element.Fragment;
	var __ = wp.i18n.__;

	var SOFT_HYPHEN = '\u00AD';

	// Icon: a dashed line, hinting at an optional (soft) hyphen.
	var icon = el(
		'svg',
		{ xmlns: 'http://www.w3.org/2000/svg', viewBox: '0 0 24 24', width: 24, height: 24 },
		el( 'path', {
			d: 'M4 13h4v-2H4v2zm6 0h4v-2h-4v2zm6 0h4v-2h-4v2z',
			fill: 'currentColor',
		} )
	);

	registerFormatType( 'wp-soft-hyphen/soft-hyphen', {
		title: __( 'Soft hyphen (afbreekstreepje)', 'wp-soft-hyphen' ),
		tagName: 'span',
		className: 'wp-soft-hyphen',
		edit: function ( props ) {
			function insertSoftHyphen() {
				props.onChange( insert( props.value, SOFT_HYPHEN ) );
				if ( props.onFocus ) {
					props.onFocus();
				}
			}

			return el(
				Fragment,
				null,
				el( RichTextShortcut, {
					type: 'primaryShift',
					character: '-',
					onUse: insertSoftHyphen,
				} ),
				el( RichTextToolbarButton, {
					icon: icon,
					title: __( 'Soft hyphen', 'wp-soft-hyphen' ),
					onClick: insertSoftHyphen,
					shortcutType: 'primaryShift',
					shortcutCharacter: '-',
				} )
			);
		},
	} );
} )( window.wp );
