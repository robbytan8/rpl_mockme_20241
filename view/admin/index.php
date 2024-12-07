<div class="relative overflow-x-auto">
  <div class="w-full p-2">
    <?php
    $successMessage = filter_input(INPUT_GET, 'message', FILTER_SANITIZE_STRING);
    if (isset($successMessage)) {
      echo '<div class="w-full border-2 rounded bg-green-400 px-3 py-3 font-semibold">' . $successMessage . '</div>';
    }
    ?>
    <div class="my-2">
      <a class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" role="button" href="?menu=adm-book-create">Add book</a>
    </div>

    <table class="w-full text-left dark:text-gray-200">
      <thead class="uppercase bg-teal-400 dark:bg-teal-800">
      <tr>
        <th scope="col" class="px-6 py-3">ISBN 13</th>
        <th scope="col" class="px-6 py-3">Title</th>
        <th scope="col" class="px-6 py-3">Author</th>
        <th scope="col" class="px-6 py-3">Publisher</th>
        <th scope="col" class="px-6 py-3">Cover</th>
        <th scope="col" class="px-6 py-3">Rack Number</th>
      </tr>
      </thead>
      <tbody>
      <?php
      /** @var Book $book */
      foreach ($books as $book) {
        echo '<tr class="text-black bg-white dark:bg-teal-100">';
        echo '<td class="px-6 py-4">' . $book->getIsbn13() . '</td>';
        echo '<td class="px-6 py-4">' . $book->getTitle() . '</td>';
        echo '<td class="px-6 py-4">' . $book->getAuthor() . '</td>';
        echo '<td class="px-6 py-4">' . $book->getPublisher() . '</td>';
        echo ($book->getCover() === null) ? '<td class="px-6 py-4">-</td>' : '<td class="px-6 py-4"><img src="uploads/cover/' . $book->getCover() . '" alt="Cover" class="max-w-44"></td>';
        echo '<td class="px-6 py-4">' . $book->getRackNumber() . "</td>";
        echo '</tr>';
      }
      ?>
      </tbody>
    </table>
  </div>
</div>