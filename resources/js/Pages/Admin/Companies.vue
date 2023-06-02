<template>
    <AdminDashboard title="Companies">
        <div class="col-lg-9">
            <div class="card p-4 rounded-5 mb25">
                <h4>Companies</h4>

                <button
                    type="button"
                    class="btn-main"
                    data-bs-toggle="modal"
                    data-bs-target="#exampleModal"
                >
                    Create New
                </button>

                <table class="table de-table" v-if="companies.length > 0">
                    <thead>
                        <tr>
                            <th scope="col">
                                <span class="text-uppercase fs-12 text-gray"
                                    >ID</span
                                >
                            </th>
                            <th scope="col">
                                <span class="text-uppercase fs-12 text-gray"
                                    >Company Name</span
                                >
                            </th>

                            <th scope="col">
                                <span class="text-uppercase fs-12 text-gray"
                                    >Created Date</span
                                >
                            </th>

                            <th scope="col">
                                <span class="text-uppercase fs-12 text-gray"
                                    >Action</span
                                >
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="company in companies">
                            <td>
                                <span class="d-lg-none d-sm-block">{{
                                    company.id
                                }}</span>
                                <div class="badge bg-gray-100 text-dark">
                                    {{ company.id }}
                                </div>
                            </td>
                            <td>
                                <span class="d-lg-none d-sm-block">{{
                                    company.id
                                }}</span>
                                <div class="badge bg-gray-100 text-dark">
                                    {{ company.name }}
                                </div>
                            </td>

                            <td>
                                <span class="d-lg-none d-sm-block"
                                    >Created Date</span
                                >{{ company.created_at }}
                            </td>
                            <td>
                                <button
                                    type="button"
                                    class="btn-main mr-2" style="margin-right: 10px;"
                                    @click="deleteCompany(company)"
                                >
                                    Delete
                                </button>
                                <button
                                    type="button"
                                    class="btn-main"
                                    data-bs-toggle="modal"
                                    @click="edit(company)"
                                    data-bs-target="#exampleModal"
                                >
                                    Edit
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="text-center" v-else>
                    <h4>No Companies Found</h4>
                </div>
            </div>
        </div>
        <div
            class="modal fade"
            id="exampleModal"
            tabindex="-1"
            aria-labelledby="exampleModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            Create New Company
                        </h5>
                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                        ></button>
                    </div>
                    <div class="modal-body">
                        <form
                            id="form_register"
                            class="form-border"
                            @submit.prevent="submit"
                        >
                            <div class="field-set">
                                <input
                                    type="text"
                                    name="name"
                                    id="name"
                                    class="form-control"
                                    v-model="form.name"
                                    placeholder="Company Name"
                                />
                            </div>

                            <div id="submit">
                                <div class="modal-footer">
                                    <button
                                        type="button"
                                        class="btn-main"
                                        data-bs-dismiss="modal"
                                    >
                                        Close
                                    </button>
                                    <button
                                        type="submit"
                                        class="btn-main"
                                        :disabled="form.loading"
                                    >
                                        Save changes
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AdminDashboard>
</template>

<script>
import AdminDashboard from "@/Layouts/AdminDashboard.vue";
import { useForm } from "@inertiajs/vue3";
export default {
    components: {
        AdminDashboard,
    },
    data() {
        return {
            form: useForm({
                name: "",
                id: "",
            }),

            isEdit: false,
        };
    },

    props: ["companies"],
    methods: {
        submit() {
            if (this.isEdit) {
                this.submitEdit();
            } else {
                this.submitCreate();
            }
        },
        submitCreate() {
            this.form.post(route("companies.add"), {
                onFinish: () => form.reset(),
            });
        },
        edit(company) {
            this.isEdit = true;
            this.form.name = company.name;
            this.form.id = company.id;
        },

        deleteCompany(company) {
            this.form.delete(`/admin/companies/${company.id}`, {
                onFinish: () => {
                    this.form.reset();
                },
            });
        },

        submitEdit() {
            // console.log(this.form.id);
            this.form.put(`/admin/companies/${this.form.id}`, this.form, {
                onFinish: () => {
                    this.form.reset();
                    this.isEdit = false;
                },
            });
        },
    },
};
</script>
