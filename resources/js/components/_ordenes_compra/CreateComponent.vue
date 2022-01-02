<template>
    <div class="card p-5" >
      <div class="card-header text-right">
        <h4 class="card-title">Crear Orden de Compra</h4>
        <button class="btn btn-danger float-right" @click="regresar()"> Regresar</button>
      </div>

        <el-row :gutter="20">
            <el-col :span="8">
                <el-input v-model="ordc_gasto" placeholder="Ordc Gasto"> </el-input>
            </el-col>

            <el-col :span="8">
                <el-input v-model="ordc_asignacion" placeholder="Ordc Asignacion"> </el-input>
            </el-col>

            <el-col :span="8">
                <el-input v-model="ordc_saldo" placeholder="Ordc Saldo"> </el-input>
            </el-col>
        </el-row>

        <el-row :gutter="20">
            <el-col :span="12">
                <el-input v-model="descripcion" placeholder="Descripcion"> </el-input>
            </el-col>

            <el-col :span="12">
                <v-select
                placeholder="Proveedor"
                label="razon_social"
                :options="proveedores"
                :reduce="(proveedor) => proveedor.id"
                :value.sync="proveedor.id"
                v-model="proveedor" ></v-select>
            </el-col>
        </el-row>
        <el-row :gutter="20">
        <el-col :span="20" style="color:white">.</el-col>
        <el-col :span="4">
            <el-button type="success" style="width: 100%" @click="newRegistro()">Guardar</el-button>
        </el-col>
    </el-row>
    </div>
</template>

<style>
  .el-row {
    margin-bottom: 20px;
    margin-left: 20px;
    margin-right: 20px;
  }
</style>

<script>
    export default {
        data()
        {
            return {
                ordc_gasto: '',
                ordc_asignacion: '',
                ordc_saldo: '',
                descripcion: '',
                proveedor: 0,
                proveedores: [],
            }
        },

        mounted() {
            axios.get('/api/proveedores').then((response) =>
            {
                this.proveedores = response.data;
                console.log(this.proveedores);
            });
        },

        methods: {
            newRegistro() {
                const params = {
                    ordc_gasto: this.ordc_gasto,
                    ordc_asignacion: this.ordc_asignacion,
                    ordc_saldo: this.ordc_saldo,
                    descripcion: this.descripcion,
                    proveedor_id: this.proveedor,
                    creador_id: $("#usuario_id").val(),
                }

                axios.post('/api/ordenes-compra', params).then((response) => {
                    console.log(response.data);
                    this.$emit('new');

                    this.ordc_gasto = '';
                    this.ordc_asignacion = '';
                    this.ordc_saldo = '';
                    this.proveedor = 0;
                    this.descripcion = '';
                })
            },
            regresar()
            {
                this.$emit('regresar');
            }
        }
    }
</script>
