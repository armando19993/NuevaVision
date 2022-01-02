<template>
    <div class="card">
      <div class="card-header text-right">
        <h4 class="card-title">Listado de Planes de Cuenta</h4>
        <button class="btn btn-primary float-right" data-bs-toggle="modal" data-bs-target="#createPlan"> <i class="fa fa-plus"></i> Agregar Nuevo</button>
      </div>
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th>Codigo</th>
              <th>Cedula Presupuestaria</th>
              <th>Cuenta</th>
              <th>Dbe. Inicial</th>
              <th>Hber. Inicial</th>
              <th>Debe</th>
              <th>Haber</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(plan, index) in planes" :key="plan.id">
              <td>
                <span class="fw-bold">{{plan.codigo}}</span>
              </td>
              <td>{{plan.cedula_presupuestaria}}</td>
              <td> {{plan.cuenta}} </td>
              <td> {{plan.debe_inicial}} </td>
              <td> {{plan.haber_inicial}} </td>
              <td> {{plan.debe}} </td>
              <td> {{plan.haber}} </td>
              <td>
                <i class="fa fa-edit btn btn-primary" v-on:click="editRegistro(index)"></i>
                <i class="fa fa-eye btn btn-info" v-on:click="showRegistro(index)"></i>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
</template>

<script>
    export default {
        props: ['planes'],
        data()
        {
            return {
                data_usuario_edit: '',
                modeEdit: 0
            }
        },

        mounted() {

        },

        methods: {
            editRegistro(index){
                console.log("aqui");
                let plan = this.planes[index];
                console.log(plan);
                this.$emit('editar', plan)
            },
            showRegistro(index){
                let plan = this.planes[index];
                console.log(plan);
                this.$emit('show', plan);
            }
        }
    }
</script>
