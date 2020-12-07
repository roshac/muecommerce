<template>
    <div class="tracking-wrap">
<div class="step " v-if="steps == 1">
            <span class="icon"> <i class="fa fa-check" style="margin-top: 35%"></i> </span>
            <span class="text">Order confirmed</span>
        </div>
        <div class="step " v-if="steps == 1">
            <span class="icon"> <i class="fa fa-user" style="margin-top: 35%"></i> </span>
            <span class="text">Picked by Courier</span>
        </div>
        <div class="step " v-if="steps == 1">
            <span class="icon"> <i class="fa fa-truck" style="margin-top: 35%"></i> </span>
            <span class="text">On the way</span>
        </div>
        <div class="step " v-if="steps == 1">
            <span class="icon"> <i class="fa fa-box" style="margin-top: 35%"></i> </span>
            <span class="text">Ready for pickup</span>
       
        </div>    

            <div class="step active" v-if="steps == 2">
            <span class="icon"> <i class="fa fa-check" style="margin-top: 35%"></i> </span>
            <span class="text">Order confirmed</span>
        </div>
        <div class="step " v-if="steps == 2">
            <span class="icon"> <i class="fa fa-user" style="margin-top: 35%"></i> </span>
            <span class="text">Picked by Courier</span>
        </div>
        <div class="step " v-if="steps == 2">
            <span class="icon"> <i class="fa fa-truck" style="margin-top: 35%"></i> </span>
            <span class="text">On the way</span>
        </div>
        <div class="step " v-if="steps == 2">
            <span class="icon"> <i class="fa fa-box" style="margin-top: 35%"></i> </span>
            <span class="text">Ready for pickup</span>
       
        </div>    
    
     
            <div class="step active" v-if="steps == 3">
            <span class="icon"> <i class="fa fa-check" style="margin-top: 35%"></i> </span>
            <span class="text">Order confirmed</span>
            </div>
            <div class="step active" v-if="steps == 3">
            <span class="icon"> <i class="fa fa-user" style="margin-top: 35%"></i> </span>
            <span class="text">Picked by Courier</span>
            </div>
            <div class="step " v-if="steps == 3">
            <span class="icon"> <i class="fa fa-truck" style="margin-top: 35%"></i> </span>
            <span class="text">On the way</span>
         </div>
        <div class="step " v-if="steps == 3">
            <span class="icon"> <i class="fa fa-box" style="margin-top: 35%"></i> </span>
            <span class="text">Ready for pickup</span>
       
        </div>   

         <div class="step active" v-if="steps == 4">
            <span class="icon"> <i class="fa fa-check" style="margin-top: 35%"></i> </span>
            <span class="text">Order confirmed</span>
            </div>
            <div class="step active" v-if="steps == 4">
            <span class="icon"> <i class="fa fa-user" style="margin-top: 35%"></i> </span>
            <span class="text">Picked by Courier</span>
            </div>
            <div class="step active" v-if="steps == 4">
            <span class="icon"> <i class="fa fa-truck" style="margin-top: 35%"></i> </span>
            <span class="text">On the way</span>
         </div>
        <div class="step " v-if="steps == 4">
            <span class="icon"> <i class="fa fa-box" style="margin-top: 35%"></i> </span>
            <span class="text">Ready for pickup</span>
       
        </div>   

         <div class="step active" v-if="steps == 5">
            <span class="icon"> <i class="fa fa-check" style="margin-top: 35%"></i> </span>
            <span class="text">Order confirmed</span>
            </div>
            <div class="step active" v-if="steps == 5">
            <span class="icon"> <i class="fa fa-user" style="margin-top: 35%"></i> </span>
            <span class="text">Picked by Courier</span>
            </div>
            <div class="step active" v-if="steps == 5">
            <span class="icon"> <i class="fa fa-truck" style="margin-top: 35%"></i> </span>
            <span class="text">On the way</span>
         </div>
        <div class="step active" v-if="steps == 5">
            <span class="icon"> <i class="fa fa-box" style="margin-top: 35%"></i> </span>
            <span class="text">Ready for pickup</span>
       
        </div>   
         
       </div>


</template>



<script>
    export default {
        props:['status_id','order_id','status_name'],

        data(){
            return{
                steps: this.status_id,
                status: this.status_name
            }
        },


        mounted() {
            Echo.channel('order-tracker.'+this.order_id)
            .listen('OrderChange', (order) => {
                // console.log(order);
                 this.steps = order.status_id
            });
        }
    }
</script>
