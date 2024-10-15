$("#AddDataModelToggle").click(function () {

    var RecordId = document.getElementById('CompanyProfileId').value;
    // alert(RecordId)
    // var RecordId = 1;

    OpenModel(
        {
            Data: `/admin/company/edit/${RecordId}`,
            Method: "get",
            IsUrl: 1,
            Title: "Edit Profile",
            FormData: {},
            Functions: {
                Init: (response) => { },
                Success: (response) => {
                    $("#CommonForm").validate({
                        rules: {
                            company_name: {
                                required: true,
                                minlength: 2 // Assuming a name should be at least 2 characters long
                            },
                            address: {
                                required: true,
                            },
                            email_1: {
                                required: true,
                            },
                            phone_1: {
                                required: true,
                            },
                            email_2: {
                                required: true,
                            },
                            phone_2: {
                                required: true,
                                digits: true, // Ensures the phone number contains only digits
                            },
                            location: {
                                required: true,
                                minlength: 6 // Assuming a password should be at least 6 characters long
                            },
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
                                    Swal.fire({
                                        title: "Updated Successfully!",
                                        icon: "success",
                                        didClose: () => {
                                            location.reload();
                                        }
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
