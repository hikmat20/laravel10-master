<!DOCTYPE html>

<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <title>Login | AppName</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" href="./assets/media/logos/favicon.ico" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <link href="./assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="./assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <link href="./assets/css/custom.css" rel="stylesheet" type="text/css" />
    <script>
        if (window.top != window.self) {
            window.top.location.replace(window.self.location.href);
        }
    </script>
    <script>
        var defaultThemeMode = "light";
        var themeMode;

        if (document.documentElement) {
            if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
                themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
            } else {
                if (localStorage.getItem("data-bs-theme") !== null) {
                    themeMode = localStorage.getItem("data-bs-theme");
                } else {
                    themeMode = defaultThemeMode;
                }
            }

            if (themeMode === "system") {
                themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
            }

            document.documentElement.setAttribute("data-bs-theme", themeMode);
        }
    </script>
    <style>
        body {
            background-image: url("{{asset('assets/media/auth/abstract-light.jpg')}}");
            z-index: -1;
        }

        [data-bs-theme="dark"] body {
            background-image: url("{{asset('assets/media/auth/abstract-dark.jpg')}}");
        }
    </style>
</head>


<body id="kt_body" class="app-blank bgi-size-cover bgi-attachment-fixed bgi-position-center bgi-no-repeat">

    <div class="d-flex flex-column flex-root" id="kt_app_root">
        <div class="d-flex flex-column flex-column-fluid justify-content-center">
            <div class="d-flex flex-column-fluid flex-lg-row-auto justify-content-center align-items-center">
                <div class="bg-body bg-opacity-15 flex-column flex-lg-row shadow d-flex justify-content-between h-lg-100 w-90 w-lg-50 w-lg-800px align-items-center flex-center rounded-4 overflow-hidden" style=" backdrop-filter: blur(10px);">
                    <div class="bg-royal px-5 w-lg-50 w-100 h-lg-100 rounded-3">
                        <div class="d-flex flex-center justify-content-center py-7 h-lg-100">
                            <div class="d-flex align-items-center justify-content-center">
                                <a href="/" class="mb-0">
                                    <img alt="Logo" src="{{asset('assets/media/logos/custom-3.svg')}}" />
                                </a>
                                <h2 class="text-white fw-normal m-0"></h2>
                            </div>
                        </div>
                    </div>


                    <div class="d-flex flex-center flex-column-fluid w-100 w-lg-50 p-7 p-lg-5 py-lg-10 pt-10">

                        <form class="form w-100" novalidate="novalidate" id="kt_sign_up_form" data-kt-redirect-url="/signin" method="POST" action="/signup">
                            @csrf
                            <div class="text-center mb-11">
                                <h1 class="text-gray-900 fw-bolder mb-3">Sign Up</h1>
                            </div>

                            <div class="fv-row mb-5">
                                <input type="text" placeholder="Full Name" name="full_name" class="form-control bg-transparent" />
                            </div>

                            <!-- <div class="fv-row mb-5">
                                <input type="text" placeholder="Username" name="username" class="form-control bg-transparent" />
                            </div> -->

                            <div class="fv-row mb-5">
                                <input type="text" placeholder="Username" name="username" class="form-control bg-transparent" />
                            </div>
                            <div class="fv-row mb-5">
                                <input type="text" placeholder="Email" name="email" class="form-control bg-transparent" />
                            </div>

                            <div class="fv-row mb-5" data-kt-password-meter="true">
                                <div class="mb-1">
                                    <div class="position-relative mb-3">
                                        <input class="form-control bg-transparent" type="password" placeholder="Password" name="password" autocomplete="off" />
                                        <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
                                            <i class="ki-outline ki-eye-slash fs-2"></i><i class="ki-outline ki-eye fs-2 d-none"></i> </span>
                                    </div>

                                    <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                                        <div class="flex-grow-1 bg-gray-300 bg-active-success rounded h-5px me-2"></div>
                                        <div class="flex-grow-1 bg-gray-300 bg-active-success rounded h-5px me-2"></div>
                                        <div class="flex-grow-1 bg-gray-300 bg-active-success rounded h-5px me-2"></div>
                                        <div class="flex-grow-1 bg-gray-300 bg-active-success rounded h-5px"></div>
                                    </div>
                                </div>
                                <div class="text-muted">Use 8 or more characters with a mix of letters, numbers & symbols.</div>
                            </div>

                            <div class="fv-row mb-3" data-kt-password-meter="true">
                                <div class="position-relative mb-3">
                                    <input placeholder="Repeat Password" name="confirm-password" type="password" autocomplete="off" class="form-control bg-transparent" />
                                    <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
                                        <i class="ki-outline ki-eye-slash fs-2"></i><i class="ki-outline ki-eye fs-2 d-none"></i> </span>
                                </div>
                            </div>

                            <div class="fv-row mb-8">
                                <label class="form-check form-check-inline" for="checkbox-toc">
                                    <input class="form-check-input" type="checkbox" id="checkbox-toc" name="toc" value="1" />
                                    <span class="form-check-label fw-semibold text-gray-700 fs-base ms-1">
                                        I Accept the <a href="#" class="ms-1 link-primary">Terms</a>
                                    </span>
                                </label>
                            </div>

                            <div class="d-grid mb-10">
                                <button type="submit" id="kt_sign_up_submit" class="btn bg-royal btn-dark ">
                                    <span class="indicator-label">Sign up</span>
                                    <span class="indicator-progress">Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                    </span>
                                </button>
                            </div>

                            <div class="text-gray-500 text-center fw-semibold fs-6">Already have an Account?
                                <a href="{{route('signin')}}" class="link-primary fw-semibold">Sign in</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        var hostUrl = "/";
    </script>
    <script src="./assets/plugins/global/plugins.bundle.js"></script>
    <script src="./assets/js/scripts.bundle.js"></script>
    <script src="./assets/js/custom/authentication/sign-up/general.js"></script>

</body>

</html>