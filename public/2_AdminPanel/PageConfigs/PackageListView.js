
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
                id: "Image",
                name: "Images",
                width: "60px",
                sort: false,
                formatter: (cell, row) => {
                    // console.log(row);
                    // alert(row.cells[0].data);
                    if (!cell || cell.length === 0) {
                        return gridjs.html('<span class="badge bg-warning">No Records</span>'); // Message when no images are found
                    }
                    const images = cell;
                    return gridjs.html(
                        `<div class="avatar-group">
                        ${images.map(image => `
                            <div class="avatar view-btn">
                                <img src="/storage/file_uploads/package/${image.id}/${image.image}" alt="Image">
                            </div>
                        `).join('')}
                        </div>`
                    );
                },
            },
            {
                id: "PackageName",
                name: "Title",
                width: "100px",
            },
            {
                id: "Destination",
                name: "Main Destination",
                width: "100px",
            },
            {
                id: "Duration",
                name: "Duration",
                width: "100px",
            },
            {
                id: "Price",
                name: "Price",
                width: "100px",
            },
            {
                id: "Status",
                name: "Status",
                width: "80px",
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
                              <a class="text-secondary ViewRecord" href="/admin/package/view/${row.cells[0].data}"><i class="ri-eye-fill me-2"></i>View</a>
                              <a class="text-secondary EditRecord" href="/admin/package/edit/${row.cells[0].data}"><i class="ri-pencil-line me-2"></i>Edit</a>
                              <a class="text-secondary ImageRecord" href="#" data-bs-toggle="modal"
                                data-bs-target="#CommonModel"><i class="ri-folder-image-fill me-2"></i>Image</a>
                              <a class="text-danger DeleteRecord" href="#"><i class="ri-delete-bin-line me-2"></i>Delete</a>
                            </div>
                         </div>`
                    );
                },
            },
        ],
        server: {
            url: '/admin/package/fetch',
            then: (response) => {
                var data = response.data;
                data = data.map((list, index) => [
                    list.id,
                    index + 1,
                    list.package_images,
                    list.package_name,
                    list.destination_name,
                    `${list.days} days/${list.nights} nights`,
                    `${list.price} per person`,
                    list.status
                ]);

                return data;
            },
        },
    }).render(document.getElementById("CommonTable"));
}

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
                Url: `/admin/package/delete/${RecordId}`,
                DataType: "JSON",
                Method: "POST",
                Functions: {
                    Success: (response) => {
                        var RespData = response.data.data;
                        CommonTableConfig.forceRender();

                        Swal.fire({
                            title: 'Deleted!',
                            text: 'Package has been deleted.',
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

$("body").on("click", ".ImageRecord", function () {
    var RecordId = $(this).closest(".Rowctions").attr("data-RowId");

    OpenModel(
        {
            Data: `/admin/package/image/${RecordId}`,
            Method: "get",
            IsUrl: 1,
            Title: "Package Images",
            FormData: {},
            Functions: {
                Init: (response) => { },
                Success: (response) => {
                    DropZone(RecordId);
                },
                Failure: (response) => { },
            },
        });
});

$("body").on('click', '.view-btn', function () {
    const imageUrl = $(this).closest('.avatar').find('img').attr('src');
    $('#modalImage').attr('src', imageUrl); // Set the source of the modal image
    $('#imageModal').fadeIn(); // Show the modal
});

$('.close-button').on('click', function () {
    $('#imageModal').fadeOut(); // Hide the modal when close button is clicked
});

$('#imageModal').on('click', function (event) {
    if (event.target === this) {
        $(this).fadeOut();
    }
});


function DropZone(Id) {
    let myDropzone = new Dropzone("#my-awesome-dropzone", {
        url: `/admin/package/image/upload/${Id}`,
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        maxFilesize: 2, // Set maximum file size to 2MB
        acceptedFiles: 'image/jpeg,image/png,',
        maxFiles: 3,
        addRemoveLinks: true,
        success: function (file, response) {
            CommonTableConfig.forceRender();
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
                title: "Uploaded successfully"
            });
        },
    });

    myDropzone.on("addedfile", function (file) {
        if (this.files.length > 3) {
            this.removeFile(file); // Remove the file if the limit is exceeded
            Swal.fire({
                text: "You can only upload a maximum of 3 files.",
                icon: "warning"
            });
        }
    });

    // fetch(`/admin/package/image/fetch/${Id}`)
    // .then(response => response.json())
    // .then(existingFiles => {
    //     var Records = existingFiles.data;
    //     Records.forEach(function(file) {
    //         let mockFile = {
    //             name: file.name,
    //             size: file.size,
    //             url: file.url,
    //         };

    //         // Call the Dropzone `emit` method to add the existing file
    //         myDropzone.emit("addedfile", mockFile);
    //         myDropzone.emit("thumbnail", mockFile, file.url); // Set the thumbnail
    //         myDropzone.emit("complete", mockFile); // Mark as complete

    //         // Add the remove link functionality if needed
    //         mockFile.previewElement.querySelector('.dz-remove').addEventListener('click', function() {
    //             // Logic to handle removal (if required, such as an AJAX request)
    //             myDropzone.removeFile(mockFile); // Remove from Dropzone
    //         });
    //     });
    // })
    // .catch(error => {
    //     console.error("Error fetching images:", error);
    // });
}