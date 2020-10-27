<template>
  <main>
    <header>
      <inertia-link href="/users">Home</inertia-link>
      <inertia-link href="/posts">Post</inertia-link>
      <inertia-link href="/auth/login" :class="{ hidden: isLoggedIn }"
        >Sign In</inertia-link
      >
      <inertia-link href="/users/create" :class="{ hidden: isLoggedIn }"
        >Sign Up</inertia-link
      >
      <inertia-link href="/auth/logout" method="post" as="button" type="button"
        >Sign Out</inertia-link
      >
    </header>
    <article>
      <slot />
    </article>
  </main>
</template>

<script>
export default {
  props: {
    title: String,
  },
  computed: {
    isLoggedIn() {
      return this.$page.props.isLoggedIn;
    },
  },
  mounted() {
    // console.log(Echo);
    // Echo.channel("TestEvent").listen("TestEvent", (e) => {
    //   console.log(e);
    // });
  },
};
</script>
