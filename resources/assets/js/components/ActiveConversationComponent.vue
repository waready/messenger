<template>
    <b-row>
        <b-col cols="8">
            <b-card
            footer-bg-variant="light"
            footer-border-variant="dark"
            title="Conversacion Activa"
            class="h-100">

            <b-card-body   class="header">
                <mensaje-conversation-component v-for="mensajes in menssage" 
                    :key="mensajes.id"
                    :writtenfromme="mensajes.written_by_me"
                    :image ="mensajes.written_by_me ? myImagen: imagen"
                    >
                    {{mensajes.content}}
                </mensaje-conversation-component> 
            </b-card-body>

            <div slot="footer">
                <b-form @submit.prevent="postMenssages" class="mb-0" autocomplete="off">
                    <b-input-group>
                        <b-form-input class="text-center"
                        type="text"
                        v-model="newMensaje"
                        placeholder="Escrive un mensaje">
                        </b-form-input>
                        <b-input-group-append>
                        <b-button type="submit" variant="primary">
                            Enviar
                        </b-button>
                        </b-input-group-append>                        
                    </b-input-group>    
                </b-form>
            </div> 
            </b-card>
        </b-col>
        <b-col cols="4" class ='my-2'>
            <b-img :src="imagen" rounded="circle"  width= '60' height= '60' class= 'm1'  />

            <p>{{name}}</p>
            <hr>
            <b-form-checkbox>
                descativar notificaciones
            </b-form-checkbox>
        </b-col>
    </b-row>
</template>
<script>
export default {
    props:{
        contactId:Number,
        name: String,
        imagen: String,
        menssage: Array,
        myImagen: String
    },
    mounted(){
      
    },
    data(){
        return {
          
            newMensaje:"",            
        }
    },
    methods:{
        postMenssages(){
            const params ={
                to_id:this.contactId,
                content:this.newMensaje,
            };
            axios.post('/api/messages', params).then((response)=>{
                if(response.data.success){
                    this.newMensaje="";
                    const message = response.data.message;
                    message.written_by_me = true;
                    this.$emit('messageCreated', response.data.message);
                }else {

                }
            
            })
        },
        scrollToBottom(){
            const el = document.querySelector('.header');
            el.scrollTop = el.scrollHeight;
        }
    },
    updated(){
        this.scrollToBottom();
        console.log('mensaje ha cambiado')
    }
  

}
</script>
<style>
    .header{
        max-height: calc( 100vh - 201px);
        overflow-y:auto  ;
    }
</style>