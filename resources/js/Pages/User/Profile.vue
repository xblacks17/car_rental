<template>
    <UserDashboard title="Dashboard">
        <div class="col-lg-9">
            <div class="card p-4 rounded-5">
                <div class="row">
                    <div class="col-lg-12">
                        <form
                            id="form_register"
                            class="form-border"
                            @submit.prevent="submit"
                            action="https://www.madebydesignesia.com/themes/rentaly/email.php"
                        >
                            <div class="de_tab tab_simple">
                                <div class="de_tab_content">
                                    <div class="tab-1">
                                        <div class="row">
                                            <div class="col-lg-6 mb20">
                                                <h5>Username</h5>
                                                <input
                                                    type="text"
                                                    name="username"
                                                    v-model="form.name"
                                                    id="username"
                                                    class="form-control"
                                                    placeholder="Enter new username"
                                                />
                                                <InputError
                                                class="mt-2"
                                                :message="form.errors.name"
                                            />
                                            </div>                                            
                                            <div class="col-lg-6 mb20">
                                                <h5>New Password</h5>
                                                <input
                                                    type="Password"
                                                    name="user_password"
                                                    v-model="form.password"
                                                    id="user_password"
                                                    class="form-control"
                                                    placeholder="********"
                                                />
                                                <InputError class="mt-2" :message="form.errors.password" />
                                            </div>
                                            <div class="col-lg-6 mb20">
                                                <h5>Re-enter Password</h5>
                                                <input
                                                    type="Password"
                                                    name="user_password_re-enter"
                                                    v-model="form.password_confirmation"
                                                    id="user_password_re-enter"
                                                    class="form-control"
                                                    placeholder="********"
                                                />
                                                <InputError class="mt-2" :message="form.errors.password_confirmation" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <input
                                type="submit"
                                id="submit"
                                class="btn-main"
                                value="Update profile"
                                :disabled="form.processing"
                            />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </UserDashboard>
</template>

<script>
import UserDashboard from "@/Layouts/UserDashboard.vue";
import { useForm } from "@inertiajs/vue3";
export default {
    components: {
        UserDashboard,    
    },
    props: ["user"],

data() {
    return {
        form: useForm({
            name: "",
            password: "",
            password_confirmation: "",
            terms: false,
        }),

    };
},

methods: {
    submit() {
        this.form.post(route("users.add"), {
            onFinish: () => this.form.reset(),
        });
    },
},
};
</script>
