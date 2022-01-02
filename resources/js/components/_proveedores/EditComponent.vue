<template>
    <el-tabs type="border-card">
    <el-row :gutter="20">
        <el-col :span="20" style="color:white">.</el-col>
        <el-col :span="4">
            <el-button type="danger" style="width: 100%" @click="regresar()">Regresar</el-button>
        </el-col>
    </el-row>
    <el-tab-pane label="Datos del Proveedor">

        <el-row :gutter="20">
            <el-col :span="6">
                <el-input v-model="editando.documento" placeholder="Documento"> </el-input>
            </el-col>
            <el-col :span="12">
                <el-input v-model="editando.razon_social" placeholder="Razon Social"> </el-input>
            </el-col>
            <el-col :span="6">
                <el-input v-model="editando.telefono" placeholder="Telefono"> </el-input>
            </el-col>
        </el-row>

        <el-row :gutter="20">
            <el-col :span="6">
                <el-input v-model="editando.movil" placeholder="Movil"> </el-input>
            </el-col>
            <el-col :span="12">
                <el-input v-model="editando.correo" placeholder="Correo"> </el-input>
            </el-col>
            <el-col :span="6">
                Estado:
        <el-switch v-model="editando.status"></el-switch>
            </el-col>
        </el-row>

            <el-row :gutter="20">
            <el-col :span="24">
                <el-input v-model="editando.observaciones" placeholder="Observaciones"> </el-input>
            </el-col>
        </el-row>

    </el-tab-pane>
    <el-tab-pane label="Datos Factura">

        <el-row :gutter="20">
       <el-col :span="4">
           Obligado:
        <el-switch v-model="editando.obligado"></el-switch>
       </el-col>
       <el-col :span="6">
           <el-input v-model="editando.serie" placeholder="Serie"> </el-input>
       </el-col>
       <el-col :span="6">
           <el-input v-model="editando.secuencia" placeholder="Secuencia"> </el-input>
       </el-col>
       <el-col :span="8">
           <el-input v-model="editando.autorizacion" placeholder="# Autorizacion"> </el-input>
       </el-col>
        </el-row>

        <el-row :gutter="20">
       <el-col :span="8">
           <span class="demonstration">Fecha de Caducidad</span>
            <el-date-picker
            v-model="editando.caducidad"
            type="date"
            placeholder="Seleccione Fecha">
            </el-date-picker>
       </el-col>
        </el-row>

    </el-tab-pane>
    <el-tab-pane label="Credito">
        <el-row :gutter="20">
       <el-col :span="4">
           Credito:
           <el-switch v-model="editando.credito"></el-switch>
       </el-col>
       <el-col :span="10">
           <el-input v-model="editando.tiempo_credito" placeholder="Tiempo de Credito"> </el-input>
       </el-col>
        </el-row>
    </el-tab-pane>
    <el-tab-pane label="Contabilidad">
        <el-row :gutter="20">
           <el-col :span="4">
               Cuenta
           </el-col>
           <el-col :span="20">
               <v-select label="cuenta" :options="cuentas" :reduce="(cuenta) => cuenta.id" :value.sync="editando.cuenta_id" v-model="editando.cuenta_id" ></v-select>
           </el-col>
       </el-row>
    </el-tab-pane>
    <el-row :gutter="20">
        <el-col :span="20" style="color:white">.</el-col>
        <el-col :span="4">
            <el-button type="success" style="width: 100%" @click="updateRegistro()">Guardar</el-button>
        </el-col>
    </el-row>
    </el-tabs>
</template>

<script>
    export default {
        props: ['editando'],
        data()
        {
            return {
                cuentas: []
            }
        },
        mounted() {
            cuentas: axios.get('/api/planes-cuenta').then((response) => {
                this.cuentas = response.data
            });
        },

        methods: {
            updateRegistro()
            {
                const params = {
                    documento : this.editando.documento,
                    razon_social : this.editando.razon_social,
                    telefono : this.editando.telefono,
                    movil : this.editando.movil,
                    correo : this.editando.correo,
                    status : this.editando.status,
                    obligado : this.editando.obligado,
                    serie : this.editando.serie,
                    secuencia : this.editando.secuencia,
                    autorizacion : this.editando.autorizacion,
                    caducidad : this.editando.caducidad,
                    credito : this.editando.credito,
                    cuenta : this.editando.cuenta_id,
                    tiempo_credito: this.editando.tiempo_credito,
                    observaciones: this.editando.observaciones,
                    status: this.editando.status,
                    id: this.editando.id
                }

                axios.put('/api/proveedores', params).then((response) => {
                    console.log(response.data);
                    const h = this.$createElement;
                    this.$notify.success({
                    title: 'Procesado!',
                    message: 'Registro Editado Correctamente',
                    offset: 100
                    });


                    this.$emit('new');
                })

            },

            regresar()
            {
                this.$emit('regresar');
            }
        }
    }
</script>
