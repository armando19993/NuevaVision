 <template>
 <div class="card">
<form-wizard scope="props" @on-complete="newRegistro">
    <h2 slot="title">Registro de Socio</h2>
  <tab-content title="Datos del Socio">
   <el-row :gutter="20">
       <el-col :span="6">
           <el-select class="w-100" v-model="tipo_documento" placeholder="Tipo de Documento" :filterable="true">
            <el-option
                v-for="item in tipos_documentos"
                :key="item.id"
                :label="item.nombre"
                :value="item.id">
            </el-option>
        </el-select>
       </el-col>
       <el-col :span="6">
           <el-input v-model="documento" placeholder="Documento"> </el-input>
       </el-col>
       <el-col :span="12">
           <el-input v-model="nombres" placeholder="Nombres"> </el-input>
       </el-col>
   </el-row>

   <el-row :gutter="20">
       <el-col :span="12">
           <el-input v-model="direccion" placeholder="Direccion"> </el-input>
       </el-col>
       <el-col :span="6">
           <el-input v-model="telefono" placeholder="Telefono"> </el-input>
       </el-col>
       <el-col :span="6">
           <el-input v-model="movil" placeholder="Movil"> </el-input>
       </el-col>
   </el-row>

    <el-row :gutter="20">
       <el-col :span="12">
           <el-input v-model="correo" placeholder="Correo"> </el-input>
       </el-col>
       <el-col :span="3">
           Mies: 
           <el-switch v-model="mies"></el-switch>
       </el-col>
       <el-col :span="3">
           MT: 
           <el-switch v-model="mt"></el-switch>
       </el-col>
       <el-col :span="6">
        <el-select class="w-100" v-model="fuerza" placeholder="Fuerza" :filterable="true">
            <el-option
                v-for="item in fuerzas"
                :key="item.id"
                :label="item.nombre"
                :value="item.id">
            </el-option>
        </el-select>
       </el-col>
   </el-row>
   <el-row :gutter="20">
       <el-col :span="12">
           <el-input v-model="observaciones" placeholder="Observaciones"> </el-input>
       </el-col>
       <el-col :span="6">
           <el-select class="w-100" v-model="estado" placeholder="Estado" :filterable="true">
            <el-option
                v-for="item in estados"
                :key="item.id"
                :label="item.nombre"
                :value="item.id">
            </el-option>
        </el-select>
       </el-col>
       <el-col :span="6">
            <el-upload
            class="upload-demo"
            action="/api/subir-imagen"
            :file-list="fileList"
            :on-success="updatePerfil">
            <el-button size="small" type="primary">Clic para subir Foto del Socio</el-button>
            <div slot="tip" class="el-upload__tip">Solo archivos jpg/png con un tamaño menor de 500kb</div>
            </el-upload>
       </el-col>
   </el-row>
  </tab-content>

  <tab-content title="Datos del Contacto de Emergencia">
   <el-row :gutter="20">
       <el-col :span="12">
           <el-input v-model="nombre_referencia" placeholder="Nombre"> </el-input>
       </el-col>
       <el-col :span="12">
           <el-input v-model="movil_referencia" placeholder="Movil"> </el-input>
       </el-col>
   </el-row>
  </tab-content>

  <tab-content title="Informacion Financiera">
   <el-row :gutter="20">
       <el-col :span="12">
           <el-input v-model="cuenta" placeholder="Cuenta"> </el-input>
       </el-col>
       <el-col :span="12">
            <el-select class="w-100" v-model="banco" placeholder="Banco" :filterable="true">
            <el-option
                v-for="item in bancos"
                :key="item.id"
                :label="item.nombre"
                :value="item.id">
                 <span style="float: left">{{ item.nombre }}</span>
                <span style="float: right; color: #8492a6; font-size: 13px">{{ item.siglas }}</span>
            </el-option>
        </el-select>
       </el-col>
   </el-row>
  </tab-content>

  <tab-content title="Documento del Socio">
   <el-row :gutter="20">
       <el-col :span="12">
           <el-upload
            class="upload-demo"
            action="/api/subir-documento"
            :on-success="updatePdf"
            :file-list="fileList2">
            <el-button size="small" type="primary">Clic para subir Documento</el-button>
            </el-upload>
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
        data()
        {
            return {
                tipos_documentos: [
                    { id: 1, nombre: 'CEDULA' },
                    { id: 2, nombre: 'RUC' },
                    { id: 3, nombre: 'PASAPORTE' },
                ],
                fuerzas: [
                    { id: 1, nombre: "MILITAR" },
                    { id: 2, nombre: "AEREA" },
                    { id: 3, nombre: "MARITIMA" },
                ],
                estados: [
                    { id: 0, nombre: 'Todos', },
                    { id: 1, nombre: 'Activo', },
                    { id: 2, nombre: 'Inactivo', },
                    { id: 3, nombre: 'Supendido', },
                ],
                fuerza: '',
                mies: false,
                mt: false,
                bancos: [],
                banco: '',
                cuenta: '',
                tipo_documento: '',
                documento: '',
                nombres: '',
                direccion: '',
                telefono: '',
                movil: '',
                correo: '',
                nombre_referencia: '',
                movil_referencia: '',
                observaciones: '',
                fileList: [],
                fileList2: [],
                perfil: '',
                pdf: '',
                estado: ''

            }
        },

        mounted() {
            axios.get('/api/planes-cuenta').then((response) => {
                this.cuentas = response.data
            });
            axios.get('/api/bancos').then((response) =>
            {
                this.bancos = response.data;
                console.log(this.bancos);
            });
        },

        methods: {
            newRegistro() {
                const params = {
                    banco: this.banco,
                    cuenta: this.cuenta,
                    tipo_documento: this.tipo_documento,
                    documento: this.documento,
                    nombres: this.nombres,
                    direccion: this.direccion,
                    telefono: this.telefono,
                    movil: this.movil,
                    correo: this.correo,
                    nombre_referencia: this.nombre_referencia,
                    movil_referencia: this.movil_referencia,
                    observaciones: this.observaciones,
                    perfil: this.perfil,
                    pdf: this.pdf,
                    fuerza: this.fuerza,
                    estado: this.estado,
                    mies: this.mies,
                    mt: this.mt,
                    user_id: $("#usuario_id").val(),
                }

                console.log(params);

                axios.post('/api/socios', params).then((response) => {
                    console.log(response.data);
                    this.$notify.success({
                    title: 'Procesado!',
                    message: 'Registro Creado Correctamente',
                    offset: 100
                    });
                    this.$emit('new');
                })
            },
            cargar()
            {
                console.log("Cargando");
            },
            updatePdf( res, file )
            {
                this.pdf = res;
            },
            updatePerfil( res, file )
            {
                this.perfil = res;
            }
        }
    }
</script>
