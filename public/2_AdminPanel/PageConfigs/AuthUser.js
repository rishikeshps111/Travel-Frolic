// alert('==')

$("#ProfileSection").click(function () {
    OpenModel(
        {
            Data: '/admin/profile',
            Method: "GET",
            IsUrl: 1,
            Title: "Profile",
            FormData: {},
            Functions: {
                Init: (response) => { },
                Success: (response) => { },
                Failure: (response) => { },
            },
        });
});

$("#EditProfileSection").click(function () {
    OpenModel(
        {
            Data: '/admin/form',
            Method: "GET",
            IsUrl: 1,
            Title: "Edit Profile",
            FormData: {},
            Functions: {
                Init: (response) => { },
                Success: (response) => {
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
                        },
                    });

                    if (document.getElementById('CommonForm')) {
                        document.getElementById('CommonForm').addEventListener('submit', (Event) => {
                            Event.preventDefault();
                            if (!$("#CommonForm").valid())
                                return false;
                            const Form = Event.target;

                            const inputFile = document.getElementById('image');
                            const file = inputFile.files[0];

                            const Data = new FormData(Form);
                            Data.append('file', file);

                            const FormAction = Form.getAttribute("action");
                            const Method = Form.getAttribute("method") ?? "GET";

                            axios({
                                method: Method,
                                url: FormAction,
                                data: Data,
                                headers: {
                                    'Content-Type': 'multipart/form-data',
                                }
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
                                        title: "Updated successfully"
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

$("#PasswordProfileSection").click(function () {
    OpenModel(
        {
            Data: '/admin/password/form',
            Method: "GET",
            IsUrl: 1,
            Title: "Change Password",
            FormData: {},
            Functions: {
                Init: (response) => { },
                Success: (response) => {
                    passwordAddon();
                    $("#CommonForm").validate({
                        rules: {
                            current_password: {
                                required: true,
                            },
                            new_password: {
                                required: true,
                                minlength: 6 // Assuming a password should be at least 6 characters long
                            },
                            confirm_password: {
                                required: true,
                                equalTo: "#new_password" // Ensures the password confirmation matches the password
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
                                        title: "Updated successfully"
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