"use strict";
var KTSigninGeneral = (function () {
    var t, e, r;
    return {
        init: function () {
            (t = document.querySelector("#kt_sign_in_form")),
                (e = document.querySelector("#kt_sign_in_submit")),
                (r = FormValidation.formValidation(t, {
                    fields: {
                        username: {
                            validators: {
                                notEmpty: {
                                    message: "Username address is required",
                                },
                            },
                        },
                        password: {
                            validators: {
                                notEmpty: {
                                    message: "The password is required",
                                },
                            },
                        },
                    },
                    plugins: {
                        trigger: new FormValidation.plugins.Trigger(),
                        bootstrap: new FormValidation.plugins.Bootstrap5({
                            rowSelector: ".fv-row",
                            eleInvalidClass: "",
                            eleValidClass: "",
                        }),
                    },
                })),
                !(function (t) {
                    try {
                        return new URL(t), !0;
                    } catch (t) {
                        return !1;
                    }
                })(
                    e.addEventListener("click", function (i) {
                        i.preventDefault(),
                            r.revalidateField("password"),
                            r.validate().then(function (r) {
                                "Valid" == r
                                    ? (e.setAttribute(
                                          "data-kt-indicator",
                                          "on"
                                      ),
                                      (e.disabled = !0),
                                      axios
                                          .post(
                                              e
                                                  .closest("form")
                                                  .getAttribute("action"),
                                              new FormData(t)
                                          )
                                          .then((response) => {
                                              console.log(response);
                                              if (response.data.success) {
                                                  Swal.fire({
                                                      text: "Signup successfully, Thank you!",
                                                      icon: "success",
                                                      buttonsStyling: !1,
                                                      cancelButton: true,
                                                      confirmButtonText:
                                                          "Login!",
                                                      customClass: {
                                                          confirmButton:
                                                              "btn btn-primary",
                                                      },
                                                  }).then(function (c) {
                                                      if (c.isConfirmed) {
                                                        location.href = '/';
                                                      }
                                                  });
                                              } else {
                                                  
                                                  Swal.fire({
                                                      html: `Sorry, looks like there are some errors detected, please try again. <br>
                                                            <div class="alert alert-danger p-3 mt-3" role="alert">
                                                            ${response.data.error}
                                                            </div>`,
                                                      icon: "error",
                                                      buttonsStyling: !1,
                                                      confirmButtonText:
                                                          "Try again!",
                                                      customClass: {
                                                          confirmButton:
                                                              "btn btn-primary shadow",
                                                      },
                                                  });
                                              }
                                          })
                                          .catch((error) => {
                                              console.log(error.response.data);
                                              Swal.fire({
                                                  text: "Sorry, looks like there are some errors detected, please try again.",
                                                  icon: "error",
                                                  buttonsStyling: !1,
                                                  confirmButtonText:
                                                      "Ok, Try again!",
                                                  customClass: {
                                                      confirmButton:
                                                          "btn btn-primary",
                                                  },
                                              });
                                          })
                                          .then(() => {
                                              e.removeAttribute(
                                                  "data-kt-indicator"
                                              ),
                                                  (e.disabled = !1);
                                          }))
                                    : Swal.fire({
                                          text: "Sorry, looks like there are some errors detected, please try again.",
                                          icon: "error",
                                          buttonsStyling: !1,
                                          confirmButtonText: "Ok, got it!",
                                          customClass: {
                                              confirmButton: "btn btn-primary",
                                          },
                                      });
                            });
                    }),
                    t
                        .querySelector('input[name="password"]')
                        .addEventListener("input", function () {
                            this.value.length > 0 &&
                                r.updateFieldStatus("password", "NotValidated");
                        })
                );
        },
    };
})();
KTUtil.onDOMContentLoaded(function () {
    KTSigninGeneral.init();
});
