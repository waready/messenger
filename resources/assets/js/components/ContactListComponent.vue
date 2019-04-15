<template>
   
    <b-list-group>
        <contact-component  
        :conversation="item" 
        v-for="item in conversations" :key="item.id"
        :selected ="selectedConversationId === item.id"
        @click.native="selecConversation(item)"
        >

        </contact-component>
  
    </b-list-group>

</template>
<script>
export default {
    props:{
        conversations: Array,
    },
    data(){
        return{
           selectedConversationId: null
        }
    },
    mounted(){
        console.log(this.conversations)
        

    },
    methods:{
        selecConversation(conver){
            this.selectedConversationId = conver.id;
            this.$emit('conversacionSelect',conver);
        }
    }
    
}
</script>