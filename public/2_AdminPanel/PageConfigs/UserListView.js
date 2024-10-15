
var CommonTableConfig = null;
var container = document.getElementById("CommonTable");
container.innerHTML = '';
if (document.getElementById("CommonTable")) {
    CommonTableConfig = new gridjs.Grid({
        pagination: {
            limit: 20,
        },
        sort: true,
        search: true,
        columns: [
            {
                name: "ID",
                hidden: true,
            },
            {
                id: "No",
                name: "No",
                width: "50px",
                formatter: (cell, row) => {
                    return gridjs.html(
                        '<b>' + cell + "</b>"
                    );
                },
            },
            {
                id: "Name",
                name: "Name",
                width: "120px",
            },
            {
                id: "Email",
                name: "Email",
                width: "120px",
            },
            {
                id: "Phone",
                name: "Phone",
                width: "120px",
            },
            {
                id: "Status",
                name: "Status",
                width: "100px",
                formatter: (cell) => {
                    if (cell == true)
                        return gridjs.html(
                            `<span class="badge bg-success">Active</span>`
                        );
                    else
                        return gridjs.html(
                            `<span class="badge bg-danger">Inactive</span>`
                        );
                },
            },
            {
                id: "Action",
                name: "Action",
                width: "50px",
                sort: false,
                formatter: (cell, row) => {
                    // console.log(row);
                    // alert(row.cells[0].data);
                    return gridjs.html(
                        `<div class="c-f-o-dropdown Rowctions" data-RowId='${row.cells[0].data}'>
                            <button class="c-f-o-dropdown-btn"><i class="ri-more-fill align-middle"></i></button>
                            <div class="c-f-o-dropdown-content">
                              <a class="text-secondary ViewRecord" href="#"  data-bs-toggle="modal"
                                data-bs-target="#CommonModel"><i class="ri-eye-fill me-2"></i>View</a>
                              <a class="text-secondary EditRecord" href="#" data-bs-toggle="modal"
                                data-bs-target="#CommonModel"><i class="ri-pencil-line me-2"></i>Edit</a>
                              <a class="text-danger DeleteRecord" href="#"><i class="ri-delete-bin-line me-2"></i>Delete</a>
                              <a class="text-secondary ChangePassword" href="#" data-bs-toggle="modal"
                                data-bs-target="#CommonModel"><i class="ri-lock-line me-2"></i>Password</a>
                            </div>
                         </div>`
                    );
                },
            },
        ],
        server: {
            url: '/admin/users/fetch',
            then: (response) => {
                var data = response.data;
                // console.log(response.data)
                data = data.map((list, index) => [
                    list.id,
                    index + 1,
                    list.name,
                    list.email,
                    list.phone,
                    list.status
                ]);

                return data;
            },
        },
    }).render(document.getElementById("CommonTable"));
}

