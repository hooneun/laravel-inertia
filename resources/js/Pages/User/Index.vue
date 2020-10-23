<template>
<div>
    <h1>Hello, {{ name }}, Your Email: {{ email }}</h1>
</div>
</template>
<script>
export default {
    props: ['name', 'email']
}
</script>
