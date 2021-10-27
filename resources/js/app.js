require('./bootstrap');

// choice.js

import Choices from 'choices.js';

// create multi-select with choice.js

// Create multi-select element

window.choices = (element) => {
    return new Choices(element, {
        maxItemCount: 4, removeItemButton: true
    });
}

// choice.js

import Alpine from 'alpinejs';

require('alpinejs');

Alpine.start();


