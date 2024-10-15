document.querySelectorAll('.js-choice').forEach(element => {
    const choices = new Choices(element);
});

document.addEventListener('DOMContentLoaded', function () {
    FetchPackages();
});

['sort_by', 'destination', 'duration'].forEach(id => {
    document.getElementById(id).addEventListener('change', FetchPackages);
});

function FetchPackages(page = 1) {

    var sort_by = document.getElementById('sort_by').value || null;
    // var destination = document.getElementById('destination').value || null;
    // var duration = document.getElementById('duration').value || null;

    axios.get('/packages/fetch', {
        params: {
            // destination_id: destination,
            // duration_id: duration,
            sort_by: sort_by,
            per_page: 100,
            page: page
        }
    })
        .then(function (response) {
            const data = response.data.data.data;
            const rowElement = document.getElementById('PackageSection');
            rowElement.innerHTML = ''; // Clear existing content

            data.forEach(item => {
                var ImageSrc
                if (item.package_images && item.package_images.length > 0) {
                    item.package_images.forEach(image => {
                        ImageSrc = `/storage/file_uploads/package/${image.id}/${image.image}`;
                    });

                } else {
                    ImageSrc = `/1_WebFrontend/images/Dummy1.png`;
                }
                const trendItem = `
                <div class="col-lg-4 col-md-4 mb-4">
                    <div class="trend-item box-shadow rounded">
                        <div class="trend-image position-relative">
                            <img src="${ImageSrc}" alt="image">
                            <div class="color-overlay"></div>
                        </div>
                        <div class="trend-content p-4 pt-5 position-relative">
                            <div class="trend-meta bg-theme white px-3 py-2 rounded">
                                <div class="entry-author">
                                    <i class="icon-calendar"></i>
                                    <span class="fw-bold">${item.days} Days Tour</span>
                                </div>
                            </div>
                            <h5 class="theme mb-1"><i class="flaticon-location-pin"></i> ${item.destination_name}</h5>
                            <h3 class="mb-1"><a href="/tour-detail/${item.id}">${item.package_name}</a></h3>
                            
                            <p class="border-b pb-2 mb-2">${item.description}</p>
                            <div class="entry-meta">
                                <div class="entry-author d-flex align-items-center">
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            `;

                rowElement.insertAdjacentHTML('beforeend', trendItem);
            });
        })
        .catch(function (error) {
            alert('Something Went Wrong');
        });

}

// <p class="mb-0"><span class="theme fw-bold fs-5">₹${item.price}</span> | Per person</p>

//<div class="rating-main d-flex align-items-center pb-2">
//    <div class="rating">
//        ${generateStars(item.rating)}
//    </div>
//</div>

function generateStars(rating) {
    let stars = '';
    for (let i = 1; i <= 5; i++) {
        stars += `<span class="fa fa-star ${i <= rating ? 'checked' : ''}"></span>`;
    }
    return stars;
}