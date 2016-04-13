var Aviator = require('aviator');

Aviator.setRoutes({
    '/styleguide' : {
        'target': require('./controllers/Styleguide'),
        '/': 'index'
    },
    '/at': {
        'target': require('./controllers/Room'),
        '/:roomname': 'show',
    }
});

module.exports = Aviator;
