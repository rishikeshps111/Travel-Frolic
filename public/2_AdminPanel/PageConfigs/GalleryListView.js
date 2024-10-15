$("#AddDataModelToggle").click(function () {
    OpenModel(
        {
            Data: '/admin/gallery/create',
            Method: "GET",
            IsUrl: 1,
            Title: "Add Images",
            FormData: {},
            Functions: {
                Init: (response) => { },
                Success: (response) => {
                    InitChoices();
                    ImageUpload();
                    $("#CommonForm").validate({
                        rules: {
                            destination: {
                                required: true,
                            },
                            'images[]': {
                                required: true,
                            },
                        },
                        messages: {
                            destination: "Please select a destination",
                            'images[]': "Please upload at least one image",
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
                                        },
                                        didClose: () => {
                                            location.reload();
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

function ImageUpload() {

    var imgUpload = document.getElementById('upload-img')
    var imgPreview = document.getElementById('img-preview')
    var totalFiles
    var img;

    imgUpload.addEventListener('change', previewImgs, true);

    function previewImgs(event) {
        totalFiles = imgUpload.files.length;

        if (!!totalFiles) {
            imgPreview.classList.remove('img-thumbs-hidden');
        }

        for (var i = 0; i < totalFiles; i++) {
            wrapper = document.createElement('div');
            wrapper.classList.add('wrapper-thumb');
            // removeBtn = document.createElement("span");
            // nodeRemove = document.createTextNode('x');
            // removeBtn.classList.add('remove-btn');
            // removeBtn.appendChild(nodeRemove);
            img = document.createElement('img');
            img.src = URL.createObjectURL(event.target.files[i]);
            img.classList.add('img-preview-thumb');
            wrapper.appendChild(img);
            // wrapper.appendChild(removeBtn);
            imgPreview.appendChild(wrapper);

            // $('.remove-btn').click(function () {
            //     $(this).parent('.wrapper-thumb').remove();
            // });

        }

    }
}

$("body").on('click', '.view-button', function () {
    const imageUrl = $(this).closest('.grid-item').find('img').attr('src');
    $('#modalImage').attr('src', imageUrl); // Set the source of the modal image
    $('#imageModal').fadeIn(); // Show the modal
});

$("body").on('click', '.delete-button', function () {

    const RecordId = $(this).closest('.grid-item').find('img').attr('data-id');
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
                Url: `/admin/gallery/delete/${RecordId}`,
                DataType: "JSON",
                Method: "POST",
                Functions: {
                    Success: (response) => {
                        Swal.fire({
                            title: 'Deleted!',
                            text: 'Image has been deleted.',
                            icon: 'success',
                            confirmButtonClass: 'btn btn-primary w-xs mt-2',
                            buttonsStyling: false,
                            didClose: () => {
                                location.reload();
                            }
                        })
                    },
                },
            })

        }
    });
});

$('.close-button').on('click', function () {
    $('#imageModal').fadeOut(); // Hide the modal when close button is clicked
});

$('#imageModal').on('click', function (event) {
    if (event.target === this) {
        $(this).fadeOut();
    }
});


var $grid = $('.grid').masonry({
    // options
});

$grid.imagesLoaded().progress(function () {
    $grid.masonry('layout');
});



