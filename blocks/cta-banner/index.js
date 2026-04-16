(function (wp) {
    var registerBlockType = wp.blocks.registerBlockType;
    var el = wp.element.createElement;
    var __ = wp.i18n.__;
    var InspectorControls = wp.blockEditor.InspectorControls;
    var PanelBody = wp.components.PanelBody;
    var TextControl = wp.components.TextControl;

    registerBlockType('flairfacilities/cta-banner', {
        edit: function (props) {
            var attributes = props.attributes;
            var setAttributes = props.setAttributes;

            return el('div', { className: 'flair-cta-banner-block' },
                el(InspectorControls, null,
                    el(PanelBody, { title: __('CTA Settings', 'flairfacilities'), initialOpen: true },
                        el(TextControl, {
                            label: __('Title', 'flairfacilities'),
                            value: attributes.title,
                            onChange: function (val) { setAttributes({ title: val }); }
                        }),
                        el(TextControl, {
                            label: __('Button Text', 'flairfacilities'),
                            value: attributes.buttonText,
                            onChange: function (val) { setAttributes({ buttonText: val }); }
                        }),
                        el(TextControl, {
                            label: __('Button URL', 'flairfacilities'),
                            value: attributes.buttonUrl,
                            onChange: function (val) { setAttributes({ buttonUrl: val }); }
                        })
                    )
                ),
                el('div', { className: 'flair-cta-content' },
                    el('h2', { className: 'flair-cta-title' }, attributes.title),
                    el('a', { className: 'flair-cta-btn', href: attributes.buttonUrl }, attributes.buttonText)
                )
            );
        },
        save: function () {
            return null;
        }
    });
})(window.wp);
