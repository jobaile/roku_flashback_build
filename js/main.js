    //components will go here
    import LoginComponent from './components/LoginComponent.js'; //this is like doing a php include
    import UserComponent from './components/UserComponent.js'; //this is like doing a php include

const routes = [
     { path: '/', redirect: { name: 'login' } },
     { path: '/login', name: 'login', component: LoginComponent },
     { path: '/users', name: 'users', component: UserComponent } //naming convention should be the same
     //{ path: '/', name: 'home', component: HomePageComponent },
    //  { path: '/users/:id', name: 'users', component: UsersPageComponent, props: true },
    //  { path: '/contact', name: 'contact', component: ContactPageComponent}
    // { path: '/*', name: 'error', component: ErrorPageComponent}
];

const router = new VueRouter ({
    routes
});

const vm = new Vue ({
    // el: '#app',

    data: {
        message: "Sup from vue!",
        authenticated: false, //will be true if authenticated
        administrator: false,

        mockAccount : { 
            username: "admin",
            password: "123"
        },

        user: [],
        currentUser: {}
    },

    created: function(){
        console.log('parent is live');
    },

    methods: {
        logParent(message) {
            console.log("from the parent", message);
        },

        logMainMsg(message){
            console.log('called from inside a child, lives in the parent', message);
        },

        setAuthenticated(status){ //true or false
            this.authenticated = status;
        },

        logout(){
            this.$router.push({ path: "/login"} );
            this.authenticated = false;
        },

        setCurrentUser(user) {
            //stub
            console.log('hit setCurrentUser');
        }
    },

    router: router
}).$mount("#app");


//make the router check all the routes and bounce back if we're not authenticated
router.beforeEach((to, from, next) => { //these are called router guards
    console.log("router guard fired");

    if(vm.authenticated == false){
        next("/login");
    }else{
        next();
    }
});