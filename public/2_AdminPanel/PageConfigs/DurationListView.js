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
                id: "Days",
                name: "Days",
                width: "120px",
                formatter: (cell, row) => {
                    return gridjs.html(
                        '<p>' + cell + " days</p>"
                    );
                },
            },
            {
                id: "Nights",
                name: "Nights",
                width: "120px",
                formatter: (cell, row) => {
                    return gridjs.html(
                        '<p>' + cell + " Nights</p>"
                    );
                },
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
                            </div>
                         </div>`
                    );
                },
            },
        ],
        server: {
            url: '/admin/duration/fetch',
            then: (response) => {
                var data = response.data;
                // console.log(response.data)
                data = data.map((list, index) => [
                    list.id,
                    index + 1,
                    list.days,
                    list.nights,
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
            Data: '/admin/duration/create',
            Method: "GET",
            IsUrl: 1,
            Title: "Add Duration",
            FormData: {},
            Functions: {
                Init: (response) => { },
                Success: (response) => {
                    $("#CommonForm").validate({
                        rules: {
                            days: {
                                required: true,
                            },
                            nights: {
                                required: true,
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
            Data: `/admin/duration/edit/${RecordId}`,
            Method: "POST",
            IsUrl: 1,
            Title: "Edit Duration",
            FormData: {},
            Functions: {
                Init: (response) => { },
                Success: (response) => {
                    $("#CommonForm").validate({
                        rules: {
                            days: {
                                required: true,
                            },
                            nights: {
                                required: true,
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
            Data: `/admin/duration/edit/${RecordId}`,
            Method: "POST",
            IsUrl: 1,
            Title: "View Duration",
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
                Url: `/admin/duration/delete/${RecordId}`,
                DataType: "JSON",
                Method: "POST",
                Functions: {
                    Success: (response) => {
                        var RespData = response.data.data;
                        CommonTableConfig.forceRender();

                        Swal.fire({
                            title: 'Deleted!',
                            text: 'Duration has been deleted.',
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
