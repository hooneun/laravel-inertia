<template>
  <div>
    <form @submit.prevent="submit">
      <label for="title">Title:</label>
      <input id="title" v-model="post.title" />
      <label for="body">Body:</label>
      <input id="body" v-model="post.body" />
      <button type="button" @click="submit">Create</button>
    </form>
  </div>
</template>

<script>
export default {
  props: ["post"],
  methods: {
    submit() {
      this.$inertia.put(`/posts/${this.post.id}`, this.post);
    },
  },
  mounted() {
    console.log(this.post);
  },
};
</script>
