<div class="relative overflow-x-auto">
  <div class="flex flex-wrap justify-center items-center">
    <div class="max-w-xl p-2">
      <?php
      $successMessage = filter_input(INPUT_GET, 'success_message', FILTER_SANITIZE_STRING);
      if (isset($successMessage)) {
        echo '<div class="w-full border-2 rounded bg-green-400 px-3 py-3 font-semibold">' . $successMessage . '</div>';
      }
      $errMessage = filter_input(INPUT_GET, 'message', FILTER_SANITIZE_STRING);
      if (isset($errMessage)) {
        echo '<div class="w-full border-2 rounded bg-red-400 px-3 py-3 font-semibold">' . $errMessage . '</div>';
      }
      ?>
      <form class="w-full" method="post" action="?menu=login_process">
        <div class="md:flex md:items-center mb-3">
          <div class="md:w-1/4">
            <label class="block font-bold md:text-right mb-1 md:mb-0 pr-4" for="email">
              Email Address
            </label>
          </div>
          <div class="md:w-3/4">
            <input class="appearance-none border-2 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:border-teal-500" id="email" type="email" name="email" placeholder="your.email@domain.com" maxlength="100" autofocus required>
          </div>
        </div>
        <div class="md:flex md:items-center mb-3">
          <div class="md:w-1/4">
            <label class="block font-bold md:text-right mb-1 md:mb-0 pr-4" for="password">
              Password
            </label>
          </div>
          <div class="md:w-3/4">
            <input class="appearance-none border-2 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:border-teal-500" id="password" type="password" placeholder="Secret Key" maxlength="100" name="password" required>
          </div>
        </div>
        <div class="md:flex md:items-center">
          <div class="md:w-1/4"></div>
          <div class="md:w-3/4">
            <button class="shadow bg-teal-400 hover:bg-teal-800 focus:shadow-outline focus:outline-none font-bold py-2 px-4 rounded" type="submit">
              Login
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>