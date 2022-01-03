<template>
    <div class="card">
      <div class="card-header text-right">
        <h4 class="card-title">Listado de Proveedores</h4>
        <button class="btn btn-primary float-right" v-on:click="crear()"> <i class="fa fa-plus"></i> Agregar Nuevo</button>
        <button class="btn btn-danger float-right" v-on:click="descargar()"> <i class="fa fa-list"></i> Exportar</button>
      </div>
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th>Cedula / RUC</th>
              <th>Razon Social</th>
              <th>Telefono</th>
              <th>Correo</th>
              <th>Estado</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(proveedor, index) in proveedores" :key="proveedor.id">
              <td>
                <span class="fw-bold">{{proveedor.documento}}</span>
              </td>
              <td>{{proveedor.razon_social}}</td>
              <td> {{proveedor.telefono}} </td>
              <td> {{proveedor.correo}} </td>
              <td>
                  <span class="badge rounded-pill badge-light-success me-1" v-if="proveedor.status === true">Activo</span>
                  <span class="badge rounded-pill badge-light-danger me-1" v-else>Inactivo</span>
              </td>
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
        props: ['proveedores'],
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
                let proveedor = this.proveedores[index];
                this.$emit('editar', proveedor)
            },
            showRegistro(index){
                let proveedor = this.proveedores[index];
                console.log(proveedor);
                this.$emit('show', proveedor);
            },
            crear()
            {
                this.$emit('create');
            },
            descargar()
            {
              console.log("ejecutando");
              axios.get('/export_proveedores').then((response) => {
                  this.descargando = response.data;
              });

              var url = '/documentos_imagenes/proveedores_excels/'+this.descargando;

              axios({
                    url: url,
                    method: 'GET',
                    responseType: 'blob',
                }).then((response) => {
                     var fileURL = window.URL.createObjectURL(new Blob([response.data]));
                     var fileLink = document.createElement('a');
   
                     fileLink.href = fileURL;
                     fileLink.setAttribute('download', this.descargando);
                     document.body.appendChild(fileLink);
   
                     fileLink.click();
                });
            }
        },

    }
</script>
