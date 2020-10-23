<template>
<div>
    <h1 class="text-blue-500">Hello, {{ name }}, Your Email: {{ email }}</h1>
</div>
</template>
<script>

export default {
    props: ['name', 'email']
}
</script>
