// document.addEventListener('DOMContentLoaded', function () {
//     document.body.style.zoom = "100%";
// })

function OpenModel(options) {
    console.log(options)

    var settings = $.extend(
        {
            // These are the defaults.
            Data: "",
            Method: "GET",
            IsUrl: 1,
            Title: "Common Model",
            FormData: {},
            Functions: {
                Init: (response) => { },
                Success: (response) => { },
                Failure: (response) => { },
            },

        },
        options
    );

    var Data = settings.Data;
    var Method = settings.Method ?? "GET";
    var IsUrl = settings.IsUrl ?? 1;
    var Title = settings.Title ?? "Common Model";
    var FormData = settings.FormData ?? {};

    var Model = $("#CommonModel");
    var ModelLabel = Model.find("#CommonModelLabel");
    var ModelBody = Model.find("#CommonModelBody");


    if (!Data || Data == "") {
        IsUrl ?
            console.error(`AjaxApi url cannot be empty!`) :
            console.error(`Model Data cannot be empty!`);

        return false;
    }

    var Functions = settings.Functions;

    if (
        Functions.Init &&
        typeof Functions.Init !== "undefined" &&
        typeof Functions.Init === "function"
    ) {
        var InitSettings = delete settings.Functions;
        Functions.Init(InitSettings);
    }

    if (IsUrl) {
        AjaxApi({
            Url: Data,
            FormData: FormData,
            DataType: "JSON",
            Method: Method,
            Functions: {
                Success: (response) => {
                    var RespData = response.data.data;
                    ModelLabel.html(Title);


                    ModelBody.html(RespData);


                    if (
                        Functions.Success &&
                        typeof Functions.Success !== "undefined" &&
                        typeof Functions.Success === "function"
                    ) {
                        Functions.Success(response);
                    }
                },
            },
        })
    }
}


function AjaxApi(options) {

    var settings = $.extend(
        {
            // These are the defaults.
            Url: "",
            Method: "GET",
            FormData: {},
            DataType: "",
            Button: {
                Target: "",
                Default: "",
                OnClick: "",
                Success: "",
                Failure: "",
            },
            Functions: {
                Init: (response) => { },
                Success: (response) => { },
                Failure: (response) => { },
            },

        },
        options
    );

    var Url = settings.Url;
    var Method = settings.Method ?? "GET";
    var FormData = settings.FormData ?? {};
    var DataType = settings.DataType ?? "";
    var Button = settings.Button.Target ?? "";
    var DefaultButton = settings.Button.Default ?? "";
    var OnClickButton = settings.Button.OnClick ?? "";
    var SuccessButton = settings.Button.Success ?? DefaultButton ?? "Success!";
    var FailureButton = settings.Button.Failure ?? DefaultButton ?? "Try Again!";

    if (!Url || Url == "") {
        console.error(`AjaxApi url cannot be empty: ${Url}`)
        return false;
    }

    var Functions = settings.Functions;

    var ButtonId = "";

    if (Button != "") {
        Button.html(OnClickButton).attr("disabled", true);
        ButtonId = Button.attr("id");
    }

    if (
        Functions.Init &&
        typeof Functions.Init !== "undefined" &&
        typeof Functions.Init === "function"
    ) {
        var InitSettings = delete settings.Functions;
        Functions.Init(InitSettings);
    }


    axios({
        method: Method,
        url: Url,
        data: FormData,
    })
        .then(function (response) {
            if (Button != "") {
                Button.html(SuccessButton).attr("disabled", false);
            }

            if (
                Functions.Success &&
                typeof Functions.Success !== "undefined" &&
                typeof Functions.Success === "function"
            ) {
                Functions.Success(response);
            }
        })
        .catch(function (response) {

            console.log(response);

            if (Button != "") {
                Button.html(FailureButton).attr("disabled", false);
            }

            if (
                Functions.Failure &&
                typeof Functions.Failure !== "undefined" &&
                typeof Functions.Failure === "function"
            ) {
                Functions.Failure(response);
            }
        });


}
jQuery.validator.setDefaults({
    debug: false,
    onkeyup: false,
    ignore: ":hidden:not([class~=selectized],  [class~=choices__input], [name=full_phone1],[name=full_phone],[name=full_phone2]), :hidden > .selectized, .selectize-control .selectize-input input",
    errorClass: 'error-message',
    highlight: function (element, errorClass, validClass) {
        $(element).addClass('input-error'); // Add the error class to the input
    },
    unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass('input-error'); // Remove the error class from the input
    },
    errorPlacement: function (error, element) {
        if (element.is("select.choices__input")) {
            error.insertAfter(element.closest(".choices"));
        } else {
            error.insertAfter(element);
        }

    },
});


function passwordAddon() {
    document.querySelectorAll('.password-addon').forEach(button => {
        button.addEventListener('click', function () {
            const passwordField = this.parentElement.querySelector('input');
            const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordField.setAttribute('type', type);
            this.querySelector('i').classList.toggle('ri-eye-fill');
            this.querySelector('i').classList.toggle('ri-eye-off-fill');
        });
    });

}

function intelInput() {
    const input = document.querySelector("#phone");
    window.intlTelInput(input, {
        utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@23.6.1/build/js/utils.js",
    });
}

function displayValidationErrors(errors) {
    // Clear any existing error messages
    $('.error-message').remove();

    // Iterate through the errors and display them
    $.each(errors, function (field, messages) {
        let errorMessage = messages.join(', ');
        let inputField = $('input[name="' + field + '"],textarea[name="' + field + '"]');

        if (inputField.length) {
            let errorElement = $(`<label class="error-message" for="${field}"></label>`).text(errorMessage);
            inputField.after(errorElement);
        }
    });
}




function InitChoices() {
    const selects = document.querySelectorAll('select');
    selects.forEach(select => {
        new Choices(select, {
            searchEnabled: true, // Enable search
            removeItemButton: true, // Enable remove button for multi-select
            placeholderValue: 'Select an option', // Placeholder text
            noResultsText: 'No results found', // Text for no results
            position: 'bottom',
            duplicateItemsAllowed: false,

        });
    });

}
document.addEventListener('DOMContentLoaded', function () {
    const currentPath = window.location.pathname;
    const navLinks = document.querySelectorAll('.nav-item a');

    navLinks.forEach(link => {
        const linkPath = link.href.split('#')[0];
        const currentBasePath = currentPath.split('/').slice(0, 3).join('/');
        const linkBasePath = linkPath.split('/').slice(0, 3).join('/');

        if (currentBasePath === linkBasePath) {
            link.parentElement.classList.add('active');
        } else {
            link.parentElement.classList.remove('active');
        }
    });
});

passwordAddon();
InitChoices();
