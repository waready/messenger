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
                :menssage="menssages">

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
        Echo.channel('example').
        listen('Messagesent',(data) => {
            const mensas = data.message;
            mensas.written_by_me = (this.userId == mensas.from_id);
            console.log(mensas)
            this.menssages.push(mensas);

        })
    },
    methods:{
        mostardatos(datos){

            this.selectConversation = datos;
            console.log(this.selectConversation);
            this.getMenssages();
        },
        getMenssages(){
            axios.get(`/api/messages?contact_id=${this.selectConversation.contact_id}`).then((response) =>{
            console.log(response.data);
            this.menssages = response.data;
        });
    }
    }
    
}
</script>