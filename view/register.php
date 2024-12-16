<div class="relative overflow-x-auto">
  <div class="flex flex-wrap justify-center items-center">
    <div class="w-9/12 p-2">
      <?php
      $errMessage = filter_input(INPUT_GET, 'message', FILTER_SANITIZE_STRING);
      if (isset($errMessage)) {
        echo '<div class="w-full border-2 rounded bg-red-400 px-3 py-3 font-semibold">' . $errMessage . '</div>';
      }
      ?>
      <form class="w-full" method="post" action="?menu=register_process">
        <div class="md:flex md:items-center mb-2">
          <div class="md:w-1/6">
            <label class="block font-bold md:text-right mb-1 md:mb-0 pr-4" for="name">
              Name <span class="text-red-500">*</span>
            </label>
          </div>
          <div class="md:w-5/6">
            <input class="appearance-none border-2 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:border-teal-500" id="name" type="text" name="name" placeholder="e.g. John Doe" maxlength="100" autofocus required>
          </div>
        </div>
        <div class="md:flex md:items-center mb-2">
          <div class="md:w-1/6">
            <label class="block font-bold md:text-right mb-1 md:mb-0 pr-4" for="email">
              Email <span class="text-red-500">*</span>
            </label>
          </div>
          <div class="md:w-5/6">
            <input class="appearance-none border-2 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:border-teal-500" id="email" type="email" placeholder="your.email@domain.com" maxlength="100" name="email" required>
          </div>
        </div>
        <div class="md:flex md:items-center mb-2">
          <div class="md:w-1/6">
            <label class="block font-bold md:text-right mb-1 md:mb-0 pr-4" for="phone">
              Phone <span class="text-red-500">*</span>
            </label>
          </div>
          <div class="md:w-5/6">
            <input class="appearance-none border-2 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:border-teal-500" id="phone" type="tel" placeholder="e.g. 6281122334455" maxlength="15" name="phone" required>
          </div>
        </div>
        <div class="md:flex md:items-center mb-2">
          <div class="md:w-1/6">
            <label class="block font-bold md:text-right mb-1 md:mb-0 pr-4" for="password">
              Password <span class="text-red-500">*</span>
            </label>
          </div>
          <div class="md:w-5/6">
            <input class="appearance-none border-2 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:border-teal-500" id="password" type="password" placeholder="Your Secret Key" maxlength="100" name="password" required>
          </div>
        </div>
        <div class="md:flex md:items-center mb-2">
          <div class="md:w-1/6">
            <label class="block font-bold md:text-right mb-1 md:mb-0 pr-4" for="confirm_password">
              Retype Password <span class="text-red-500">*</span>
            </label>
          </div>
          <div class="md:w-5/6">
            <input class="appearance-none border-2 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:border-teal-500" id="confirm_password" type="password" placeholder="Retype Your Secret Key" maxlength="100" name="confirm_password" required>
          </div>
        </div>
        <div class="md:flex md:items-center">
          <div class="md:w-1/6"></div>
          <div class="md:w-5/6">
            <button class="shadow bg-teal-400 hover:bg-teal-800 focus:shadow-outline focus:outline-none font-bold py-2 px-4 rounded" type="submit">
              Login
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>