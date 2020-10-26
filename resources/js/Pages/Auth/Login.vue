<template>
  <div>
    <form @submit.prevent="submit">
      <label for="email">Email:</label>
      <input type="email" id="email" v-model="form.email" required />
      <label for="password">Password:</label>
      <input type="password" id="password" v-model="form.password" required />
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
      },
    };
  },
  methods: {
    submit() {
      this.$inertia.post("/auth/login", this.form);
    },
  },
};
</script>
