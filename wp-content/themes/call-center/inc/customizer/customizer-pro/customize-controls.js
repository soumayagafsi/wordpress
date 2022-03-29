( function( api ) {

	// Extends our custom "call-center" section.
	api.sectionConstructor['call-center'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );