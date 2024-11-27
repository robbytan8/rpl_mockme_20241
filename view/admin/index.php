<table>
  <thead>
  <tr>
    <th>ISBN 13</th>
    <th>Title</th>
    <th>Author</th>
    <th>Publisher</th>
    <th>Cover</th>
    <th>Rack Number</th>
  </tr>
  </thead>
  <tbody>
  <?php
  /** @var Book $book */
  foreach ($books as $book) {
    echo "<tr>";
    echo "<td>" . $book->getIsbn13() . "</td>";
    echo "<td>" . $book->getTitle() . "</td>";
    echo "<td>" . $book->getAuthor() . "</td>";
    echo "<td>" . $book->getPublisher() . "</td>";
    echo ($book->getCover() === null) ? "<td>-</td>" : "<td>" . $book->getCover() . "</td>";
    echo "<td>" . $book->getRackNumber() . "</td>";
    echo "</tr>";
  }
  ?>
  </tbody>
</table>