import {
    library
} from '@fortawesome/fontawesome-svg-core';
import {
    faArrowUp,
    faArrowDown,
    faChevronUp,
    faChevronDown,
} from '@fortawesome/free-solid-svg-icons';
import {
    FontAwesomeIcon
} from '@fortawesome/vue-fontawesome';

library.add(faArrowUp);
library.add(faArrowDown);
library.add(faChevronUp);
library.add(faChevronDown);

Nova.booting((Vue) => {
    Vue.component('font-awesome-icon', FontAwesomeIcon);
    Vue.component('index-nova-eloquent-sortable', require('./components/IndexField'))
})
