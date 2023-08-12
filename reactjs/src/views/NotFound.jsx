import React from "react";
import { Link } from "react-router-dom";

function NotFound() {
    return (
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8 mx-auto text-center  pt-4 pb-5">
                        <h1><img alt="404" src="/asset/img/404.png" class="img-fluid"/></h1>
                        <h1>Sorry! Page not found.</h1>
                        <p class="land">Unfortunately the page you are looking for has been moved or deleted.</p>
                        <div class="mt-5">
                            <Link class="btn btn-outline-primary" to={"/"}><i class="mdi mdi-home"></i> GO TO HOME PAGE</Link>
                        </div>
                    </div>
                </div>
            </div>
    );
}
export default NotFound;
