 <template>
 <div class="card">
<form-wizard scope="props" @on-complete="newRegistro">
    <h2 slot="title">Registro de Proveedor</h2>
  <tab-content title="Datos del Proveedor">
   <el-row :gutter="20">
       <el-col :span="6">
           <el-input v-model="documento" placeholder="Documento"> </el-input>
       </el-col>
       <el-col :span="12">
           <el-input v-model="razon_social" placeholder="Razon Social"> </el-input>
       </el-col>
       <el-col :span="6">
           <el-input v-model="telefono" placeholder="Telefono"> </el-input>
       </el-col>
   </el-row>

   <el-row :gutter="20">
       <el-col :span="6">
           <el-input v-model="movil" placeholder="Movil"> </el-input>
       </el-col>
       <el-col :span="12">
           <el-input v-model="correo" placeholder="Correo"> </el-input>
       </el-col>
   </el-row>

    <el-row :gutter="20">
       <el-col :span="24">
           <el-input v-model="observaciones" placeholder="Observaciones"> </el-input>
       </el-col>
   </el-row>

  </tab-content>
  <tab-content title="Datos de Factura">
      <el-row :gutter="20">
       <el-col :span="4">
           Obligado:
           <el-switch v-model="obligado"></el-switch>
       </el-col>
       <el-col :span="6">
           <el-input v-model="serie" placeholder="Serie"> </el-input>
       </el-col>
       <el-col :span="6">
           <el-input v-model="secuencia" placeholder="Secuencia"> </el-input>
       </el-col>
       <el-col :span="8">
           <el-input v-model="autorizacion" placeholder="# Autorizacion"> </el-input>
       </el-col>
        </el-row>

        <el-row :gutter="20">
       <el-col :span="8">
           <span class="demonstration">Fecha de Caducidad</span>
            <el-date-picker
            v-model="caducidad"
            type="date"
            placeholder="Seleccione Fecha">
            </el-date-picker>
       </el-col>
        </el-row>
   </tab-content>
   <tab-content title="Credito">
     <el-row :gutter="20">
       <el-col :span="4">
           Credito:
           <el-switch v-model="credito"></el-switch>
       </el-col>
       <el-col :span="10">
           <el-input v-model="tiempo_credito" placeholder="Tiempo de Credito"> </el-input>
       </el-col>
        </el-row>
   </tab-content>
   <tab-content title="Contabilidad">
       <el-row :gutter="20">
           <el-col :span="4">
               Cuenta
           </el-col>
           <el-col :span="20">
               <v-select label="cuenta" :options="cuentas" :reduce="(cuenta) => cuenta.id" :value.sync="cuenta.id" v-model="cuenta" ></v-select>
           </el-col>
       </el-row>
   </tab-content>
</form-wizard>
</div>
</template>

<style>
  .el-row {
    margin-bottom: 20px;
  }
</style>

<script>
    export default {
        props: {
            title: {
                    type: String,
                    default: 'Nuevo Proveedor'
                },
                subtitle: {
                    type: String,
                    default: ''
                },
                nextButtonText: {
                    type: String,
                    default: 'Siguiente'
                },
                backButtonText: {
                    type: String,
                    default: 'Anterior'
                },
                finishButtonText: {
                    type: String,
                    default: 'Finalizar'
                },
        },
        data()
        {
            return {
                documento: '',
                razon_social: '',
                telefono: '',
                movil: '',
                correo: '',
                status: '',
                cuentas: [],
                obligado: false,
                serie: '',
                secuencia: '',
                autorizacion: '',
                caducidad: '',
                credito: false,
                tiempo_credito: '',
                cuentas: [],
                cuenta: '',
                observaciones : ''
            }
        },

        mounted() {
            axios.get('/api/planes-cuenta').then((response) => {
                this.cuentas = response.data
            });
        },

        methods: {
            newRegistro() {
                const params = {
                    documento : this.documento,
                    razon_social : this.razon_social,
                    telefono : this.telefono,
                    movil : this.movil,
                    correo : this.correo,
                    status : this.status,
                    obligado : this.obligado,
                    serie : this.serie,
                    secuencia : this.secuencia,
                    autorizacion : this.autorizacion,
                    caducidad : this.caducidad,
                    credito : this.credito,
                    cuenta : this.cuenta,
                    tiempo_credito: this.tiempo_credito,
                    creador_id: $("#usuario_id").val(),
                    observaciones: this.observaciones,
                }

                axios.post('/api/proveedores', params).then((response) => {
                    console.log(response.data);
                    const h = this.$createElement;

                    this.$notify.success({
                    title: 'Procesado!',
                    message: 'Registro Creado Correctamente',
                    offset: 100
                    });
                    this.$emit('new');
                })
            }
        }
    }
</script>
