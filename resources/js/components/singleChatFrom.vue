<template>
    <form class="form">
        <textarea
            id="body"
            cols="28"
            rows="5"
            class="form-input"
            @keydown="typing"
            v-model="body">
        </textarea>
        <span class="notice">
            Hit Return to send a message
        </span>
    </form>
</template> 
<script>

            let url = new URL(window.location).href;
             let id = url.substring(url.lastIndexOf('/')+1)
                        
    console.log(id);
    console.log(url);
    import Event from '../event.js';
    export default {
        data() {
            return {
                body: null
            }
        },
        mounted() {
            console.log('ChatFormComponent mounted.');
        },
        methods: {
            typing(e) {
                if(e.keyCode === 13 && !e.shiftKey) {
                    e.preventDefault();
                    this.sendMessage();
                }        
            },
            sendMessage() {
                if(!this.body || this.body.trim() === '') {
                    return
                }
                let messageObj = this.buildMessage();
                Event.$emit('added_message', messageObj);
                axios.post('/singleMessage/'+id, {
                    body: this.body.trim(),
                    destination_id:id,
                }).catch(() => {
                    console.log('failed');
                });
                this.body = null;
            },
            buildMessage() {
                return {
                    id: Date.now(),
                    body: this.body,
                    selfMessage: true,
                    user: {
                        name: Laravel.user.name
                    }
                }
            }
        }
    }
</script>

<style>
    .form {
        padding: 8px;
    }
    .form-input {
        width: 100%;
        border: 1px solid #d3e0e9;
        padding: 5px 10px;
        outline: none;
    }
    .notice {
        color: #aaa
    }
    
</style>