<template>
  <div>
    <div v-for="(post, index) in posts" :key="index">
      {{ post.title }} - {{ post.body }}
    </div>

    <inertia-link href="/posts/create" method="get" as="button" type="button">Create</inertia-link>
  </div>
</template>
<script>
export default {
  props: ["posts"],
};
</script>
