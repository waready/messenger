<template>
    <b-media :right-align="writtenfromme" vertical-align="center" class="mb-2">
        <b-img  :src="image" rounded="circle" slot="aside" width="48" height="48" alt="placeholder" />
        
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
        image:String,
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