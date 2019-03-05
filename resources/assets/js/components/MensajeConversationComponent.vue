<template>
    <b-media :right-align="writtenfromme" vertical-align="center" class="mb-2">
        <b-img rounded="circle" slot="aside" blank blank-color="#ccc" width="48" alt="placeholder" />
        
        <b-card>
            <slot>
                {{contenido}}
            </slot>
            
        </b-card>             
    
    </b-media>
</template>
<script>
export default {
    props:{
        writtenfromme:Boolean,
    },

    data(){
        return{
            contenido:"como estas hoy"
        }

    },
    mounted(){
        //console.log('valor de witten', this.writtenfromme)
    }
}
</script>