<template>
<div class="navbar-custom-menu" style="margin-left: 75%">
<ul class="nav navbar-nav">
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-bell" style="font-size: 18px">
            <span class="badge badge-danger" style="margin-top: -15%">11</span>
            </i>
            
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
        </div>
        </li>
    

</ul>
</div>

</template>



<script>
    export default {
        props:[],

        data(){
            return{

                notification:[
                    
                ]
                
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
