function addColorPickers( settings, name ) {
    if ( name !== 'core/spacer' ) {
        return settings;
    }
 
    return lodash.assign( {}, settings, {
        supports: lodash.assign( {}, settings.supports, {
            color: {
                background: true,
                text: false
            },
            className: true
        } ),
    } );
}
 
wp.hooks.addFilter(
    'blocks.registerBlockType',
    'my-plugin/class-names/color-blocks',
    addColorPickers
);

/**
 * External Dependencies
 */
 import classnames from 'classnames';

 /**
  * WordPress Dependencies
  */
 const { __ } = wp.i18n;
 const { addFilter } = wp.hooks;
 const { Fragment }	= wp.element;
 const { InspectorControls }	= wp.blockEditor;
 const { createHigherOrderComponent } = wp.compose;
 const { PanelBody, RangeControl } = wp.components;
 
 //restrict to specific block names
 const allowedBlocks = [ 'core/spacer' ];

const MIN_MARGIN_HEIGHT = -250;
const MAX_MARGIN_HEIGHT = 250;
 
 /**
  * Add custom attribute for mobile visibility.
  *
  * @param {Object} settings Settings for the block.
  *
  * @return {Object} settings Modified settings.
  */
 function addAttributes( settings ) {
     
     //check if object exists for old Gutenberg version compatibility

     if( typeof settings.attributes !== 'undefined' && allowedBlocks.includes( settings.name ) ){
     
         settings.attributes = Object.assign( settings.attributes, {

             marginTop: {
                 default: 0
             },
             marginBottom: {
                 default: 0
             },
             zIndex: {
                default: 0
             }
         });
     
     }
 
     return settings;
 }
 
 /**
  * Add mobile visibility controls on Advanced Block Panel.
  *
  * @param {function} BlockEdit Block edit component.
  *
  * @return {function} BlockEdit Modified block edit component.
  */
 const withAdvancedControls = createHigherOrderComponent( ( BlockEdit ) => {
     return ( props ) => {
 
         const {
             name,
             attributes,
             setAttributes,
             isSelected,
         } = props;
 
         const {
             marginTop,
             marginBottom,
             zIndex
         } = attributes;
         
         
         return (
             <Fragment>
                 <BlockEdit {...props} />
                 { isSelected && allowedBlocks.includes( name ) &&

                     <InspectorControls>
                         <PanelBody title={ __( 'Margin settings' ) }>
                
                            <RangeControl
                                label={ __( 'Margin top in pixels' ) }
                                min={ MIN_MARGIN_HEIGHT }
                                max={ Math.max( MAX_MARGIN_HEIGHT, marginTop ) }
                                value={ marginTop }
                                onChange={ ( value ) => setAttributes( {
                                    marginTop: value
                                 } ) }
                            />
                            <RangeControl
                                label={ __( 'Margin bottom in pixels' ) }
                                min={ MIN_MARGIN_HEIGHT }
                                max={ Math.max( MAX_MARGIN_HEIGHT, marginBottom ) }
                                value={ marginBottom }
                                onChange={ ( value ) => setAttributes( {
                                    marginBottom: value
                                 } ) }
                            />
                         </PanelBody>
                         <PanelBody title={ __( 'Position settings' ) }>
                
                            <RangeControl
                                label={ __( 'z-index' ) }
                                min={ 0 }
                                max={ Math.max( MAX_MARGIN_HEIGHT, zIndex ) }
                                value={ zIndex }
                                onChange={ ( value ) => setAttributes( {
                                    zIndex: value
                                } ) }
                            />
                        </PanelBody>
                     </InspectorControls>
                 }
 
             </Fragment>
         );
     };
 }, 'withAdvancedControls');
 
 /**
  * Add custom element class in save element.
  *
  * @param {Object} extraProps     Block element.
  * @param {Object} blockType      Blocks object.
  * @param {Object} attributes     Blocks attributes.
  *
  * @return {Object} extraProps Modified block element.
  */
 function applyExtraClass( extraProps, blockType, attributes ) {


     const { marginTop, marginBottom, zIndex } = attributes;

     if ( allowedBlocks.includes( blockType.name ) ) {    

        return lodash.assign( extraProps, { style: { ...extraProps.style, marginTop: marginTop, marginBottom: marginBottom, zIndex: zIndex } } );

     }
 }
 
 //add filters
 
 addFilter(
     'blocks.registerBlockType',
     'editorskit/custom-attributes',
     addAttributes
 );
 
 addFilter(
     'editor.BlockEdit',
     'editorskit/custom-advanced-control',
     withAdvancedControls
 );
 
 addFilter(
     'blocks.getSaveContent.extraProps',
     'editorskit/applyExtraClass',
     applyExtraClass
 );