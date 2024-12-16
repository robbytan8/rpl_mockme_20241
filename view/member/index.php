<div class="relative overflow-x-auto">
  <div class="w-full p-2">
    <div class="flex flex-wrap justify-center items-center">
      <?php
      /** @var Book $book */
      foreach ($books as $book) {
        ?>
        <div class="max-w-sm rounded overflow-hidden shadow-lg py-2 mx-2 my-2 bg-gray-200">
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
          <div class="px-6 py-4">
            <div class="font-bold text-xl mb-2"><?php echo $book->getTitle() ?></div>
          </div>
        </div>
        <?php
      }
      ?>
    </div>
  </div>