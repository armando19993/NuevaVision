<template>
<div class="card p-4">
    <el-row :gutter="20">
        <el-col :span="12">
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

        <el-col :span="6">
            <el-label>Tipo de Pago</el-label>
           <el-select class="w-100" v-model="tipo_pago" placeholder="Tipo de Pago" :filterable="true">
            <el-option
                v-for="item in tipos"
                :key="item.id"
                :label="item.nombre"
                :value="item.id">
            </el-option>
        </el-select>
        </el-col>

        <el-col :span="6">
            <el-label>Banco</el-label>
           <el-select class="w-100" v-model="banco" placeholder="Banco" :filterable="true">
            <el-option
                v-for="item in bancos"
                :key="item.id"
                :label="item.nombre"
                :value="item.id">
            </el-option>
        </el-select>
        </el-col>
    </el-row>

    <el-row :gutter="20">
        <el-col :span="12">
            <el-label>Numero</el-label>
           <el-input v-model="cuenta" placeholder="Numero"> </el-input>
        </el-col>

        <el-col :span="6">
            <el-label>Total</el-label>
           <el-input v-model="total" placeholder="Total"> </el-input>
        </el-col>

        <el-col :span="6">
            <el-label>.</el-label>
            <el-button type="success" style="width: 100%" @click="newRegistro()">Guardar</el-button>
        </el-col>
    </el-row>
</div>
</template>

<script>

export default {
    props: ['socio', 'banco'],
    data()
        {
            return {
                socios: [],
                tipos: [
                    { id: 1, nombre: 'EFECTIVO' },
                    { id: 2, nombre: 'CHEQUE' },
                    { id: 3, nombre: 'DEPOSITO' },
                    { id: 4, nombre: 'TRANSFERENCIA' },
                ],
                tipo_pago: '',
                bancos: [],
                cuenta: '', 
                total: ''
            }
        },

        mounted() {
            axios.get('/api/socios').then((response) =>
                {
                    this.socios = response.data;
                });
            axios.get('/api/bancos').then((response) =>
            {
                this.bancos = response.data;
            });
        },

        methods: {
            newRegistro() {
                const params = {
                    socio_id: this.socio,
                    tipo_pago: this.tipo_pago,
                    banco_id: this.banco,
                    cuenta: this.cuenta,
                    total: this.total, 
                    user_id: $("#usuario_id").val(),
                }

                console.log(params);

                axios.post('/api/aportes-socios', params).then((response) => {
                    console.log(response.data);
                    this.$notify.success({
                    title: 'Procesado!',
                    message: 'Registro Creado Correctamente',
                    offset: 100
                    });
                    this.$emit('new');
                })
            },
        }

}
</script>