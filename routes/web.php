<?php

use App\Http\Controllers\Admin\TestimonialController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\PreventBackHistory;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CompanyProfileController;
use App\Http\Controllers\Admin\DestinationController;
use App\Http\Controllers\Admin\DurationController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\HomeController;

Route::controller(HomeController::class)->group(function () {

    Route::get("/", "index")->name("IndexView");
    Route::get("about-us", "about")->name("AboutView");
    Route::get("destination-list", "destination_list")->name("DestinationView");
    Route::get("tour-list", "tour_list")->name("TourView");
    Route::get("gallery", "gallery")->name("GalleryView");
    Route::get("contact-us", "contact")->name("ContactView");
    Route::get("tour-detail/{id}", "tour_detail")->name("TourDetailView");

});

Route::prefix('enquiry')->controller(FrontendController::class)->group(function () {
    Route::post("add", "add")->name("AddEnquiry");
});

Route::prefix('packages')->controller(FrontendController::class)->group(function () {
    Route::get("fetch", "fetch")->name("FetchPackagesByFilter");
});

Route::prefix('admin')->controller(AuthController::class)->group(function () {
    Route::get("login", "login")->name("LoginView");
    Route::post("admin_login", "admin_login")->name("AdminLogin");

    Route::get("profile", "profile")->name("AdminProfile");
    Route::get("form", "form")->name("EditAdminForm");
    Route::get("password/form", "password_form")->name("EditPasswordAdminForm");

    Route::post("edit", "edit")->name("EditAdminProfile");
    Route::post("change/password", "change_password")->name("ChangeAdminPassword");
});



Route::prefix('admin')->middleware('auth')->group(function () {
    Route::middleware([PreventBackHistory::class])->group(function () {

        Route::controller(AuthController::class)->group(function () {
            Route::get("dashboard", "dashboard")->name("DashboardView");
            Route::get("logout_admin", "logout_admin")->name("AdminLogout");
        });

        Route::controller(UserController::class)->prefix('users')->group(function () {
            Route::get("list", "users_list")->name("UserListView");
            Route::get("create", "form")->name("UserFormView");
            Route::post("edit/{id}", "form")->name("UserEditFormView");
            Route::post("password/{id}", "password_form")->name("PasswordEditFormView");

            Route::get("fetch", "fetch")->name("FetchUser");
            Route::post("add", "add")->name("AddUser");
            Route::post("edit", "edit")->name("EditUser");
            Route::post("delete/{id}", "delete")->name("DeleteUser");
            Route::post("password", "change_password")->name("ChangePassword");
        });

        Route::controller(DurationController::class)->prefix('duration')->group(function () {
            Route::get("list", "list")->name("DurationListView");
            Route::get("create", "form")->name("DurationFormView");
            Route::post("edit/{id}", "form")->name("DurationEditFormView");

            Route::get("fetch", "fetch")->name("FetchDuration");
            Route::get("fetch_detail/{id}", "fetch_detail")->name("FetchDurationDetail");
            Route::post("add", "add")->name("AddDuration");
            Route::post("edit", "edit")->name("EditDuration");
            Route::post("delete/{id}", "delete")->name("DeleteDuration");
        });

        Route::controller(DestinationController::class)->prefix('destination')->group(function () {
            Route::get("list", "list")->name("DestinationListView");
            Route::get("create", "form")->name("DestinationFormView");
            Route::post("edit/{id}", "form")->name("DestinationEditFormView");

            Route::get("fetch", "fetch")->name("FetchDestination");
            Route::post("add", "add")->name("AddDestination");
            Route::post("edit", "edit")->name("EditDestination");
            Route::post("delete/{id}", "delete")->name("DeleteDestination");
        });

        Route::controller(PackageController::class)->prefix('package')->group(function () {
            Route::get("list", "list")->name("PackageListView");
            Route::get("create", "form")->name("PackageFormView");
            Route::get("edit/{id}", "form")->name("PackageEditFormView");
            Route::get("view/{id}", "form")->name("PackageViewOnly");
            Route::get("image/{id}", "image_view")->name("PackageImageViewOnly");



            Route::get("fetch", "fetch")->name("FetchPackage");
            Route::post("add", "add")->name("AddPackage");
            Route::post("edit", "edit")->name("EditPackage");
            Route::post("delete/{id}", "delete")->name("DeletePackage");
            Route::get("image/fetch/{id}", "fetchImages")->name("FetchImagesPackage");
            Route::post("image/upload/{id}", "upload_image")->name("UploadImage");
        });

        Route::controller(TestimonialController::class)->prefix('testimonial')->group(function () {
            Route::get("list", "list")->name("TestimonialListView");
            Route::get("create", "form")->name("TestimonialFormView");
            Route::post("edit/{id}", "form")->name("TestimonialEditFormView");

            Route::get("fetch", "fetch")->name("FetchTestimonial");
            Route::post("add", "add")->name("AddTestimonial");
            Route::post("edit", "edit")->name("EditTestimonial");
            Route::post("delete/{id}", "delete")->name("DeleteTestimonial");
        });

        Route::controller(CompanyProfileController::class)->prefix('company')->group(function () {
            Route::get("profile", "profile")->name("ProfileView");
            Route::get("edit/{id}", "form")->name("ProfileEditFormView");

            Route::post("edit", "edit")->name("EditProfile");
        });

        Route::controller(GalleryController::class)->prefix('gallery')->group(function () {
            Route::get("list", "list")->name("GalleryListView");
            Route::get("create", "form")->name("GalleryFormView");

            Route::get("fetch", "fetch")->name("FetchGallery");
            Route::post("add", "add")->name("AddGallery");
            Route::post("delete/{id}", "delete")->name("DeleteGallery");
        });
    });
});




// Route::group([],base_path("routes/admin.php"));
