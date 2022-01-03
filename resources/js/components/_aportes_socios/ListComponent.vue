<template>
    <div class="card">
      <div class="card-header text-right">
        <h4 class="card-title">Listado de Aportes {{nombre}}</h4>
        <button class="btn btn-danger" v-if="dependiente" @click="regresar">Regresar</button>
        <button class="btn btn-success" v-else @click="agregarRegistro"> <i class="fa fa-plus-circle"></i> Agregar Nuevo</button>
        <button class="btn btn-danger" @click="descargar()">Exportar Excel</button>
      </div>
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th>Fecha</th>
              <th>Cedula</th>
              <th>Nombre</th>
              <th>Pago</th>
              <th>Saldo</th>
              <th>Actualizacion</th>
              <th>Estado</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(aporte, index) in aportes" :key="aporte.id">
              <td>
                <span class="fw-bold">{{aporte.created_at}}</span>
              </td>
              <td>{{aporte.socio.documento}}</td>
              <td> {{aporte.socio.nombres}} </td>
              <td> {{aporte.total}} </td>
              <td> {{aporte.total}} </td>
              <td> {{aporte.updated_at}} </td>
              <td> <span :class="aporte.estado.class">{{aporte.estado.value}}</span> </td>
              <td>
                <i class="fa fa-edit btn btn-primary" v-on:click="editRegistro(index)"></i>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
</template>


<script>
export default {
    props: ['aportes', 'dependiente', 'nombre'],
    data() {
        return {
            descargando : ''
        }
    },
    methods: {
            regresar()
            {
                this.$emit('regresar');
            },
            editRegistro(index)
            {
                var aporte = this.aportes[index];
                this.$emit('edit', aporte);
            },
            agregarRegistro()
            {
                this.$emit('crear');
            },
            descargar()
            {
              axios.get('/export_aportes_socios').then((response) => {
                  this.descargando = response.data;
              });

              var url = '/documentos_imagenes/aportes_excels/'+this.descargando;

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
    }
}
</script>