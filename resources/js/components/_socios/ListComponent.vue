<template>
    <div class="card">
      <div class="card-header text-right">
        <h4 class="card-title">Socios</h4 >
        <button class="btn btn-primary float-right" v-on:click="crear()"> <i class="fa fa-plus"></i> Agregar Nuevo</button>
      </div>
    <el-row style="margin-left: 20px; margin-right:20px;" :gutter="20">
        <el-col :span="6" >
            <el-input @keyup.enter.native="Search" @clear="Search"
                    size="small"
                    placeholder="Documento"
                    prefix-icon="el-icon-search"
                    v-model="documento"
                    clearable
                    class="w-100">
            </el-input>
        </el-col>

        <el-col :span="8" >
            <el-input @keyup.enter.native="Search" @clear="Search"
                    size="small"
                    placeholder="Nombre"
                    prefix-icon="el-icon-search"
                    v-model="nombre"
                    clearable
                    class="w-100">
            </el-input>
        </el-col>

    </el-row>

    <el-table
    :data="socios"
    stripe
    style="width: 100%">
        <div slot="empty">
            <span>No se encontraron resultados <el-icon name="search"></el-icon></span>
        </div>
        <el-table-column type="expand">
            <template slot-scope="props">
                <el-row style="margin-left: 20px; margin-right: 20px; margin-bottom: 20px;" :gutter="20">
                    <el-col :span="6">
                        <el-button type="success" @click="registrosSocio(props.row.id, props.row.nombres)"> <i class="fa fa-list"></i> Mostrar Registro de Aportes</el-button>
                    </el-col>
                    <el-col :span="4">
                        <el-button style="width: 100%" type="primary" @click="editarSocio(props.row.id)"> <i class="fa fa-edit"></i> Editar Usuario</el-button>
                    </el-col>
                    <el-col :span="4">
                        <el-button style="width: 100%" type="primary" @click="dsecargarArchivo(props.row.ficha_pdf.url)"> <i class="fa fa-user"></i> Ficha Del Usuario</el-button>
                    </el-col>
                    <el-col :span="4">
                      <el-button style="width: 100%" type="primary" @click="dsecargarArchivo(props.row.documento_pdf.url)"> <i class="fa fa-file"></i> Documento</el-button>
                    </el-col>
                    <el-col :span="4">
                        <el-button style="width: 100%" type="primary" @click="aporteClick(props.row.id, props.row.banco.id)"> <i class="fa fa-plus-circle"></i> Nuevo Aporte</el-button>
                    </el-col>
                </el-row>

                <el-row style="margin-left: 20px; margin-right:20px;">
                    <el-descriptions class="margin-top" :column="2" border >
    <el-descriptions-item scope="props">
      <template slot="label">
        <i class="el-icon-user"></i>
        Cedula
      </template>
      {{props.row.documento}}
    </el-descriptions-item>
    <el-descriptions-item scope="props">
      <template slot="label">
        <i class="el-icon-wallet"></i>
        Cuenta
      </template>
      {{props.row.cuenta}}
    </el-descriptions-item>
    <el-descriptions-item scope="props">
      <template slot="label">
        <i class="el-icon-date"></i>
        Fecha de Registro
      </template>
      {{props.row.created_at}}
    </el-descriptions-item>
    <el-descriptions-item scope="props">
      <template slot="label">
        <i class="el-icon-date"></i>
        Ultima Actualizacion
      </template>
      {{props.row.updated_at}}
    </el-descriptions-item>
    
    
  </el-descriptions>
                </el-row>

            </template>
        </el-table-column>
    <el-table-column
      prop="nombres"
      label="Nombre">
    </el-table-column>
    <el-table-column
      prop="banco.siglas"
      label="Banco">
    </el-table-column>
    <el-table-column
      prop="saldo"
      label="Saldo">
      <template slot-scope="scope">
        $ {{scope.row.saldo}}
    </template>
    </el-table-column>

    <el-table-column 
    prop="pago" 
    label="Pago"
    >
    <template slot-scope="scope">
        <el-tag
          :type="scope.row.pago.color"
          disable-transitions>{{scope.row.pago.value}}</el-tag>
    </template>
    </el-table-column>

    <el-table-column 
    prop="estado" 
    label="Estado"
    >
    <template slot-scope="scope">
        <el-tag
          :type="scope.row.estado.color"
          disable-transitions>{{scope.row.estado.value}}</el-tag>
    </template>
    </el-table-column>

  </el-table>


    </div>
</template>

<script>
    export default {
        props: ['socios'],
        data()
        {
            return {
                estados: [
                    { id: 0, nombre: 'Todos', },
                    { id: 1, nombre: 'Activo', color: 'success' },
                    { id: 2, nombre: 'Inactivo', color: 'danger' },
                    { id: 3, nombre: 'Suspendido', color:'warning' },
                ],
                bancos: [
                    { id: 0,  nombre: 'Todos' },
                    { id: 1,  nombre: 'Bajo Convenio' },
                    { id: 2, nombre: 'Sin Convenio' }
                ],
                documento: '',
                nombre: '',
                estado: '',
                banco: '',
                socio: ''
            }
        },

        mounted() {

        },

        methods: {
            Search()
            {
                const params = {
                    nombre: this.nombre,
                    documento: this.documento
                }
                this.$emit('search', params);
            },
            crear(){
                this.$emit('crear');
            },
            filterTag(id, row) {
                return row.estado === id;
            },
            registrosSocio( id_socio, nombres )
            {
                this.$emit('listAportes', id_socio, nombres)
            },
            dsecargarArchivo( url )
            {
                axios({
                    url: url,
                    method: 'GET',
                    responseType: 'blob',
                }).then((response) => {
                     var fileURL = window.URL.createObjectURL(new Blob([response.data]));
                     var fileLink = document.createElement('a');
   
                     fileLink.href = fileURL;
                     fileLink.setAttribute('download', 'documento.pdf');
                     document.body.appendChild(fileLink);
   
                     fileLink.click();
                });
            },
            editarSocio( id )
            {
              console.log(id);
              
              axios.get('/api/getSocio/'+id).then((response) => {
                var socio = response.data
                this.$emit('editar', socio);
              });

            },
            aporteClick( id, banco_id )
            {
              var socio_id = id;
              this.$emit('createAporte', socio_id, banco_id);
            }
        },
    }
</script>
