<template>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Chats</div>
            <div class="card-body">
                  <single-messages-component> </single-messages-component>
                 <single-form-component>

                </single-form-component>
              
               
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('ChatComponent mounted.')
        }
    }
</script>
