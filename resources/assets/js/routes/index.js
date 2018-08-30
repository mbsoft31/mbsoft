import Login from '../components/auth/login.vue'
import Register from '../components/auth/register.vue'

const routes = [
    {
      path: '/login',
      name: 'login',
      component: Login
    },
    {
      path: '/register',
      name: 'register',
      component: Register
    },
];

export default routes;