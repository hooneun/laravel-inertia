<template>
  <div>
    <input
      type="text"
      id="message"
      placeholder="message here..."
      v-model="newMessage"
      @keyup.enter="sendMessage"
    />

    <button type="button" @click="sendMessage">Send</button>
  </div>
</template>
<script>
export default {
  data() {
    return {
      newMessage: "",
    };
  },
  methods: {
    sendMessage() {
      this.$emit("messagesent", {
        // user: this.user,
        user: this.$page.props.user,
        message: this.newMessage,
      });
      this.newMessage = "";
    },
  },
};
</script>
