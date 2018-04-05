require('./bootstrap');
require('./push_note');


Noty.overrideDefaults({
    layout   : 'bottomRight',
    theme    : 'relax',
    animation: {
        open: 'animated bounceInRight', // Animate.css class names
        close: 'animated bounceOutRight' // Animate.css class names
    },
    closeWith: ['click', 'button'],
    type: 'success',
    progressBar: true,
    timeout: 1000,
    closeTime: 600
});

new Noty({
	text: 'Successfully added.'
}).show();

