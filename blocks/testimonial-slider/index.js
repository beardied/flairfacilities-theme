(function (wp) {
    var registerBlockType = wp.blocks.registerBlockType;
    var el = wp.element.createElement;
    var __ = wp.i18n.__;
    var InspectorControls = wp.blockEditor.InspectorControls;
    var PanelBody = wp.components.PanelBody;
    var Button = wp.components.Button;
    var TextControl = wp.components.TextControl;
    var TextareaControl = wp.components.TextareaControl;

    registerBlockType('flairfacilities/testimonial-slider', {
        edit: function (props) {
            var attributes = props.attributes;
            var setAttributes = props.setAttributes;
            var testimonials = attributes.testimonials || [];

            function updateTestimonial(index, field, value) {
                var newTestimonials = testimonials.slice();
                newTestimonials[index] = Object.assign({}, newTestimonials[index], { [field]: value });
                setAttributes({ testimonials: newTestimonials });
            }

            function addTestimonial() {
                var newTestimonials = testimonials.slice();
                newTestimonials.push({ quote: '', author: '', rating: 5 });
                setAttributes({ testimonials: newTestimonials });
            }

            function removeTestimonial(index) {
                var newTestimonials = testimonials.slice();
                newTestimonials.splice(index, 1);
                setAttributes({ testimonials: newTestimonials });
            }

            return el('div', { className: 'flair-testimonial-slider' },
                el(InspectorControls, null,
                    el(PanelBody, { title: __('Testimonials', 'flairfacilities'), initialOpen: true },
                        testimonials.map(function (t, i) {
                            return el('div', { key: i, style: { marginBottom: '20px', paddingBottom: '20px', borderBottom: '1px solid #e2e8f0' } },
                                el(TextareaControl, {
                                    label: __('Quote', 'flairfacilities'),
                                    value: t.quote,
                                    onChange: function (val) { updateTestimonial(i, 'quote', val); }
                                }),
                                el(TextControl, {
                                    label: __('Author', 'flairfacilities'),
                                    value: t.author,
                                    onChange: function (val) { updateTestimonial(i, 'author', val); }
                                }),
                                el(TextControl, {
                                    label: __('Rating (1-5)', 'flairfacilities'),
                                    value: String(t.rating || 5),
                                    onChange: function (val) { updateTestimonial(i, 'rating', parseInt(val) || 5); }
                                }),
                                el(Button, { isDestructive: true, onClick: function () { removeTestimonial(i); } }, __('Remove', 'flairfacilities'))
                            );
                        }),
                        el(Button, { variant: 'primary', onClick: addTestimonial }, __('Add Testimonial', 'flairfacilities'))
                    )
                ),
                el('div', { className: 'flair-testimonial-track' },
                    testimonials.length > 0 ? testimonials.map(function (t, i) {
                        return el('div', { key: i, className: 'flair-testimonial-slide ' + (i === 0 ? 'is-active' : '') },
                            el('div', { className: 'flair-testimonial-stars' }, '★'.repeat(t.rating || 5)),
                            el('blockquote', { className: 'flair-testimonial-quote' }, '"' + (t.quote || '') + '"'),
                            el('cite', { className: 'flair-testimonial-author' }, '— ' + (t.author || ''))
                        );
                    }) : el('p', null, __('Add testimonials in the sidebar.', 'flairfacilities'))
                )
            );
        },
        save: function () {
            return null;
        }
    });
})(window.wp);
