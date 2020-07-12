<form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
  @csrf
  <input type="file" name="image">
</form> 