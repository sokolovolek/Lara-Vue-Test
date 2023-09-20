<template>
    <section class="content">
        <notifications group="foo" class="vs-button-error vs-button-gradient" />
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Edit Employee</h3>

                            <div class="card-tools">
                                <div
                                    class="input-group input-group-sm"
                                    style="width: 150px"
                                >
                                    <a
                                        href="/employee-list"
                                        type="button"
                                        class="btn btn-success btn-sm"
                                        >Back<i class="fas fa-smile-plus"></i
                                    ></a>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <form onsubmit="return false;">
                                <div
                                    class="card-body col-md-4"
                                    style="margin: auto"
                                >
                                    <div class="vx-row mb-4">
                                        <div class="vx-col col-md-4">
                                            <span>Name</span>
                                        </div>
                                        <div class="vx-col col-md-8">
                                            <vs-input
                                                class="w-full"
                                                icon-pack="feather"
                                                name="name"
                                                icon-no-border
                                                v-model="name"
                                                required
                                            />
                                            <span class="text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="vx-row mb-4">
                                        <div class="vx-col col-md-4">
                                            <span>Job Title</span>
                                        </div>
                                        <div class="vx-col col-md-8">
                                            <vs-input
                                                class="w-full"
                                                icon-pack="feather"
                                                name="job_title"
                                                icon-no-border
                                                v-model="job_title"
                                                required
                                            />
                                            <span class="text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="vx-row mb-4">
                                        <div class="vx-col col-md-4">
                                            <span>Salary</span>
                                        </div>
                                        <div class="vx-col col-md-8">
                                            <vs-input
                                                class="w-full"
                                                icon-pack="feather"
                                                name="salary"
                                                icon-no-border
                                                v-model="salary"
                                                required
                                            />
                                            <span class="text-danger"></span>
                                        </div>
                                    </div>

                                    <div
                                        class="vx-row mb-6"
                                        style="float: right"
                                    >
                                        <a @click="formsubmit">
                                            <button
                                                type="submit"
                                                class="btn btn-primary"
                                            >
                                                Save
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </form>
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
            employeeItem: [],
            name: JSON.parse(this.$props.employee)["name"],
            job_title: JSON.parse(this.$props.employee)["job_title"],
            salary: JSON.parse(this.$props.employee)["salary"],
        };
    },
    props: {
        employee: String,
        updateurl: String,
    },
    methods: {
        formsubmit() {
            let vm = this;
            if (this.name != "" && this.job_title != "" && this.salary != "") {
                this.$http
                    .post(this.$props.updateurl, {
                        id: JSON.parse(this.$props.employee)["id"],
                        name: this.name,
                        job_title: this.job_title,
                        salary: this.salary,
                    })
                    .then(function (response) {
                        if (response.data.msg == "success") {
                            document.location = "/employee-list";
                        } else {
                            vm.$notify({
                                group: "foo",
                                type: "error",
                                title: "",
                                text: response.data.msg,
                            });
                        }
                    })
                    .catch(function (error) {
                        console.log(error);
                        vm.$notify({
                            group: "foo",
                            type: "error",
                            title: "",
                            text: "Something is wrong",
                        });
                    });
            }
        },
    },
    created: function () {
        this.employeeItem = JSON.parse(this.$props.employee);
    },
};
</script>
