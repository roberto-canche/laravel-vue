<template>
  <div>
      <v-client-table :columns="columns" :data="projects" :options="options">
          <button type="button" slot="edit" slot-scope="props" class="btn btn-info" @click="edit(props.row)">Editar</button>
          <button type="button" slot="remove" slot-scope="props" class="btn btn-danger" @click="remove(props.row)">Eliminar</button>
      </v-client-table>
  </div>
</template>

<script>
    export default {
        name: "projects-client-pagination",
        props: {
            projects: {
                type: Array,
                required: true
            }
        },
        data () {
            return {
                columns: [ 'id', 'name', 'assigned_by', 'owner', 'cost', 'edit', 'remove' ],
                options: {
                    perPage: 5,
                    perPageValues: [ 5, 10, 15, 20 ],
                    headings: {
                        id: 'ID',
                        name: 'Nombre',
                        assigned_by: 'Asignado por',
                        owner: 'Propietario',
                        cost: 'Coste',
                        edit: 'Editar',
                        remove: 'Eliminar'
                    },
                    sortable: [ 'id', 'name', 'cost' ],
                    filterable: [ 'id', 'name', 'cost' ],
                    filterByColumn: true
                }
            }
        },
        methids: {
            edit ( row ) {
                console.log( row );
            },
            remove ( row ) {
                console.log( rwo );
            }
        }
    }
</script>
