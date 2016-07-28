var Vue = require('./vue');

Vue.use(require('./vue-resource'));

Vue.use(require('./vue-router'));

// Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('value');

new Vue({

    el: '#app',

    data:
    {
        // messages: [],
        // userPlan: {},
    },
    // created: function(){
    // this.getAuthUserPlan();
    // },

    components:
    {
        // navigation: require('./components/Partials/Navigation'),
        // changebranch: require('./components/Branch/Changebranch.js')
    },

    events:
    {
        // 'put-user': function(navUser)
        // {
        //     this.user = navUser;
        // }
    },
    methods:
    {
        // getAuthUserPlan: function()
        // {
        //     this.$http.get('/api/user/authUserPlan').then(function(response)
        //     {
        //         this.userPlan = response.data;
        //     }.bind(this)).catch(function(response)
        //     {
        //         this.errors = response.data;
        //     }.bind(this));
        // }
    }

});