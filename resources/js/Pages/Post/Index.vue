<template>
  <div>
    <div v-for="(post, index) in posts" :key="index">
      {{ post.title }} - {{ post.body }}
      <inertia-link
        method="get"
        as="button"
        type="button"
        :href="editAddredd(post.id)"
        >Update</inertia-link
      >
      <inertia-link
        method="delete"
        as="button"
        type="button"
        :href="deleteAddress(post.id)"
        >Delete</inertia-link
      >
    </div>

    <inertia-link href="/posts/create" method="get" as="button" type="button"
      >Create</inertia-link
    >
  </div>
</template>
<script>
export default {
  props: ["posts"],
  methods: {
    deleteAddress(id) {
      return `/posts/${id}`;
    },
    editAddredd(id) {
      return `/posts/${id}/edit`;
    },
  },
};
</script>
