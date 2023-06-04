<script setup>
import { ref } from "vue";
import { Head, Link, router } from "@inertiajs/vue3";
import AppLayout from "@/Layouts/AppLayout.vue";

defineProps({
    title: String,
});

const logout = () => {
    router.post(route("logout"));
};
</script>

<template>
    <AppLayout>
        <div class="no-bottom no-top zebra" id="content">
            <div id="top"></div>

            <!-- section begin -->
            <section id="subheader" class="jarallax text-light">
                
                <div class="center-y relative text-center">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <h1 style="color: rgb(34, 39, 51);">Dashboard</h1>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- section close -->

            <section id="section-cars" class="bg-gray-100">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 mb30">
                            <div class="card p-4 rounded-5">
                                <div class="profile_avatar">
                                    <div class="profile_img">
                                        <img
                                            src="/images/profile/1.jpg"
                                            alt=""
                                        />
                                    </div>
                                    <div class="profile_name">
                                        <h4>
                                           {{$page.props.auth?.user?.name}}
                                            <span
                                                class="profile_username text-gray"
                                                >{{     $page.props.auth?.user?.email}}</span
                                            >
                                        </h4>
                                    </div>
                                </div>
                                <div class="spacer-20"></div>
                                <ul class="menu-col">                                   
                                    <li>
                                        <a href="/admin/companies" :class="{  'active': $page.url === '/admin/companies' }"
                                            ><i class="fa fa-user"></i>Companies</a
                                        >
                                    </li>
                                    <li>
                                        <a href="/admin/cars" :class="{  'active': $page.url === '/admin/cars' }"
                                            ><i class="fa fa-car"></i>Cars</a
                                        >
                                    </li>
                                    <li>
                                        <a href="/admin/rentals" :class="{  'active': $page.url === '/admin/rentals' }"
                                            ><i class="fa fa-calendar"></i>Books</a
                                        >
                                    </li>
                                    <li>
                                        <a href="/admin/users" :class="{  'active': $page.url === '/admin/users' }"
                                            ><i class="fa fa-user"></i>Users</a
                                        >
                                    </li>
                                    <li>
                                        <a href="#" @click.prevent="logout"
                                            ><i class="fa fa-sign-out"></i>Sign
                                            Out</a
                                        >
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <slot></slot>
                    </div>
                </div>
            </section>
        </div>
    </AppLayout>
</template>
