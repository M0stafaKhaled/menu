<template>
    <div class="message self">
        <strong class="user">
            <a :href="/single/+message.user.id">
            {{ message.user.name}}
            </a>
            </strong>
        <p class="body">{{ message.body }}</p>
    </div>
</template>
<script>
    export default {
        props: ['message'],
        mounted() {
            console.log('MessageComponent mounted.');
        }
    }
</script>
<style>
    .user {
        font-weight: 800;
    }
    .body {
        margin-bottom: 0;
        white-space: pre-wrap;
    }
    .message {
        border-bottom: 1px solid #000000
    }
    .self {
        background-color: #f0f0f0;
        padding: 10px;
    }
</style>
