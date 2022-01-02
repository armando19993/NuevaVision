<template>
<div class="card">
    <div class="card-header">
        <h3>Procesos</h3>
        <button class="btn btn-success text-right" @click="crear"> <i class="fa fa-plus-circle"></i> Agregar</button>
    </div>
    <div class="card-body">
  <el-table
    :data="procesos.filter(data => !search || data.socio.nombres.toLowerCase().includes(search.toLowerCase()))"
    style="width: 100%">
    <div slot="empty">
            <span>No se encontraron resultados <el-icon name="search"></el-icon></span>
        </div>
    <el-table-column
      label="Socio"
      prop="socio.nombres">
    </el-table-column>
     <el-table-column
      label="Lugar"
      prop="lugar">
    </el-table-column>
    <el-table-column
      label="Detalle"
      prop="detalle">
    </el-table-column>
    <el-table-column
      label="Valor"
      prop="valor">
    </el-table-column>
    <el-table-column
      label="FechaReg"
      prop="created_at">
    </el-table-column>
    <el-table-column
      align="right">
      <template slot="header" slot-scope="scope">
        <el-input
          v-model="search"
          size="mini"
          placeholder="Busque"/>
      </template>
      <template slot-scope="scope">
        <el-button
          size="mini"
          type="primary"
          @click="handleEdit(scope.$index)"><i class="fa fa-pencil" style="font-size: 15px;"></i></el-button>
      </template>
    </el-table-column>
  </el-table>
  </div>
  </div>
</template>

<script>
    export default {
        props: ['procesos'],
        data()
        {
            return {
                search: ''
            }
        },

        mounted() {
        },

        methods: {
            handleEdit( index )
            {
                var proceso = this.procesos[index];
                this.$emit('editar', proceso)
            },
            crear()
            {
                this.$emit('crear');
            }
        }
    }
</script>
