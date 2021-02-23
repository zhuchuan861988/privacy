/* global plugininstallL10n, tb_click, tb_remove */

/**
 * Functionality for the plugin install screens.
 */
var tb_position;
jQuery( document ).ready( function( $ ) {

	var tbWindow,
		$focusedBefore,
		$iframeBody,
		$tabbables,
		$firstTabbable,
		$lastTabbable,
		$uploadViewToggle = $( '.upload-view-toggle' ),
		$wrap = $ ( '.wrap' ),
		$body = $( document.body );

	tb_position = function() {
		var width = $( window ).width(),
			H = $( window ).height() - ( ( 792 < width ) ? 60 : 20 ),
			W = ( 792 < width ) ? 772 : width - 20;

		tbWindow = $( '#TB_window' );

		if ( tbWindow.length ) {
			tbWindow.width( W ).height( H );
			$( '#TB_iframeContent' ).width( W ).height( H );
			tbWindow.css({
				'margin-left': '-' + parseInt( ( W / 2 ), 10 ) + 'px'
			});
			if ( typeof document.body.style.maxWidth !== 'undefined' ) {
				tbWindow.css({
					'top': '30px',
					'margin-top': '0'
				});
			}
		}

		return $( 'a.thickbox' ).each( function() {
			var href = $( this ).attr( 'href' );
			if ( ! href ) {
				return;
			}
			href = href.replace( /&width=[0-9]+/g, '' );
			href = href.replace( /&height=[0-9]+/g, '' );
			$(this).attr( 'href', href + '&width=' + W + '&height=' + ( H ) );
		});
	};

	$( window ).resize( function() {
		tb_position();
	});

	/*
	 * Custom events: when a Thickbox iframe has loaded and when the Thickbox
	 * modal gets removed from the DOM.
	 */
	$body
		.on( 'thickbox:iframe:loaded', tbWindow, function() {
			iframeLoaded();
		})
		.on( 'thickbox:removed', function() {
			// Set focus back to the element that opened the modal dialog.
			// Note: IE 8 would need this wrapped in a fake setTimeout `0`.
			$focusedBefore.focus();
		});

	function iframeLoaded() {
		var $iframe = tbWindow.find( '#TB_iframeContent' );

		// Get the iframe body.
		$iframeBody = $iframe.contents().find( 'body' );

		// Get the tabbable elements and handle the keydown event on first load.
		handleTabbables();

		// Set initial focus on the "Close" button.
		$firstTabbable.focus();

		/*
		 * When the "Install" button is disabled (e.g. the Plugin is already installed)
		 * then we can't predict where the last focusable element is. We need to get
		 * the tabbable elements and handle the keydown event again and again,
		 * each time the active tab panel changes.
		 */
		$( '#plugin-information-tabs a', $iframeBody ).on( 'click', function() {
			handleTabbables();
		});

		// Close the modal when pressing Escape.
		$iframeBody.on( 'keydown', function( event ) {
			if ( 27 !== event.which ) {
				return;
			}
			tb_remove();
		});
	}

	/*
	 * Get the tabbable elements and detach/attach the keydown event.
	 * Called after the iframe has fully loaded so we have all the elements we need.
	 * Called again each time a Tab gets clicked.
	 * @todo Consider to implement a WordPress general utility for this and don't use jQuery UI.
	 */
	function handleTabbables() {
		var $firstAndLast;
		// Get all the tabbable elements.
		$tabbables = $( ':tabbable', $iframeBody );
		// Our first tabbable element is always the "Close" button.
		$firstTabbable = tbWindow.find( '#TB_closeWindowButton' );
		// Get the last tabbable element.
		$lastTabbable = $tabbables.last();
		// Make a jQuery collection.
		$firstAndLast = $firstTabbable.add( $lastTabbable );
		// Detach any previously attached keydown event.
		$firstAndLast.off( 'keydown.wp-plugin-details' );
		// Attach again the keydown event on the first and last focusable elements.
		$firstAndLast.on( 'keydown.wp-plugin-details', function( event ) {
			constrainTabbing( event );
		});
	}

	// Constrain tabbing within the plugin modal dialog.
	function constrainTabbing( event ) {
		if ( 9 !== event.which ) {
			return;
		}

		if ( $lastTabbable[0] === event.target && ! event.shiftKey ) {
			event.preventDefault();
			$firstTabbable.focus();
		} else if ( $firstTabbable[0] === event.target && event.shiftKey ) {
			event.preventDefault();
			$lastTabbable.focus();
		}
	}

	// Open the Plugin details modal.
	$( '.thickbox.open-