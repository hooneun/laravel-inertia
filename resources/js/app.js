require('./bootstrap');

import { App, plugin } from '@inertiajs/inertia-vue';
import Vue from 'vue';
import { InertiaProgress } from '@inertiajs/progress';
import Layout from './components/Layout';
import Echo from 'laravel-echo';

Vue.use(plugin);
InertiaProgress.init({
	// The delay after which the progress bar will
	// appear during navigation, in milliseconds.
	delay: 250,

	// The color of the progress bar.
	color: '#29d',

	// Whether to include the default NProgress styles.
	includeCSS: true,

	// Whether the NProgress spinner will be shown.
	showSpinner: false
});

const el = document.getElementById('app');

new Vue({
	render: (h) =>
		h(App, {
			props: {
				initialPage: JSON.parse(el.dataset.page),
				resolveComponent: (name) =>
					import(`./Pages/${name}`).then(({ default: page }) => {
						if (page.layout === undefined && !name.startsWith('Public/')) {
							page.layout = Layout;
						}
						return page;
					})
			}
		})
}).$mount(el);
