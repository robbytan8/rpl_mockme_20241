<div class="px-4 py-2">
  <div class="flex flex-row">
    <div>
      <img class="card-img-top mb-5 mb-md-0" src="https://dummyimage.com/600x700/dee2e6/6c757d.jpg" alt="..."/>
    </div>
    <div class="ml-4">
      <div class="mb-1">SKU: BST-498</div>
      <h1 class=""><?php echo $book->getTitle(); ?></h1>
      <div class="mb-5">
        <span class="text-decoration-line-through">$45.00</span>
        <span>$40.00</span>
      </div>
      <div><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium at dolorem quidem modi. Nam sequi consequatur obcaecati excepturi alias magni, accusamus eius blanditiis delectus ipsam minima ea iste laborum vero?</p></div>
      <div class="d-flex">
        <input class="form-control text-center me-3" id="inputQuantity" type="num" value="1"
               style="max-width: 3rem"/>
        <button class="btn btn-outline-dark flex-shrink-0" type="button">
          <i class="bi-cart-fill me-1"></i>
          Add to cart
        </button>
      </div>
    </div>
  </div>
</div>
