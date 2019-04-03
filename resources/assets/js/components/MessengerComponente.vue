<template>
    <b-container fluid style="height: calc(100vh - 56px )">
        <b-row no-gutters>
            <b-col cols="4">            
                <contact-list-component v-on:conversacionSelect="mostardatos($event)">
                </contact-list-component>        
            </b-col>
            <b-col cols="8">            
                <active-conversation-component
                v-if="selectConversation"
                :contactId="selectConversation.contact_id"
                :name="selectConversation.contact_name"
                :menssage="menssages"
                @messageCreated="addMessage($event)">

                </active-conversation-component>                    
            </b-col>
        </b-row>
    
    </b-container>
</template>
<script>
export default {
    props:{
        userId: Number
    },

    data(){
        return {
            selectConversation:null,
            menssages:[]
        }
    },
    mounted(){
        
        console.log('tag', this.userId)
        Echo.private(`users.${this.userId}`).
        listen('Messagesent',(data) => {
            console.log('dadsad', data)
            const mensas = data.message;
            mensas.written_by_me = false;
            console.log(mensas)
            //this.menssages.push(mensas);
            this.addMessage(mensas);
        })
    },
    methods:{
        mostardatos(datos){

            this.selectConversation = datos;
            //console.log(this.selectConversation);
            this.getMenssages();
        },
        getMenssages(){
            axios.get(`/api/messages?contact_id=${this.selectConversation.contact_id}`).then((response) =>{
           // console.log(response.data);
            this.menssages = response.data;
            });
        },
        addMessage(menssage){
            console.error(menssage)
            if(this.selectConversation.contact_id == menssage.to_id){
                
                console.log("funciona", this.selectConversation.contact_id, menssage);
                this.menssages.push(menssage);
                //menssage.written_by_me = (this.userId == menssage.from_id);
                // console.log(" writen by me", menssage)
                //this.menssages.push(menssage);
            }
            else {
                console.log('este no es el user', this.selectConversation.contact_id)
            }
            
        }
    }
    
}
</script>