<template>
    <div class="card">
    <div class="card-header">
        <h3>Agregar Proceso</h3>
        <button class="btn btn-warning text-right" @click="regresar"> Regresar</button>
    </div>
    <div class="card-body">
        <el-row :gutter="20">
            <el-col :span="12" style="margin-bottom: 20px;">
                <el-label>Socio</el-label>
                <el-select class="w-100" v-model="socio" placeholder="Socio" :filterable="true">
                    <el-option
                        v-for="item in socios"
                        :key="item.id"
                        :label="item.nombres"
                        :value="item.id">
                    </el-option>
                </el-select>
            </el-col>
            <el-col :span="8">
                <el-label>Socio</el-label>
                <el-select class="w-100" v-model="lugar" placeholder="Lugar" :filterable="true">
                    <el-option
                        v-for="item in lugares"
                        :key="item.id"
                        :label="item.nombre"
                        :value="item.nombre">
                    </el-option>
                </el-select>
            </el-col>
            <el-col :span="4">
                <el-label>Valor</el-label>
                <el-input placeholder="Valor" v-model="valor"></el-input>
            </el-col>
            <el-col :span="24" style="margin-bottom: 20px;">
                <el-label>Detalle</el-label>
                <el-input placeholder="Detalle" v-model="detalle"></el-input>
            </el-col>
            <el-col :span="20">
                .
            </el-col>
            <el-col :span="4">
                <el-button type="primary" style="width: 100%" @click="newRegistro">Guardar</el-button>
            </el-col>
        </el-row>
    </div>
  </div>
</template>

<script>
    export default {

        data()
        {
            return {
                socios: [],
                socio: '',
                lugares: [
                    {id: 1, nombre: 'AZUAY'},
                    {id: 2, nombre: 'BOLIVAR'},
                    {id: 3, nombre: 'CAÑAR'},
                    {id: 4, nombre: 'CARCHI'},
                    {id: 5, nombre: 'COTOPAXI'},
                    {id: 6, nombre: 'CHIMBORAZO'},
                    {id: 7, nombre: 'EL ORO'},
                    {id: 8, nombre: 'ESMERALDAS'},
                    {id: 9, nombre: 'GUAYAS'},
                    {id: 10, nombre: 'IMBABURA'},
                    {id: 11, nombre: 'LOJA'},
                    {id: 12, nombre: 'LOS RIOS'},
                    {id: 13, nombre: 'MANABI'},
                    {id: 14, nombre: 'MORONA SANTIAGO'},
                    {id: 15, nombre: 'NAPO'},
                    {id: 16, nombre: 'PASTAZA'},
                    {id: 17, nombre: 'PICHINCHA'},
                    {id: 18, nombre: 'TUNGURAHUA'},
                    {id: 19, nombre: 'ZAMORA CHINCHIPE'},
                    {id: 20, nombre: 'GALAPAGOS'},
                    {id: 21, nombre: 'SUCUMBIOS'},
                    {id: 22, nombre: 'ORELLANA'},
                    {id: 23, nombre: 'SANTO DOMINGO DE LOS TSACHILAS'},
                    {id: 24, nombre: 'SANTA ELENA'},
                ],
                lugar: '',
                valor: '',
                detalle: ''
            }
        },

        mounted() {
            axios.get('/api/socios').then((response) =>
                {
                    this.socios = response.data;
                });
        },

        methods: {
           regresar()
           {
               this.$emit('regresar');
           },
            newRegistro()
            {
                const params = {
                    user_id: $("#usuario_id").val(),
                    socio: this.socio,
                    lugar: this.lugar,
                    valor: this.valor,
                    detalle: this.detalle
                }

                axios.post('/api/procesos', params).then((response) => {
                    console.log(response.data);
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
