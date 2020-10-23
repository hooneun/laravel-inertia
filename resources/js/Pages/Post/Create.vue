<template>
  <div>
    <form @submit.prevent="submit">
      <label for="title">Title:</label>
      <input id="title" v-model="form.title" />
      <label for="body">Body:</label>
      <input id="body" v-model="form.body" />
      <button type="button" @click="submit">Create</button>
    </form>
  </div>
</template>
<script>
export default {
  data() {
    return {
      form: {
        title: null,
        body: null,
      },
    };
  },
  methods: {
    submit() {
      this.$inertia.post("/posts", this.form);
    },
  },
};
</script>
