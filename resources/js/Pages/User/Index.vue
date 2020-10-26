<template>
  <div>
    <h1 v-if="$page.props.isLoggedIn" class="text-blue-500">
      Hello, {{ $page.props.user.name }}, Your Email:
      {{ $page.props.user.email }}
    </h1>
    <h1 v-else>Login!!</h1>
  </div>
</template>
