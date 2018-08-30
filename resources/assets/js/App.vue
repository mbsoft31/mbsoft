<template>
    <div>
        <nav class="flex items-center justify-between flex-wrap bg-teal p-6">
          <div class="flex items-center flex-no-shrink text-white mr-6">
            <span class="font-semibold text-xl tracking-tight">Dashboard</span>
          </div>
          <div class="block lg:hidden md:hidden">
            <button class="flex items-center px-3 py-2 border rounded text-teal-lighter border-teal-light hover:text-white hover:border-white">
              <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
            </button>
          </div>

          <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto md:flex md:items-center md:w-auto">
            
            <div class="text-sm lg:flex-grow md:flex-grow">
              <router-link to="/login">
              <a class="block mt-4 lg:inline-block lg:mt-0 md:inline-block md:mt-0 text-teal-lighter hover:text-white mr-4">
                Login
              </a>
              </router-link>
              <router-link to="/register">
              <a class="block mt-4 lg:inline-block lg:mt-0 md:inline-block md:mt-0 text-teal-lighter hover:text-white mr-4">
              Register
              </a>
              </router-link>
            </div>

            <div>
              <a href="#" class="inline-block text-sm px-4 py-2 leading-none border rounded text-white border-white hover:border-transparent hover:text-teal hover:bg-white mt-4 lg:mt-0 md:mt-0">Download</a>
            </div>
          </div>
        </nav>
        <router-view/>
    </div>
</template>

<script>

export default {
  name: 'App',
  data () {
    return {}
  }
}
</script>