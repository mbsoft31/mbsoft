<template>
<div>
  <nav class="navbar bg-teal">
    <div class="brand text-white">
      <button class="border text-teal-lighter border-teal-light p-2" data-target='#collapsed-sidebar' data-toggle="collapse" data-value="hidden">
      <span class="fa fa-exchange-alt"></span>
      </button>
      <span class="ml-2">Tailwind CSS</span>
    </div>
    <div class="block lg:hidden">
      <button class="menu-icon text-teal-lighter border-teal-light" data-target='#collapsed-nav' data-toggle="collapse" data-value="hidden">
      <span class="fa fa-bars"></span>
      </button>
    </div>
    <div id="collapsed-nav" class="nav hidden">
      
      <div class="text-sm lg:flex-grow m-0 p-0">
        <a href="#" class="nav-item text-teal-lighter">
          Docs
        </a>
        <a href="#" class="nav-item text-teal-lighter">
          Examples
        </a>
        <a href="#" class="nav-item text-teal-lighter">
          Blog
        </a>
      </div>
      <div class="text-sm">
        <a href="#" class="nav-item text-teal-lighter">
          Login
        </a>
        <a href="#" class="nav-item text-teal-lighter">
          Register
        </a>
      </div>
    </div>
  </nav>
  <div class="flex flex-wrap bg-grey-lighter">
    <aside class="sidebar bg-grey-darkest max-w-68 min-h-screen" id="collapsed-sidebar">
      <div class="flex items-center w-20 p-2 mb-2">
        <img src="https://via.placeholder.com/100" class="w-16 border rounded-full">
        <div class="flex flex-col justify-center text-base text-grey-lightest font-serif">
          <p class="text-lg">Bekhouche Mouadh</p>
          <p class="text-sm">Admin</p>
        </div>
      </div>
      <hr class="bg-black"/>
      <div class="side-menu mt-2">
        <router-link to="/login" class="list-item">
          <span class="fa fa-user-circle icon"></span>
          Login
          <span class="fa fa-arrow-down indicator"></span>
        </router-link>
        <a href="#" class="list-item">
          <span class="fa fa-user-circle icon"></span>
          item 2
          <span class="fa fa-arrow-down indicator"></span>
        </a>
        <a href="#" class="list-item">
          <span class="fa fa-user-circle icon"></span>
          item 3
          <span class="fa fa-arrow-down indicator"></span>
        </a>
        <a href="#" class="list-item">item 4</a>
      </div>
    </aside>
    <main class="flex flex-col flex-1 min-h-screen">
      <div class="container flex-1">
        <router-view />
      </div>
      <footer class="footer p-6 bg-grey-darkest text-center text-grey-lightest">
        <span>&copy;MBsoft.com 2018</span>
      </footer>
    </main>
  </div>
</div>
</template>
<script>

export default {
  name: 'App',
  data() {

  },
  methods: {

  },
  computed: {

  },
  watch: {

  }
}
</script>
<style lang="scss">
@import './../sass/_base.scss';
.navbar {
  @apply .flex .items-center .justify-between .flex-wrap;

  .brand {
    @apply .flex .items-center .flex-no-shrink .p-4;
  }

  .menu-icon {
    @apply .flex .items-center .p-2 .px-3 .mx-4 .border .rounded;

    &:hover {
      @apply .text-white .border-white;
    }
  }

  .nav {
    @apply .w-full .flex-grow
  }

  @screen lg {
    .nav {
      @apply .flex .items-center .w-auto;
    }
  }
}

.nav {
  .nav-item {
    @apply .block .p-4;
    text-decoration: none;
    &:hover {
      @apply .text-white;
    }
  }

  @screen lg {
    .nav-item {
      @apply .inline-block .mt-0;
      &:last-child {
        @apply .mr-0
      }
    }
  }
}


.sidebar {
  @apply .w-64 .self-stretch;
  flex-basis: 16rem;

  ul {
    @apply .list-reset;
  }

  .list-item {
    @apply .p-4 .text-grey-lighter .block .text-lg;
    text-decoration: none;
    &:hover {
      @apply .bg-grey-darker
    }
    .indicator {
      @apply .inline-block .float-right
    }
  }
}


</style>