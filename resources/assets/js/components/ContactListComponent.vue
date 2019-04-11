<template>
   
    <b-list-group>
        <contact-component  
        :conversation="item" 
        v-for="item in conversations" :key="item.id"
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
           
        }
    },
    mounted(){
        console.log(this.conversations)
        

    },
    methods:{
        selecConversation(conver){
            this.$emit('conversacionSelect',conver);
        }
    }
    
}
</script>