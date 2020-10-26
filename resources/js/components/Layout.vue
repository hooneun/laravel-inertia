<template>
  <main>
    <header>
      <inertia-link href="/users">Home</inertia-link>
      <inertia-link href="/posts">Post</inertia-link>
      <inertia-link href="/auth/login">Sign In</inertia-link>
      <inertia-link href="/users/create">Sign Up</inertia-link>
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
  watch: {
    title: {
      immediate: true,
      handler(title) {
        document.title = title;
      },
    },
  },
};
</script>
