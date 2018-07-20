
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

//Vue.component('example', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app',
    data: {
    	ip: '127001'
    },
    created() {
    	axios.get('/ip_address')
    		 .then(function(response) {
    		 	console.log((response.data).replace(/\./g, ''));
    		 	this.ip = (response.data).replace(/\./g, '');
    		 	console.log('channel' + this.ip)
    		 	console.log((this.ip).length)
    		 });
    	Echo.channel('channel-' + this.ip)
    		.listen('QRScanned' , (e) => {
    			console.log(e)
    			$('#content').html('Success!')
    		})
    }
});
