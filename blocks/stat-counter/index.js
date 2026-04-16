(function (wp) {
    var registerBlockType = wp.blocks.registerBlockType;
    var el = wp.element.createElement;
    var __ = wp.i18n.__;
    var InspectorControls = wp.blockEditor.InspectorControls;
    var PanelBody = wp.components.PanelBody;
    var TextControl = wp.components.TextControl;

    registerBlockType('flairfacilities/stat-counter', {
        edit: function (props) {
            var attributes = props.attributes;
            var setAttributes = props.setAttributes;

            return el('div', { className: 'flair-stat-counter' },
                el(InspectorControls, null,
                    el(PanelBody, { title: __('Counter Settings', 'flairfacilities'), initialOpen: true },
                        el(TextControl, {
                            label: __('Number', 'flairfacilities'),
                            value: attributes.number,
                            onChange: function (val) { setAttributes({ number: val }); }
                        }),
                        el(TextControl, {
                            label: __('Suffix', 'flairfacilities'),
                            value: attributes.suffix,
                            onChange: function (val) { setAttributes({ suffix: val }); }
                        }),
                        el(TextControl, {
                            label: __('Label', 'flairfacilities'),
                            value: attributes.label,
                            onChange: function (val) { setAttributes({ label: val }); }
                        })
                    )
                ),
                el('div', { className: 'flair-stat-number' },
                    el('span', { className: 'flair-stat-value' }, attributes.number),
                    el('span', { className: 'flair-stat-suffix' }, attributes.suffix)
                ),
                el('div', { className: 'flair-stat-label' }, attributes.label)
            );
        },
        save: function () {
            return null;
        }
    });
})(window.wp);
