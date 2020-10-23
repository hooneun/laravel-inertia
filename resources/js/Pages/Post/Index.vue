<template>
<div>
    <div v-for="(post, index) in posts" :key="index">
        {{ post.title }} - {{ post.body }}
    </div>
</div>
</template>
<script>
export default {
    props: ['posts']
}
</script>
