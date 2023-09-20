<template>
    <section class="content">
        <notifications
            group="foo"
            class="vs-button-success vs-button-gradient"
        />
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Employees</h3>

                            <div class="card-tools">
                                <div
                                    class="input-group input-group-sm"
                                    style="width: 150px"
                                >
                                    <a
                                        :href="createemployeeurl"
                                        type="button"
                                        class="btn btn-success btn-sm"
                                        >New<i class="fas fa-smile-plus"></i
                                    ></a>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <vs-table
                                max-items="10"
                                search
                                pagination
                                :data="employeesList"
                            >
                                <template slot="thead">
                                    <vs-th>Name</vs-th>
                                    <vs-th>Job title</vs-th>
                                    <vs-th>Salary</vs-th>
                                    <vs-th>Action</vs-th>
                                </template>

                                <template slot-scope="{ data }">
                                    <vs-tr
                                        :key="indextr"
                                        v-for="(tr, indextr) in data"
                                    >
                                        <vs-td :data="data[indextr].id">
                                            {{ data[indextr].name }}
                                        </vs-td>
                                        <vs-td :data="data[indextr].id">
                                            {{ data[indextr].job_title }}
                                        </vs-td>
                                        <vs-td :data="data[indextr].id">
                                            {{ data[indextr].salary }}
                                        </vs-td>
                                        <vs-td :data="data[indextr].id">
                                            <a
                                                :href="
                                                    editemployeeurl +
                                                    '/' +
                                                    data[indextr].id
                                                "
                                            >
                                                <span class="badge bg-warning">
                                                    Edit
                                                    <i class="fas fa-edit"></i>
                                                </span>
                                            </a>
                                            <a
                                                style="cursor: pointer"
                                                @click="
                                                    deleteItem(data[indextr].id)
                                                "
                                            >
                                                <span class="badge bg-danger">
                                                    Delete
                                                    <i class="fas fa-trash"></i>
                                                </span>
                                            </a>
                                        </vs-td>
                                    </vs-tr>
                                </template>
                            </vs-table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    data() {
        return {
            employeesList: [],
        };
    },
    props: {
        employees: String,
        createemployeeurl: String,
        editemployeeurl: String,
        deleteemployeeurl: String,
    },
    methods: {
        deleteItem(id) {
            if (confirm("Are you sure to remove the employee?")) {
                document.location = `${this.$props.deleteemployeeurl}/${id}`;
            }
        },
    },
    created: function () {
        this.employeesList = JSON.parse(this.$props.employees);
    },
};
</script>
