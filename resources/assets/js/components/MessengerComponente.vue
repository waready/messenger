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
                :name="selectConversation.contact_name">

                </active-conversation-component>                    
            </b-col>
        </b-row>
    </b-container>
</template>
<script>
export default {
    data(){
        return {
            selectConversation:null
        }
    },
    methods:{
        mostardatos(datos){

            this.selectConversation = datos;
            console.log(this.selectConversation);
        }
    }
    
}
</script>