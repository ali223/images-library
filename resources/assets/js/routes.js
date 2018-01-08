import VueRouter from 'vue-router';

let routes = [
	{
		path: '/',
		component: require('./views/ActiveImages')
	},
	{
		path: '/deleted',
		component: require('./views/DeletedImages')
	}

];

export default new VueRouter({
	routes
});