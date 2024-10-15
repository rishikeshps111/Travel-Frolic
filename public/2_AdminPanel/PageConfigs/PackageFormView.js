// Dropzone.options.myGreatDropzone = { // camelized version of the `id`
//     url: "/upload",
//     paramName: "file", // The name that will be used to transfer the file
//     maxFilesize: 5, // MB
//     maxFiles: 3, // Max number of files
//     acceptedFiles: 'image/jpeg,image/png', // Restrict to JPG and PNG
//     addRemoveLinks: true, // Allow file removal
//     headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
//     accept: function(file, done) {
//       if (file.name == "justinbieber.jpg") {
//         done("Naha, you don't.");
//       }
//       else { done(); }
//     },
//     success: function(file, response) {
//         // Log the file data
//         console.log("File uploaded successfully:", file);
//         console.log("Server response:", response);
//     },
//     init: function() {

//         // Limit to 3 images
//         this.on("addedfile", function(file) {
//             if (this.files.length > 3) {
//                 alert("You can only upload a maximum of 3 images.");
//                 this.removeFile(file); // Remove the last file
//             }
//         });

//         this.on("error", function(file, message) {
//             // alert(message);
//         });
//     }
//   };


document.getElementById('duration').addEventListener('change', function (event) {

    var Headers = document.getElementById('DaywiseHeading');
    const container = document.getElementById('DaywiseFields');
    let Days = null;

    if (this.value) {
        Headers.removeAttribute('hidden');
        fetch(`/admin/duration/fetch_detail/${this.value}`)
            .then(response => response.json())
            .then(data => {
                Days = data.data.days;
                generateDaywiseFields(Days);
                document.getElementById('DaywiseHeading').removeAttribute('hidden');
            })
            .catch(error => console.error('Error:', error));
    } else {
        Headers.setAttribute('hidden', '');
        container.innerHTML = '';
    }





});


function generateDaywiseFields(days) {
    const container = document.getElementById('DaywiseFields');
    container.innerHTML = ''; // Clear previous fields if any

    for (let i = 1; i <= days; i++) {
        const dayHtml = `
                                    <input type="hidden" name="daywise_day[]" value="${i}">
                                    <div class="col-4 ps-2">
                                        <label for="daywise_title_${i}" class="form-label">Day ${i} - Title</label>
                                        <input type="text" class="form-control" id="daywise_title_${i}" name="daywise_title[]"
                                            placeholder="Enter the title" value="" >
                                    </div>
                                    <div class="col-8 pe-0">
                                        <label for="daywise_description_${i}" class="form-label">Description</label>
                                        <textarea type="text" class="form-control" id="daywise_description_${i}" name="daywise_description[]"
                                            placeholder="Enter the description" value=""></textarea>
                                    </div>
        `;
        container.innerHTML += dayHtml;
    }
}

$("#CommonForm").validate({
    rules: {
        package_name: {
            required: true,
        },
        destination: {
            required: true,
        },
        duration: {
            required: true,
        },
        price: {
            required: true,
        },
        description: {
            required: true,
        },
        rating: {
            required: true,
        },
        'daywise_title[]': {
            required: true,
        },
        'daywise_description[]': {
            required: true,
        }

    },
    messages: {
        destination: {
            required: "Please select destination",
        },
        duration: {
            required: "Please select duration"
        },
        rating: {
            required: "Please select rating"
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
                Swal.fire({
                    title: "Package Added Successfully!",
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