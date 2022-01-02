<template>
    <div class="card p-4">
    <el-row :gutter="20">
        <el-col :span="8">
            <el-label>Socio</el-label>
           <el-select class="w-100" v-model="editando.socio" placeholder="Socio" :filterable="true">
            <el-option
                v-for="item in socios"
                :key="item.id"
                :label="item.nombres"
                :value="item.id">
            </el-option>
        </el-select>
        </el-col>

        <el-col :span="8">
            <el-label>Tipo de Pago</el-label>
           <el-select class="w-100" v-model="editando.tipo_pago.id" placeholder="Tipo de Pago" :filterable="true">
            <el-option
                v-for="item in tipos"
                :key="item.id"
                :label="item.nombre"
                :value="item.id">
            </el-option>
        </el-select>
        </el-col>

        <el-col :span="8">
            <el-label>Banco</el-label>
           <el-select class="w-100" v-model="editando.banco.id" placeholder="Banco" :filterable="true">
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
        <el-col :span="8">
            <el-label>Numero</el-label>
           <el-input v-model="editando.cuenta" placeholder="Numero"> </el-input>
        </el-col>

        <el-col :span="4">
            <el-label>Total</el-label>
           <el-input v-model="editando.total" placeholder="Total"> </el-input>
        </el-col>

        <el-col :span="6">
            <el-label>Estado</el-label>
            <el-select class="w-100" v-model="editando.estado.id" placeholder="Banco" :filterable="true">
            <el-option
                v-for="item in estados"
                :key="item.id"
                :label="item.value"
                :value="item.id">
            </el-option>
        </el-select>
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
    props: ['editando'],
    data() {
        return {
            socios: [],
                tipos: [
                    { id: 1, nombre: 'EFECTIVO' },
                    { id: 2, nombre: 'CHEQUE' },
                    { id: 3, nombre: 'DEPOSITO' },
                    { id: 4, nombre: 'TRANSFERENCIA' },
                ],
                bancos: [],
                estados: [
                    { id: 1, value: 'ACTIVA' },
                    { id: 2, value: 'ANULADA' },
                ]
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
                console.log(this.bancos);
            });
        },
    methods: {
        newRegistro()
        {
                const params = {
                    id: this.editando.id,
                    estado: this.editando.estado.id,
                    cuenta: this.editando.cuenta,
                    total: this.editando.total,
                    banco_id: this.editando.banco.id,
                    tipo_pago: this.editando.tipo_pago.id
                }

                axios.put('/api/aportes-socios', params).then((response) => {
                    console.log(response.data);
                    this.$notify.success({
                    title: 'Procesado!',
                    message: 'Registro Editado Correctamente',
                    offset: 100
                    });
                    var id_socio = this.editando.socio.id;
                    var nombres = this.editando.socio.nombres;
                    this.$emit('regresar');
                })
        }
    }
}
</script>