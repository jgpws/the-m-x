/* Alternate block styles for Gutenberg (block editor) */
wp.domReady( () => {
	
	wp.blocks.registerBlockStyle( 'core/columns', [
		{
			name: 'default',
			label: 'Default',
			isDefault: true,
		},
		{
			name: 'the-mx-columns',
			label: 'The M.X. Columns',
		}
	] );
	wp.blocks.registerBlockStyle( 'core/group', [
		{
			name: 'default',
			label: 'Default',
			isDefault: true,
		},
		{
			name: 'the-mx-group-p1em',
			label: 'The M.X. Group (1em Padding)',
		}
	] );
	wp.blocks.registerBlockStyle( 'core/navigation', [
		{
			name: 'default',
			label: 'Default',
			isDefault: true,
		},
		{
			name: 'the-mx-nav',
			label: 'The M.X. Navigation',
		}
	] );
	wp.blocks.registerBlockStyle( 'core/search', [
		{
			name: 'default',
			label: 'Default',
			isDefault: true,
		},
		{
			name: 'the-mx-search-darkbg',
			label: 'The M.X. Search (Dark Background)',
		}
	] );
	wp.blocks.registerBlockStyle( 'core/social-links', [
		{
			name: 'default',
			label: 'Default',
			isDefault: true,
		},
		{
			name: 'the-mx-social-badges',
			label: 'The M.X. Social Badges',
		}
	] );
	
} );
