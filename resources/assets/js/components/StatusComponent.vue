<template>
    <div>
        <b-img rounded="circle" blank width= '10' height= '10'  
        :blank-color=" online ? 'green' : 'gray'" alt="Center image" 
        :title="online ? 'conectado' : 'desconectado'"/>
    </div>
</template>

<script>
    export default {
        props:{ 
            online:Boolean,
            
        },
        data(){
            return{
        
            }
        },
        mounted() {
           
        },
        
    }
</script>