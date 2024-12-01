<div class="relative overflow-x-auto">
  <div class="w-full p-2">
    <?php
    $errMessage = filter_input(INPUT_GET, 'message', FILTER_SANITIZE_STRING);
    if (isset($errMessage)) {
      echo '<div class="w-full border-2 rounded bg-red-400 px-3 py-3 font-semibold">' . $errMessage . '</div>';
    }
    ?>
    <form class="w-full" method="post" action="?menu=adm-book-store">
      <div class="md:flex md:items-center mb-3">
        <div class="md:w-1/5">
          <label class="block font-bold md:text-right mb-1 md:mb-0 pr-4" for="isbn13">
            ISBN-13
          </label>
        </div>
        <div class="md:w-4/5">
          <input class="appearance-none border-2 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:border-teal-500" id="isbn13" type="text" name="isbn13" placeholder="e.g.. 1234567890123" maxlength="13" autofocus required>
        </div>
      </div>
      <div class="md:flex md:items-center mb-3">
        <div class="md:w-1/5">
          <label class="block font-bold md:text-right mb-1 md:mb-0 pr-4" for="title">
            Title
          </label>
        </div>
        <div class="md:w-4/5">
          <input class="appearance-none border-2 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:border-teal-500" id="title" type="text" placeholder="e.g. Software Engineering: A Practitioner's Approach" maxlength="100" name="title" required>
        </div>
      </div>
      <div class="md:flex md:items-center mb-3">
        <div class="md:w-1/5">
          <label class="block font-bold md:text-right mb-1 md:mb-0 pr-4" for="author">
            Author
          </label>
        </div>
        <div class="md:w-4/5">
          <input class="appearance-none border-2 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:border-teal-500" id="author" type="text" placeholder="e.g. John Doe" maxlength="100" name="author" required>
        </div>
      </div>
      <div class="md:flex md:items-center mb-3">
        <div class="md:w-1/5">
          <label class="block font-bold md:text-right mb-1 md:mb-0 pr-4" for="publisher">
            Publisher
          </label>
        </div>
        <div class="md:w-4/5">
          <input class="appearance-none border-2 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:border-teal-500" id="publisher" type="text" placeholder="e.g. Maranatha Press" maxlength="100" name="publisher" required>
        </div>
      </div>
      <div class="md:flex md:items-center mb-3">
        <div class="md:w-1/5">
          <label class="block font-bold md:text-right mb-1 md:mb-0 pr-4" for="rack_number">
            Rack Number
          </label>
        </div>
        <div class="md:w-4/5">
          <input class="appearance-none border-2 rounded max-w-screen-sm py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:border-teal-500" id="title" type="text" placeholder="e.g. AB-12" maxlength="10" name="rack_number" required>
        </div>
      </div>
      <div class="md:flex md:items-center">
        <div class="md:w-1/5"></div>
        <div class="md:w-4/5">
          <button class="shadow bg-teal-400 hover:bg-teal-800 focus:shadow-outline focus:outline-none font-bold py-2 px-4 rounded" type="submit">Submit</button>
        </div>
      </div>
    </form>
  </div>
</div>