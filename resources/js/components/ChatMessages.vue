<template>
  <ul>
    <li v-for="message in messages" :key="message.id">
      {{ message.user.name }}: {{ message.message }}
    </li>
  </ul>
</template>
<script>
export default {
  props: ["messages"],
};
</script>
