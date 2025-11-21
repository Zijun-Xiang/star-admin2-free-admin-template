

<h1>Star Admin2 Free Bootstrap Admin Template</h1>
Star Admin 2 Free is an open-source, admin dashboard template built with <a href="https://getbootstrap.com/" target="_blank">Bootstrap 5</a>  created by <a href="https://www.bootstrapdash.com/" target="_blank">BootstrapDash</a>.

<h2>Preview</h2>
<a href="https://www.bootstrapdash.com/demo/star-admin2-free/template/" target="_blank"><img src="screenshot.jpg"></a>

<h2>Download and installation</h2>


1 - Install node package. If you don’t know the installation steps, please click <a href="https://nodejs.org/en/">here</a>.

2 - Click the Clone or Download button in GitHub and download as a ZIP file or you can enter the command git clone https://github.com/BootstrapDash/star-admin2-free-admin-template.git in your terminal to get a copy of this template.

3 - After the files have been downloaded you will get a folder with all the required files

4 - Open your terminal (Run as Administrator). You can install all the dependencies in the template by running the command npm install. All the required files are in the node modules. If you didn't run with admin authorities, you can see errors.

5 - Find the file named index.html, check what all components you need. Open the file in a text editor and you can start editing.

6 - Now that your project has now kick-started, all you need to do now is to code, code, and code to your heart's content.

Star Admin 2 Free is a free admin dashboard template built with Bootstrap 5. We took the original Star Admin Pro and gave it a design overhaul along with newly written code to create our best template yet. This is a modern-looking dashboard with a clean and elegant design. The template is well crafted, with all the components neatly and carefully designed and arranged within the template. Star Admin 2 Free comes with a clean and well-commented code that makes it easy to work with the template. Thus making it an ideal pick for jump-starting your project.

<h2>Browser Support:</h2>

Star Admin 2 Free is designed to work flawlessly with all the latest and modern web browsers.

<h2>License Information:</h2>


Star Admin 2 Free is released under MIT license. This is a free Bootstrap 5 admin template developed from BootstrapDash. Feel free to download, use, share, and get creative with it.



<h2>How to Contribute?:</h2>


We love your contributions and we welcome them wholeheartedly. We believe the more the merrier. To contribute make sure you have Node.js and npm installed. Now run the command gulp --version. If the command returns with the Gulp version number, it means you have Gulp installed. If not you need to run the command npm install --global gulp-cli to install Gulp.


After Gulp has been installed, follow the steps below to contribute.
  <br>
	1 -  Fork and clone the repo of Star Admin 2 Free
  <br>
	2 - Run the command npm install to install all the dependencies.
  <br>
	3 - Enter the command gulp serve. This will open Star Admin 2 Free in your default browser.
  <br>
	4 - Make your valuable contribution
  <br>
	5 - Submit a pull request
  <hr>
Do you need a template with more features and functionalities? Check out the premium version of Star Admin 2! Visit <a href="https://www.bootstrapdash.com" target="_blank">https://www.bootstrapdash.com</a> for more admin templates.

<h2>Use Star Admin 2 in a Laravel project</h2>

If you want to plug the free template into a Laravel app, the steps below mirror a typical setup flow:

0.1 Create a project (or switch into an existing one)

```bash
laravel new petsapp
cd petsapp
```

0.2 Install dependencies

```bash
composer install
npm install # Skip if you do not need a front-end build
```

0.3 Clone your fork of Star Admin 2 inside the Laravel project

```bash
git clone https://github.com/your-github-username/star-admin2-free-admin-template.git theme
```

0.4 Copy the template assets into Laravel's public folder

```bash
cp -R theme/template/assets public/assets
```

0.5 Create view directories for your pages

```bash
mkdir -p resources/views/layouts resources/views/pets resources/views/owners resources/views/owns resources/views/foods resources/views/purchases
```

0.6 Register the routes that point to your controllers

Add a resourceful route set to `routes/web.php` so the dashboard pages can be rendered through Laravel:

```php
use App\Http\Controllers\PetController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\OwnController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\PurchaseController;

Route::get('/', function () {
    return redirect()->route('pets.index');
});

Route::resource('pets', PetController::class);
Route::resource('owners', OwnerController::class);
Route::resource('owns', OwnController::class);
Route::resource('foods', FoodController::class);
Route::resource('purchases', PurchaseController::class);
```

From here you can build Blade layouts that pull in the copied assets to render the dashboard inside Laravel.

<h3>Sample Blade layout</h3>

Drop the template assets into `public/assets` (as described above), then create a layout such as `resources/views/layouts/app.blade.php` to load the CSS/JS bundles and provide a slot for your page content:

```php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pets Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Star Admin 2 CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<body>
<div class="container-scroller">
    {{-- Optional navbar/sidebar pulled from your own partials --}}
    @include('partials.navbar')
    <div class="container-fluid page-body-wrapper">
        @include('partials.sidebar')

        <div class="main-panel">
            <div class="content-wrapper">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @yield('content')
            </div>
            {{-- footer --}}
        </div>
    </div>
</div>

{{-- Star Admin 2 JS --}}
<script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
<script src="{{ asset('assets/js/off-canvas.js') }}"></script>
<script src="{{ asset('assets/js/hoverable-collapse.js') }}"></script>
<script src="{{ asset('assets/js/template.js') }}"></script>
</body>
</html>
```

With this layout in place, any page that extends `layouts.app` will render inside the Star Admin 2 shell while pulling in your own navbar and sidebar partials.
