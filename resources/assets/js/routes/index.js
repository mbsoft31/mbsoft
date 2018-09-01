import Login from '../components/auth/login.vue'
import Register from '../components/auth/register.vue'
import ClientList from '../components/client/list.vue'

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
    {
      path: '/client',
      name: 'client.index',
      component: ClientList
    },
];

export default routes;