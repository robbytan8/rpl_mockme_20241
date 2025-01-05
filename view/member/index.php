<div class="relative overflow-x-auto">
  <div class="w-full p-2">
    <?php
    $errMessage = filter_input(INPUT_GET, 'err_message', FILTER_SANITIZE_STRING);
    if (isset($errMessage)) {
      echo '<div class="w-full border-2 rounded bg-red-400 px-3 py-3 font-semibold">' . $errMessage . '</div>';
    }
    ?>
    <div class="flex flex-wrap justify-center items-center">
      <?php
      /** @var Book $book */
      foreach ($books as $book) {
        ?>
        <div class="max-w-sm rounded overflow-hidden shadow-lg px-2 py-2 mx-2 my-2 bg-gray-200">
          <?php
          if ($book->getCover() !== null) {
            ?>
            <img class="h-64 mx-auto" src="uploads/cover/<?php echo $book->getCover(); ?>" alt="Cover image">
            <?php
          } else {
            ?>
            <img class="h-64 mx-auto" src="uploads/cover/no-cover.png" alt="Cover image">
            <?php
          }
          ?>
          <div class="px-2 py-1">
            <div class="font-bold text-l mb-2"><?php echo $book->getTitle() ?></div>
          </div>
          <div class="px-2">
            <a class="w-full bg-teal-400 hover:bg-teal-600 focus:shadow-outline focus:outline-none font-bold py-2 px-2 rounded" role="button" href="?menu=member-book-detail&isbn=<?php echo $book->getIsbn13(); ?>">View Detail</a>
          </div>
        </div>
        <?php
      }
      ?>
    </div>
  </div>