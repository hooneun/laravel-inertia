<template>
  <div>
    <h1>Chat</h1>

    <div>
      <ChatMessage :messages="messages"></ChatMessage>
    </div>

    <div>
      <ChatForm @messagesent="addMessage" />
    </div>
  </div>
</template>
<script>
import ChatMessage from "../../components/ChatMessages";
import ChatForm from "../../components/ChatForm";
export default {
  data() {
    return {
      messages: [],
    };
  },
  components: { ChatMessage, ChatForm },
  methods: {
    fetchMessages() {
      axios.get("/chats/messages").then((res) => {
        this.messages = res.data;
      });
    },
    addMessage(message) {
      console.log(message);
      this.messages.push(message);

      axios.post("/chats/messages", message).then((res) => {
        console.log(res.data);
      });
    },
    chatConnect() {
      Echo.private("chat").listen("MessageSent", (e) => {
        this.messages.push({
          message: e.message.message,
          user: e.user,
        });
      });
    },
  },
  created() {
    this.fetchMessages();
    // this.chatConnect();
  },
};
</script>
