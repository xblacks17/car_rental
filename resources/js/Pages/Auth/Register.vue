<script setup>
import { Head, Link, useForm } from "@inertiajs/vue3";
import AuthenticationCard from "@/Components/AuthenticationCard.vue";
import AuthenticationCardLogo from "@/Components/AuthenticationCardLogo.vue";
import Checkbox from "@/Components/Checkbox.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import AppLayout from '@/Layouts/AppLayout.vue';


const form = useForm({
    name: "",
    email: "",
    phone_number: "",
    password: "",
    password_confirmation: "",
    terms: false,
});

const submit = () => {
    form.post(route("register"), {
        onFinish: () => form.reset("password", "password_confirmation"),
    });
};
</script>

<template>
    <AppLayout>
        <div class="no-bottom no-top" id="content">
            <div id="top"></div>

            <!-- section begin -->
            <section  style="width:100%; height:300px" id="subheader" class="jarallax text-light">
                <img
                    src="images/background/subheader.jpg"
                    class="jarallax-img"
                   
                    alt=""
                />
                <div class="center-y relative text-center" >
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <h1>Register</h1>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- section close -->

            <section aria-label="section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <h3>Don't have an account? Register now.</h3>
                            <p>
                                Welcome to Rentaly. We're excited to have you on
                                board. By creating an account with us, you'll
                                gain access to a range of benefits and
                                convenient features that will enhance your car
                                rental experience.
                            </p>

                            <div class="spacer-10"></div>

                            <form
                                name="contactForm"
                                id="contact_form"
                                class="form-border"
                                @submit.prevent="submit"
                            >
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="field-set">
                                            <label>Name:</label>
                                            <input
                                                type="text"
                                                name="name"
                                                v-model="form.name"
                                                id="name"
                                                class="form-control"
                                            />
                                            <InputError class="mt-2" :message="form.errors.name" />

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="field-set">
                                            <label>Email Address:</label>
                                            <input
                                                type="text"
                                                name="email"
                                                v-model="form.email"
                                                id="email"
                                                class="form-control"
                                            />
                                            <InputError class="mt-2" :message="form.errors.email" />

                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="field-set">
                                            <label>Phone:</label>
                                            <input
                                                type="text"
                                                name="phone"
                                                id="phone"
                                                v-model="form.phone_number"
                                                class="form-control"
                                            />
                                            <InputError class="mt-2" :message="form.errors.phone_number" />

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="field-set">
                                            <label>Password:</label>
                                            <input
                                                type="text"
                                                name="password"
                                                id="password"
                                                v-model="form.password"
                                                class="form-control"
                                            />
                                            <InputError class="mt-2" :message="form.errors.password" />

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="field-set">
                                            <label>Re-enter Password:</label>
                                            <input
                                                type="text"
                                                name="re-password"
                                                id="re-password"
                                                v-model="form.password_confirmation"
                                                class="form-control"
                                            />
                                            <InputError class="mt-2" :message="form.errors.password_confirmation" />

                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div id="submit" class="pull-left">
                                            <input
                                                type="submit"
                                                id="send_message"
                                                value="Register Now"
                                                class="btn-main color-2"
                                                :disabled="form.processing"
                                            />
                                        </div>

                                        <div id="mail_success" class="success">
                                            Your message has been sent
                                            successfully.
                                        </div>
                                        <div id="mail_fail" class="error">
                                            Sorry, error occured this time
                                            sending your message.
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </AppLayout>
</template>
