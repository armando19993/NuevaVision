<template>
    <div class="card p-5" >
      <div class="card-header text-right">
        <h4 class="card-title">Crear Orden de Compra</h4>
        <button class="btn btn-danger float-right" @click="regresar()"> Regresar</button>
      </div>

        <el-row :gutter="20">
            <el-col :span="6">
                Estado:
        <el-switch :disabled="true" v-model="editando.status"></el-switch>
            </el-col>

            <el-col :span="6">
                <el-input :disabled="true" v-model="editando.ordc_gasto" placeholder="Ordc Gasto"> </el-input>
            </el-col>

            <el-col :span="6">
                <el-input :disabled="true" v-model="editando.ordc_asignacion" placeholder="Ordc Asignacion"> </el-input>
            </el-col>

            <el-col :span="6">
                <el-input :disabled="true" v-model="editando.ordc_saldo" placeholder="Ordc Saldo"> </el-input>
            </el-col>
        </el-row>

        <el-row :gutter="20">
            <el-col :span="12">
                <el-input :disabled="true" v-model="editando.descripcion" placeholder="Descripcion"> </el-input>
            </el-col>

            <el-col :span="12">
                <v-select
                :disabled="true"
                label="razon_social"
                :options="proveedores"
                :reduce="(proveedor) => proveedor.id"
                :value.sync="editando.proveedor_id"
                v-model="editando.proveedor_id" ></v-select>
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
        props: ['editando'],
        data()
        {
            return {
                proveedores: []
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
           regresar()
            {
                this.$emit('regresar');
            }
        }
    }
</script>
