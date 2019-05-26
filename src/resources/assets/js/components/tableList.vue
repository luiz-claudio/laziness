<template>

    <div>
        <br>
        <div class="panel panel-default">
        <div class="panel-heading"><b></b>
            <div class="panel-body">
        <div class="row">
         <div class="form-group col-md-3 col-lg-offset-7">
            <input type="search" class="form-control" placeholder="Search" v-model="search" />
        </div>


            <!--<div class="form-group col-md-2">
                <a :href="newitem"> <button v-if="newitem">New </button></a>
            </div>-->


        </div>



            <div class="row">
                <div class=" form-group  col-md-10 col-lg-offset-1" >
                    <table class="table table-striped table-hover">
            <thead>

            <tr>
             <th style="cursor: pointer" v-on:click="orderCol(index)" v-for="(t,index) in title">  {{t}}  </th>
                  <th v-if=" edit || del " >Action</th>

            </tr>
            </thead>
            <tbody>
          
            <tr v-for="item in list">
                <th v-for="(i,index,key) in item">
                    <p v-if="index == 'id'">{{item["codigo"]}}{{i}}</p>
                    <p v-if="index != 'codigo' && index != 'id' && index != 'progresso'">{{i}}</p>
                    <div v-if="index == 'progresso'" class="progress-bar" role="progressbar" :style="'width:'+ i+'%;'" :aria-valuenow="i" aria-valuemin="0" aria-valuemax="100">{{i}}%</div>

                    <!--<div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>                        
                            </p> -->

                </th>

                <th>
                    <a v-if="edit" :href="edit+item.id"> Edit |</a>
                    <a v-if="del" :href="del+item.id"> Delete</a>
                </th>

            </tr>

            </tbody>
        </table>

                 </div>
            </div>
        </div>
        </div>
    </div>
    </div>




</template>

<script>

    export default {
        props: ['title', 'items','order','ordercol', 'newitem', 'edit', 'del','projetos'],

        data: function () {
            return {

                search:'',
                orderAux:this.order || "asc",
                orderColAux:this.ordercol || 0
            }


        },
        methods:{
          orderCol:function (col) {
              this.orderColAux = col;
              if(this.orderAux.toLowerCase() =="asc"){
                  this.orderAux='desc';
              }else{
                  this.orderAux ='asc';
              }
          }

        },

        computed:{

            list:function() {

                let order = this.orderAux;
                let orderCol = this.orderColAux;
                let lista =  this.items.data;
                order = order.toLowerCase();
                orderCol = parseInt(orderCol);

                if (order == "asc") {
                    lista.sort(function (a, b) {
                        if (Object.values(a)[orderCol] > Object.values(b)[orderCol]) {
                            return 1;
                        }
                        if (Object.values(a)[orderCol] < Object.values(b)[orderCol]) {
                            return -1;
                        }
                        return 0;

                });

                } else {
                    lista.sort(function (a, b) {
                        if (Object.values(a)[orderCol] < Object.values(b)[orderCol]) {
                            return 1;
                        }
                        if (Object.values(a)[orderCol] > Object.values(b)[orderCol]) {
                            return -1;
                        }
                        return 0;

                    });

                }

                if (this.search) {
                    return this.projetos.filter(res => {
                        res = Object.values(res);
                        for (let k = 0; k < res.length; k++) {
                            if ((res[k] + "").toLowerCase().indexOf(this.search.toLowerCase()) >= 0) {
                                return true;
                            }
                        }
                        return false;

                    });

                }


                    return lista;
                }


        }
    }

</script>


