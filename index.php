<?php
session_start();
if (!isset($_SESSION['logged_in'])) {
  $_SESSION['logged_in'] = false;
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="styles/app.css">
  <title>Software Engineering Demo 20241</title>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<div class="container max-w-screen-xl mx-auto px-4">
  <nav class="flex items-center justify-between flex-wrap bg-teal-600 p-6">
    <div class="flex items-center flex-shrink-0 text-white mr-6">
      <span class="font-semibold text-xl tracking-tight">My Library</span>
    </div>
    <div class="block lg:hidden">
      <button class="flex items-center px-3 py-2 border rounded text-teal-200 border-teal-400 hover:text-white hover:border-white">
        <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
          <title>Menu</title>
          <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/>
        </svg>
      </button>
    </div>
    <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto">
      <div class="text-sm lg:flex-grow">
        <a href="?menu=member-book-list" class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">
          Book Collection
        </a>
        <?php
        if ($_SESSION['logged_in'] && $_SESSION['role'] === 1) {
          ?>
          <a href="?menu=adm-book" class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">
            Book Administration
          </a>
          <?php
        }
        ?>
        <a href="#" class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white">
          Menu 2
        </a>
      </div>
    </div>
    <div class="lg:flex lg:items-center ml-auto">
      <div class="text-sm lg:flex-grow">
        <?php
        if (!$_SESSION['logged_in']) {
          ?>
          <a href="?menu=register" class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">
            Register
          </a>
          <a href="?menu=login" class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white">
            Login
          </a>
          <?php
        } else {
          echo $_SESSION['name'] . ' | ' . $_SESSION['role_name'];
          ?>
          <a href="?menu=logout" class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white">
            Logout
          </a>
          <?php
        }
        ?>
      </div>
    </div>
  </nav>
  <main>
    <?php include_once 'route/route.php'; ?>
  </main>
</div>
</body>
</html>