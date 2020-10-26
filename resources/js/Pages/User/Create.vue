<template>
  <div>
    <form @submit.prevent="submit">
      <label for="name">Name:</label>
      <input id="name" v-model="form.name" />
      <label for="email">Eamil:</label>
      <input id="email" v-model="form.email" />
      <label for="password">Password:</label>
      <input id="password" v-model="form.password" />
      <button type="button" @click="submit">Create</button>
    </form>
  </div>
</template>
<script>
export default {
  data() {
    return {
      form: {
        email: null,
        password: null,
        name: null,
      },
    };
  },
  methods: {
    submit() {
      this.$inertia.post("/users", this.form);
    },
  },
};
</script>
