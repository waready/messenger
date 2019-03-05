<template>
<div>
    <b-form class="my-3 px-2">
        <b-form-input  class="text-center" type="text"
        placeholder="Buscar contacto....">
        </b-form-input>
    </b-form>
    <b-list-group>
        <contact-component  
        :conversation="item" 
        v-for="item in conversaciones" :key="item.id"
        @click.native="selecConversation(item)"
        >

        </contact-component>
  
    </b-list-group>
</div>
</template>
<script>
export default {
    data(){
        return{
            conversaciones:[]
        }
    },
    mounted(){
        this.getConversation();

    },
    methods:{
        getConversation(){
            axios.get('api/conversations').then((response)=>{
               // console.log( "conversasafshaj",response.data)
                this.conversaciones = response.data;
            })
        },
        selecConversation(conver){
            this.$emit('conversacionSelect',conver);
        }
    }
    
}
</script>