$("#AddDataModelToggle").click(function () {
    OpenModel(
        {
            Data: '/admin/users/create',
            Method: "GET",
            IsUrl: 1,
            Title: "Add User",
            FormData: {},
            Functions: {
                Init: (response) => { },
                Success: (response) => {
                    passwordAddon();
                    $("#CommonForm").validate({
                        rules: {
                            name: {
                                required: true,
                                minlength: 2 // Assuming a name should be at least 2 characters long
                            },
                            email: {
                                required: true,
                                email: true
                            },
                            phone: {
                                required: true,
                                digits: true, // Ensures the phone number contains only digits
                                minlength: 10, // Assuming a phone number should be at least 10 digits
                                maxlength: 15 // Assuming a phone number should not exceed 15 digits
                            },
                            password: {
                                required: true,
                                minlength: 6 // Assuming a password should be at least 6 characters long
                            },
                            confirm_password: {
                                required: true,
                                equalTo: "#password" // Ensures the password confirmation matches the password
                            }
                        },
                        messages: {
                            name: {
                                required: "Please enter your name",
                                minlength: "Your name must be at least 2 characters long"
                            },
                            email: {
                                required: "Please enter your email",
                                email: "Please enter a valid email address"
                            },
                            phone: {
                                required: "Please enter your phone number",
                                digits: "Please enter a valid phone number",
                                minlength: "Your phone number must be at least 10 digits long",
                                maxlength: "Your phone number must not exceed 15 digits"
                            },
                            password: {
                                required: "Please provide a password",
                                minlength: "Your password must be at least 6 characters long"
                            },
                            confirm_password: {
                                required: "Please confirm your password",
                                equalTo: "Passwords do not match"
                            }
                        },
                    });

                    if (document.getElementById('CommonForm')) {
                        document.getElementById('CommonForm').addEventListener('submit', (Event) => {
                            Event.preventDefault();
                            if (!$("#CommonForm").valid())
                                return false;
                            const Form = Event.target;
                            const Data = new FormData(Form);
                            const FormAction = Form.getAttribute("action");
                            const Method = Form.getAttribute("method") ?? "GET";

                            axios({
                                method: Method,
                                url: FormAction,
                                data: Data,
                                // headers: Headers,
                            })
                                .then(response => {
                                    CommonTableConfig.forceRender();
                                    $("#CommonModel").modal("hide");
                                    const Toast = Swal.mixin({
                                        toast: true,
                                        position: "top-end",
                                        showConfirmButton: false,
                                        timer: 3000,
                                        timerProgressBar: true,
                                        didOpen: (toast) => {
                                            toast.onmouseenter = Swal.stopTimer;
                                            toast.onmouseleave = Swal.resumeTimer;
                                        }
                                    });
                                    Toast.fire({
                                        icon: "success",
                                        title: "Added successfully"
                                    });
                                })
                                .catch(error => {
                                    if (error.response && error.response.data.errors) {
                                        displayValidationErrors(error.response.data.errors);
                                    } else {
                                        console.error('An error occurred:', error);
                                    }
                                });
                        });
                    }
                },
                Failure: (response) => { },
            },
        });
});


$("body").on("click", ".EditRecord", function () {
    var RecordId = $(this).closest(".Rowctions").attr("data-RowId");
    // console.log(RecordId);

    OpenModel(
        {
            Data: `/admin/users/edit/${RecordId}`,
            Method: "POST",
            IsUrl: 1,
            Title: "Edit User",
            FormData: {},
            Functions: {
                Init: (response) => { },
                Success: (response) => {
                    passwordAddon();
                    $("#CommonForm").validate({
                        rules: {
                            name: {
                                required: true,
                                minlength: 2 // Assuming a name should be at least 2 characters long
                            },
                            email: {
                                required: true,
                                email: true
                            },
                            phone: {
                                required: true,
                                digits: true, // Ensures the phone number contains only digits
                                minlength: 10, // Assuming a phone number should be at least 10 digits
                                maxlength: 15 // Assuming a phone number should not exceed 15 digits
                            },
                            password: {
                                required: true,
                                minlength: 6 // Assuming a password should be at least 6 characters long
                            },
                            confirm_password: {
                                required: true,
                                equalTo: "#password" // Ensures the password confirmation matches the password
                            }
                        },
                        messages: {
                            name: {
                                required: "Please enter your name",
                                minlength: "Your name must be at least 2 characters long"
                            },
                            email: {
                                required: "Please enter your email",
                                email: "Please enter a valid email address"
                            },
                            phone: {
                                required: "Please enter your phone number",
                                digits: "Please enter a valid phone number",
                                minlength: "Your phone number must be at least 10 digits long",
                                maxlength: "Your phone number must not exceed 15 digits"
                            },
                            password: {
                                required: "Please provide a password",
                                minlength: "Your password must be at least 6 characters long"
                            },
                            confirm_password: {
                                required: "Please confirm your password",
                                equalTo: "Passwords do not match"
                            }
                        },
                    });

                    if (document.getElementById('CommonForm')) {
                        document.getElementById('CommonForm').addEventListener('submit', (Event) => {
                            Event.preventDefault();
                            if (!$("#CommonForm").valid())
                                return false;
                            const Form = Event.target;
                            const Data = new FormData(Form);
                            const FormAction = Form.getAttribute("action");
                            const Method = Form.getAttribute("method") ?? "GET";

                            axios({
                                method: Method,
                                url: FormAction,
                                data: Data,
                                // headers: Headers,
                            })
                                .then(response => {
                                    CommonTableConfig.forceRender();
                                    $("#CommonModel").modal("hide");
                                    const Toast = Swal.mixin({
                                        toast: true,
                                        position: "top-end",
                                        showConfirmButton: false,
                                        timer: 3000,
                                        timerProgressBar: true,
                                        didOpen: (toast) => {
                                            toast.onmouseenter = Swal.stopTimer;
                                            toast.onmouseleave = Swal.resumeTimer;
                                        }
                                    });
                                    Toast.fire({
                                        icon: "success",
                                        title: "Edited successfully"
                                    });
                                })
                                .catch(error => {
                                    if (error.response && error.response.data.errors) {
                                        displayValidationErrors(error.response.data.errors);
                                    } else {
                                        console.error('An error occurred:', error);
                                    }
                                });
                        });
                    }
                },
                Failure: (response) => { },
            },
        });
});

