(function (wp) {
    var registerBlockType = wp.blocks.registerBlockType;
    var el = wp.element.createElement;
    var __ = wp.i18n.__;
    var InspectorControls = wp.blockEditor.InspectorControls;
    var PanelBody = wp.components.PanelBody;
    var TextControl = wp.components.TextControl;
    var TextareaControl = wp.components.TextareaControl;

    registerBlockType('flairfacilities/service-card', {
        edit: function (props) {
            var attributes = props.attributes;
            var setAttributes = props.setAttributes;

            return el('div', { className: 'flair-service-card-block' },
                el(InspectorControls, null,
                    el(PanelBody, { title: __('Card Settings', 'flairfacilities'), initialOpen: true },
                        el(TextControl, {
                            label: __('Icon', 'flairfacilities'),
                            value: attributes.icon,
                            onChange: function (val) { setAttributes({ icon: val }); }
                        }),
                        el(TextControl, {
                            label: __('Title', 'flairfacilities'),
                            value: attributes.title,
                            onChange: function (val) { setAttributes({ title: val }); }
                        }),
                        el(TextareaControl, {
                            label: __('Description', 'flairfacilities'),
                            value: attributes.description,
                            onChange: function (val) { setAttributes({ description: val }); }
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
                el('div', { className: 'flair-service-icon' }, attributes.icon),
                el('h3', { className: 'flair-service-title' }, attributes.title),
                el('p', { className: 'flair-service-desc' }, attributes.description),
                el('a', { className: 'flair-service-btn', href: attributes.buttonUrl }, attributes.buttonText)
            );
        },
        save: function () {
            return null;
        }
    });
})(window.wp);
