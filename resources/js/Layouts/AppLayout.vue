<script setup>
import { ref } from "vue";
import { Head, Link, router } from "@inertiajs/vue3";

defineProps({
    title: String,
});

const logout = () => {
    router.post(route("logout"));
};
</script>

<template>
    <div id="wrapper">
        <header
            class="scroll-light has-topbar"
            style="background-color: #78ca5c"
        >
            <div id="topbar" class="topbar-dark text-light">
                <div class="container">
                    <div class="topbar-left xs-hide">
                        <div class="topbar-widget">
                            <div class="topbar-widget">
                                <a href="#"
                                    ><i class="fa fa-phone"></i>+263 783 9296</a
                                >
                            </div>
                            <div class="topbar-widget">
                                <a href="#"
                                    ><i class="fa fa-envelope"></i
                                    >rentaly@gmail.com</a
                                >
                            </div>
                        </div>
                    </div>

                    <div class="topbar-right">
                        <div class="social-icons">
                            <a href="#"><i class="fa fa-facebook fa-lg"></i></a>
                            <a href="#"><i class="fa fa-twitter fa-lg"></i></a>
                            <a href="#"><i class="fa fa-youtube fa-lg"></i></a>
                            <a href="#"
                                ><i class="fa fa-pinterest fa-lg"></i
                            ></a>
                            <a href="#"
                                ><i class="fa fa-instagram fa-lg"></i
                            ></a>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="de-flex sm-pt10">
                            <div class="de-flex-col">
                                <div class="de-flex-col">
                                    <!-- logo begin -->
                                    <div id="logo">
                                        <a href="/">
                                            <img
                                                class="logo-1"
                                                src="/images/logo-light.png"
                                                alt=""
                                            />
                                            <img
                                                class="logo-2"
                                                src="/images/logo.png"
                                                alt=""
                                            />
                                        </a>
                                    </div>
                                    <!-- logo close -->
                                </div>
                            </div>
                            <div class="de-flex-col header-col-mid">
                                <ul id="mainmenu">
                                    <li>
                                        <a class="menu-item" href="/">Home</a>
                                    </li>
                                    <li>
                                        <a class="menu-item" href="/cars"
                                            >Cars</a
                                        >
                                    </li>

                                    <li v-if="$page.props.auth.user">
                                        <a
                                            class="menu-item"
                                            href="/user/profile"
                                            >My Account</a
                                        >
                                    </li>
                                </ul>
                            </div>
                            <div class="de-flex-col">
                                <div
                                    class="menu_side_area"
                                    v-if="!$page.props.auth.user"
                                >
                                    <a
                                        href="login"
                                        class="btn-main"
                                        style="background-color: #222733"
                                        >Sign In</a
                                    >
                                    <span id="menu-btn"></span>
                                </div>
                                <div
                                    class="menu_side_area"
                                    v-if="!$page.props.auth.user"
                                >
                                    <a
                                        href="register"
                                        class="btn-main"
                                        style="background-color: #222733"
                                        >Register</a
                                    >
                                    <span id="menu-btn"></span>
                                </div>
                                <div
                                    class="menu_side_area"
                                    v-if="$page.props.auth.user"
                                >
                                    <a
                                        href="#"
                                        class="btn-main"
                                        @click.prevent="logout"
                                        style="background-color: #222733"
                                        >Log Out</a
                                    >
                                    <span id="menu-btn"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <slot></slot>
        <!-- content close -->
        <a href="#" id="back-to-top"></a>
        <!-- footer begin -->
        <footer class="text-light">
            <div class="container">
                <div class="row g-custom-x">
                    <div class="col-lg-3">
                        <div class="widget">
                            <h5>About Rentaly</h5>
                            <p>
                                Where quality meets affordability. We understand
                                the importance of a smooth and enjoyable journey
                                without the burden of excessive costs. That's
                                why we have meticulously crafted our offerings
                                to provide you with top-notch vehicles at
                                minimum expense.
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="widget">
                            <h5>Contact Info</h5>
                            <address class="s1">
                                <span
                                    ><i
                                        class="id-color fa fa-map-marker fa-lg"
                                    ></i
                                    >6 Fairway, Harare</span
                                >
                                <span
                                    ><i class="id-color fa fa-phone fa-lg"></i
                                    >+263 783 9296</span
                                >
                                <span
                                    ><i
                                        class="id-color fa fa-envelope-o fa-lg"
                                    ></i
                                    ><a href="mailto:contact@example.com"
                                        >rentaly@gmail.com</a
                                    ></span
                                >
                            </address>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="widget">
                            <h5>Social Network</h5>
                            <div class="social-icons">
                                <a href="#"
                                    ><i class="fa fa-facebook fa-lg"></i
                                ></a>
                                <a href="#"
                                    ><i class="fa fa-twitter fa-lg"></i
                                ></a>
                                <a href="#"
                                    ><i class="fa fa-linkedin fa-lg"></i
                                ></a>
                                <a href="#"
                                    ><i class="fa fa-pinterest fa-lg"></i
                                ></a>
                                <a href="#"><i class="fa fa-rss fa-lg"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="subfooter">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="de-flex">
                                <div class="de-flex-col">
                                    <a href="index.html">
                                        Copyright 2023 - Rentaly by Maspeakers
                                    </a>
                                </div>
                                <ul class="menu-simple">
                                    <li>
                                        <a href="#">Terms &amp; Conditions</a>
                                    </li>
                                    <li><a href="#">Privacy Policy</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- footer close -->
    </div>
</template>