$("body").on("click", ".ViewRecord", function () {
    var RecordId = $(this).closest(".Rowctions").attr("data-RowId");
    // console.log(RecordId);

    OpenModel(
        {
            Data: `/admin/users/edit/${RecordId}`,
            Method: "POST",
            IsUrl: 1,
            Title: "View User",
            FormData: {
                readonly: true,
            },
            Functions: {
                Init: (response) => { },
                Success: (response) => { },
                Failure: (response) => { },
            },
        });
});

$("body").on("click", ".DeleteRecord", function () {
    var RecordId = $(this).closest(".Rowctions").attr("data-RowId")
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonClass: 'btn btn-primary w-xs me-2 mt-2',
        cancelButtonClass: 'btn btn-danger w-xs mt-2',
        confirmButtonText: "Yes, delete it!",
        buttonsStyling: false,
        showCloseButton: true
    }).then(function (result) {

        if (result.value) {

            AjaxApi({
                Url: `/admin/users/delete/${RecordId}`,
                DataType: "JSON",
                Method: "POST",
                Functions: {
                    Success: (response) => {
                        var RespData = response.data.data;
                        CommonTableConfig.forceRender();

                        Swal.fire({
                            title: 'Deleted!',
                            text: 'User has been deleted.',
                            icon: 'success',
                            confirmButtonClass: 'btn btn-primary w-xs mt-2',
                            buttonsStyling: false
                        })
                    },
                },
            })

        }
    });
});

$("body").on("click", ".ChangePassword", function () {
    var RecordId = $(this).closest(".Rowctions").attr("data-RowId");
    // console.log(RecordId);

    OpenModel(
        {
            Data: `/admin/users/password/${RecordId}`,
            Method: "POST",
            IsUrl: 1,
            Title: "Change Password",
            FormData: {},
            Functions: {
                Init: (response) => { },
                Success: (response) => {
                    passwordAddon();
                    $("#CommonForm").validate({
                        rules: {
                            password: {
                                required: true,
                                minlength: 6 // Assuming a password should be at least 6 characters long
                            },
                            confirm_password: {
                                required: true,
                                equalTo: "#password" // Ensures the password confirmation matches the password
                            }
                        },
                        messages: {
                            password: {
                                required: "Please provide a password",
                                minlength: "Your password must be at least 6 characters long"
                            },
                            confirm_password: {
                                required: "Please confirm your password",
                                equalTo: "Passwords do not match"
                            }
                        },
                    });

                    if (document.getElementById('CommonForm')) {
                        document.getElementById('CommonForm').addEventListener('submit', (Event) => {
                            Event.preventDefault();
                            if (!$("#CommonForm").valid())
                                return false;
                            const Form = Event.target;
                            const Data = new FormData(Form);
                            const FormAction = Form.getAttribute("action");
                            const Method = Form.getAttribute("method") ?? "GET";

                            axios({
                                method: Method,
                                url: FormAction,
                                data: Data,
                                // headers: Headers,
                            })
                                .then(response => {
                                    $("#CommonModel").modal("hide");
                                    const Toast = Swal.mixin({
                                        toast: true,
                                        position: "top-end",
                                        showConfirmButton: false,
                                        timer: 3000,
                                        timerProgressBar: true,
                                        didOpen: (toast) => {
                                            toast.onmouseenter = Swal.stopTimer;
                                            toast.onmouseleave = Swal.resumeTimer;
                                        }
                                    });
                                    Toast.fire({
                                        icon: "success",
                                        title: "Password Changed successfully"
                                    });
                                })
                                .catch(error => {
                                    if (error.response && error.response.data.errors) {
                                        displayValidationErrors(error.response.data.errors);
                                    } else {
                                        console.error('An error occurred:', error);
                                    }
                                });
                        });
                    }
                },
                Failure: (response) => { },
            },
        });
});

