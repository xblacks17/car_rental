<script setup>
import { Head, Link, useForm } from "@inertiajs/vue3";
import AuthenticationCard from "@/Components/AuthenticationCard.vue";
import AuthenticationCardLogo from "@/Components/AuthenticationCardLogo.vue";
import Checkbox from "@/Components/Checkbox.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import AppLayout from "@/Layouts/AppLayout.vue";

defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = useForm({
    email: "",
    password: "",
    remember: false,
});

const submit = () => {
    form.transform((data) => ({
        ...data,
        remember: form.remember ? "on" : "",
    })).post(route("login"), {
        onFinish: () => form.reset("password"),
    });
};
</script>

<template>
    <AppLayout>
        <div class="no-bottom no-top" id="content">
            <div id="top"></div>
            <section id="section-hero" aria-label="section" class="jarallax">
                
                <div class="v-center">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-4 offset-lg-4">
                                <div
                                    class="padding40 rounded-3 shadow-soft"
                                    data-bgcolor="#ffffff"
                                >
                                    <h4>Login</h4>
                                    <div
                                        v-if="status"
                                        class="mb-4 font-medium text-sm text-green-600"
                                    >
                                        {{ status }}
                                    </div>
                                    <div class="spacer-10"></div>
                                    <form
                                        id="form_register"
                                        class="form-border"
                                        @submit.prevent="submit"
                                    >
                                        <div class="field-set">
                                            <input
                                                type="email"
                                                name="email"
                                                v-model="form.email"
                                                id="name"
                                                class="form-control"
                                                placeholder="Your Email"
                                            />
                                            <InputError
                                                class="mt-2"
                                                :message="form.errors.email"
                                            />
                                        </div>
                                        <div class="field-set">
                                            <input
                                                type="password"
                                                name="password"
                                                id="password"
                                                class="form-control"
                                                v-model="form.password"
                                            />
                                            <InputError
                                                class="mt-2"
                                                :message="form.errors.password"
                                            />
                                        </div>
                                        <div id="submit">
                                            <input
                                                type="submit"
                                                id="send_message"
                                                value="Sign In"
                                                :disabled="form.processing"
                                                class="btn-main btn-fullwidth rounded-3"
                                            />
                                        </div>
                                    </form>
                                    <div class="title-line">
                                        Or&nbsp;sign&nbsp;up&nbsp;with
                                    </div>
                                    <div class="row g-2">
                                        <div class="col-lg-6">
                                            <a
                                                class="btn-sc btn-fullwidth mb10"
                                                href="#"
                                                ><img
                                                    src="images/svg/google_icon.svg"
                                                    alt=""
                                                />Google</a
                                            >
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </AppLayout>
</template>
