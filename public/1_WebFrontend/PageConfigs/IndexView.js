$(document).ready(function () {
    $("#KnowYourPlans").validate({
        rules: {
            name: {
                required: true,
            },
            phone: {
                required: true,
            },
            email_id: {
                required: true,
                email: true // Ensures the email is in the correct format
            },
        },
        messages: {
            name: {
                required: "field is required", // Error message as a placeholder
            },
            phone: {
                required: "field is required",
            },
            email_id: {
                required: "field is required",
                email: true
            },
        },
        errorPlacement: function (error, element) {
            element.addClass('is-invalid error-placeholder'); // Apply custom styles to the input
            element.attr("placeholder", error.text()); // Set the error message as the placeholder
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid').removeClass('is-valid');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid error-placeholder'); // Remove error styles when valid
            $(element).attr("placeholder", ""); // Clear the placeholder
        }
    });
});

document.getElementById('KnowYourPlans').addEventListener('submit', (Event) => {

    Event.preventDefault();
    if (!$("#KnowYourPlans").valid())
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
            Swal.fire({
                title: "Thank You For Contacting Us!",
                text: "Our team will connect with you soon.", // Subtitle text
                icon: "success",
                confirmButtonColor: "#029e9d",
                didClose: () => {
                    Form.reset();
                }
            });
        })
        .catch(error => {
        });
});